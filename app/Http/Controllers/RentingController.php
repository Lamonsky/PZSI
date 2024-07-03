<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Renting;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Contractors;
use App\Models\Invoices;
use App\Models\PrintersInventory;

class RentingController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('search');

        $query = Renting::where("Aktywne", "=", true);

        if ($keyword != "") {
            $query->where(function ($query) use ($keyword) {
                $query->whereHas('PrintersInventoryFK', function ($query) use ($keyword) {
                        $query->where('NumerSeryjny', 'like', "%$keyword%")
                            ->orWhere('AdresIP', 'like', "%$keyword%")
                            ->orWhere('Lokalizacja', 'like', "%$keyword%");
                    })
                    ->orWhereHas('ContractorsFK', function ($query) use ($keyword) {
                        $query->where('Nazwa', 'like', "%$keyword%")
                            ->orWhere('Mail', 'like', "%$keyword%");
                    })
                    ->orWhereHas('PrintersInventoryFK.LocationsFK', function ($query) use ($keyword) {
                        $query->where('Kod', 'like', "%$keyword%")
                            ->orWhere('Nazwa_Lokalizacji', 'like', "%$keyword%");
                    })
                    ->orWhereHas('PrintersInventoryFK.PrintersModelsFK', function ($query) use ($keyword) {
                        $query->where('Producent', 'like', "%$keyword%")
                            ->orWhere('Model', 'like', "%$keyword%");
                    })
                    ->orWhere('KwotaJedNetto', 'like', "%$keyword%")
                    ->orWhere('Ilosc', 'like', "%$keyword%")
                    ->orWhere('KwotaDzierzawy', 'like', "%$keyword%")
                    ->orWhere('Suma', 'like', "%$keyword%")
                    ->orWhere('Data', 'like', "%$keyword%")
                    ->orWhereHas('InvoicesFK', function ($query) use ($keyword) {
                        $query->where('numer_faktury', 'like', "%$keyword%");
                    });
            });
        }

        $models = $query->orderBy('IDDzierzawy', 'asc')->paginate(10);

        return view('Renting.index', [
            "models" => $models,
        ]);
    }


    public function create() : View
    {
        $model = new Renting();
        $printersinventory = PrintersInventory::all();
        $contractors = Contractors::all();
        $invoices = Invoices::all();
        return view('Renting.create', [
            "model" => $model,
            "printersinventory" => $printersinventory,
            "contractors" => $contractors,
            "invoices" => $invoices,
        ]);
    }

    public function addToDb(Request $request) : RedirectResponse
    {
        $validatedData = $request->validate([
            'KwotaJedNetto' => 'required|numeric',
            'Ilosc' => 'required|integer|min:0',
            'StanNaDzisiaj' => 'required|integer|min:0',
            'KwotaDzierzawy' => 'required|numeric',
        ],
        [
            'KwotaJedNetto.numeric' => 'Kwota jednostkowa netto musi być liczbą',
            'Ilosc.integer' => 'Ilość musi być liczbą',
            'StanNaDzisiaj.integer' => 'Stan na dzisiaj musi być liczbą dodatnią',
            'KwotaDzierzawy.numeric' => 'Kwota dzierżawy musi być liczbą',
        ]);

        $model = new Renting();
        $model->IDDrukarki = $request->input("IDDrukarki");
        $model->IDDostawcy = $request->input("IDDostawcy");
        $model->KwotaJedNetto = $request->input("KwotaJedNetto");
        $model->Ilosc = $request->input("Ilosc");
        $model->StanNaDzisiaj = $request->input("StanNaDzisiaj");
        $model->KwotaDzierzawy = $request->input("KwotaDzierzawy");
        $model->Suma = $model->KwotaJedNetto * $model->Ilosc + $model->KwotaDzierzawy;
        $model->Data = $request->input("Data");
        $model->IDFaktury = $request->input("IDFaktury");
        $model->Aktywne = $request->input("Aktywne") ? true : false;
        $model->save();

        return redirect("/renting")->with('success', 'Dane zostały pomyślnie zapisane');
    }

    public function edit($id) : View
    {
        $model = Renting::find($id);
        $printersinventory = PrintersInventory::all();
        $contractors = Contractors::all();
        $invoices = Invoices::all();
        return view('Renting.edit', [
            "model" => $model,
            "printersinventory" => $printersinventory,
            "contractors" => $contractors,
            "invoices" => $invoices,
        ]);
    }

    public function update($id, Request $request)
    {
        $validatedData = $request->validate([
            'KwotaJedNetto' => 'required|numeric',
            'Ilosc' => 'required|integer|min:1',
            'StanNaDzisiaj' => 'required|integer|min:0',
            'KwotaDzierzawy' => 'required|numeric',
        ],
        [
            'KwotaJedNetto.numeric' => 'Kwota jednostkowa netto musi być liczbą',
            'Ilosc.integer' => 'Ilość musi być liczbą dodatnią',
            'StanNaDzisiaj.integer' => 'Stan na dzisiaj musi być liczbą dodatnią',
            'KwotaDzierzawy.numeric' => 'Kwota dzierżawy musi być liczbą',
        ]);

        $model = Renting::find($id);
        $model->IDDrukarki = $request->input("IDDrukarki");
        $model->IDDostawcy = $request->input("IDDostawcy");
        $model->KwotaJedNetto = $request->input("KwotaJedNetto");
        $model->Ilosc = $request->input("Ilosc");
        $model->StanNaDzisiaj = $request->input("StanNaDzisiaj");
        $model->KwotaDzierzawy = $request->input("KwotaDzierzawy");
        $model->Suma = $model->KwotaJedNetto * $model->Ilosc + $model->KwotaDzierzawy;
        $model->Data = $request->input("Data");
        $model->IDFaktury = $request->input("IDFaktury");
        $model->Aktywne = $request->input("Aktywne") ? true : false;

        $model->save();

        return redirect("/renting")->with('success', 'Dane zostały pomyślnie zapisane');
    }

    public function delete($id, Request $request)
    {
        $model = Renting::find($id);
        $model->Aktywne = false;

        $model->save();

        return redirect("/renting");
    }
}
