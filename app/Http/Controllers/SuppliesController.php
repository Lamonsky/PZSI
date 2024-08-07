<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplies;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Invoices;
use App\Models\Shops;

class SuppliesController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('search');

        $query = Supplies::where("Aktywne", "=", true);

        if ($keyword != "") {
            $query->where(function ($query) use ($keyword) {
                $query->whereHas('ShopsFK', function ($query) use ($keyword) {
                    $query->where('Kod', 'like', "%$keyword%")
                        ->orWhere('Numer_Lokalizacji', 'like', "%$keyword%");
                })
                ->orWhereHas('InvoicesFK', function ($query) use ($keyword) {
                    $query->where('numer_faktury', 'like', "%$keyword%");
                })
                ->orWhere('Kwota', 'like', "%$keyword%")
                ->orWhere('Ilosc', 'like', "%$keyword%")
                ->orWhere('Suma', 'like', "%$keyword%")
                ->orWhere('Data', 'like', "%$keyword%");
            });
        }

        $models = $query->orderBy('IDToneru', 'asc')->paginate(10);

        return view('Supplies.index', [
            "models" => $models,
        ]);
    }


    public function create() : View
    {
        $model = new Supplies();
        $invoices = Invoices::where('Aktywne', true)->get();
        $shops = Shops::where('Aktywne', true)->get();
        return view('Supplies.create', [
            "model" => $model,
            "invoices" => $invoices,
            "shops" => $shops,
        ]);
    }

    public function addToDb(Request $request) : RedirectResponse
    {
        $validatedData = $request->validate([
            'Kwota' => 'required|numeric',
            'Ilosc' => 'required|integer|min:1',
        ],
        [
            'Kwota.numeric' => 'Kwota musi być liczbą',
            'Ilosc.integer' => 'Ilość musi być liczbą dodatnią',
        ]);

        $model = new Supplies();
        $model->Ilosc = $request->input("Ilosc");
        $model->IDLokalizacji = $request->input("IDLokalizacji");
        $model->Kwota = $request->input("Kwota");
        $model->Suma = $model->Kwota * $model->Ilosc;
        $model->Data = $request->input("Data");
        $model->IDFaktury = $request->input("IDFaktury");
        $model->Aktywne = $request->input("Aktywne") ? true : false;
        $model->save();

        return redirect("/supplies")->with('success', 'Dane zostały pomyślnie zapisane');
    }

    public function edit($id) : View
    {
        $model = Supplies::find($id);
        $shops = Shops::where('Aktywne', true)->get();
        $invoices = Invoices::where('Aktywne', true)->get();
        return view('Supplies.edit', [
            "model" => $model,
            "invoices" => $invoices,
            "shops" => $shops,
        ]);
    }

    public function update($id, Request $request)
    {
        $validatedData = $request->validate([
            'Kwota' => 'required|numeric',
            'Ilosc' => 'required|integer|min:1',
        ],
        [
            'Kwota.numeric' => 'Kwota musi być liczbą',
            'Ilosc.integer' => 'Ilość musi być liczbą dodatnią',
        ]);

        $model = Supplies::find($id);
        $model->Ilosc = $request->input("Ilosc");
        $model->IDLokalizacji = $request->input("IDLokalizacji");
        $model->Kwota = $request->input("Kwota");
        $model->Suma = $model->Kwota * $model->Ilosc;
        $model->Data = $request->input("Data");
        $model->IDFaktury = $request->input("IDFaktury");
        $model->Aktywne = $request->input("Aktywne") ? true : false;

        $model->save();

        return redirect("/supplies")->with('success', 'Dane zostały pomyślnie zapisane');
    }

    public function delete($id, Request $request)
    {
        $model = Supplies::find($id);
        $model->Aktywne = false;

        $model->save();

        return redirect("/supplies");
    }
}
