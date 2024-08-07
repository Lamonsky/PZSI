<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Repairs;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Contractors;
use App\Models\Invoices;
use App\Models\Shops;

class RepairsController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('search');

        $query = Repairs::where("Aktywne", "=", true);

        if ($keyword != "") {
            $query->where(function ($query) use ($keyword) {
                $query->whereHas('ContractorsFK', function ($query) use ($keyword) {
                        $query->where('Nazwa', 'like', "%$keyword%")
                            ->orWhere('Mail', 'like', "%$keyword%");
                    })
                    ->orWhereHas('ShopsFK', function ($query) use ($keyword) {
                        $query->where('Kod', 'like', "%$keyword%")
                            ->orWhere('Nazwa_Lokalizacji', 'like', "%$keyword%");
                    })
                    ->orWhereHas('InvoicesFK', function ($query) use ($keyword) {
                        $query->where('numer_faktury', 'like', "%$keyword%");
                    })
                    ->orWhere('Kwota', 'like', "%$keyword%")
                    ->orWhere('DataNaprawy', 'like', "%$keyword%");
            });
        }

        $models = $query->orderBy('IDNaprawy', 'asc')->paginate(10);

        return view('Repairs.index', [
            "models" => $models,
        ]);
    }


    public function create() : View
    {
        $model = new Repairs();
        $contractors = Contractors::where('Aktywne', true)->get();
        $invoices = Invoices::where('Aktywne', true)->get();
        $shops = Shops::where('Aktywne', true)->get();
        return view('Repairs.create', [
            "model" => $model,
            "contractors" => $contractors,
            "invoices" => $invoices,
            "shops" => $shops,
        ]);
    }

    public function addToDb(Request $request) : RedirectResponse
    {
        $validatedData = $request->validate([
            'Kwota' => 'required|numeric',
        ],
        [
            'Kwota.numeric' => 'Kwota musi być liczbą',
            'Kwota.required' => 'Kwota jest wymagana',
        ]);

        $model = new Repairs();
        $model->IDDostawcy = $request->input("IDDostawcy");
        $model->IDLokalizacji = $request->input("IDLokalizacji");
        $model->Kwota = $request->input("Kwota");
        $model->DataNaprawy = $request->input("DataNaprawy");
        $model->IDFaktury = $request->input("IDFaktury");
        $model->Aktywne = $request->input("Aktywne") ? true : false;
        $model->save();

        return redirect("/repairs")->with('success', 'Dane zostały pomyślnie zapisane');
    }

    public function edit($id) : View
    {
        $model = Repairs::find($id);
        $contractors = Contractors::where('Aktywne', true)->get();
        $shops = Shops::where('Aktywne', true)->get();
        $invoices = Invoices::where('Aktywne', true)->get();
        return view('Repairs.edit', [
            "model" => $model,
            "contractors" => $contractors,
            "invoices" => $invoices,
            "shops" => $shops,
        ]);
    }

    public function update($id, Request $request)
    {
        $validatedData = $request->validate([
            'Kwota' => 'required|numeric',
        ],
        [
            'Kwota.numeric' => 'Kwota musi być liczbą',
            'Kwota.required' => 'Kwota jest wymagana',
        ]);

        $model = Repairs::find($id);
        $model->IDDostawcy = $request->input("IDDostawcy");
        $model->IDLokalizacji = $request->input("IDLokalizacji");
        $model->Kwota = $request->input("Kwota");
        $model->DataNaprawy = $request->input("DataNaprawy");
        $model->IDFaktury = $request->input("IDFaktury");
        $model->Aktywne = $request->input("Aktywne") ? true : false;

        $model->save();

        return redirect("/repairs")->with('success', 'Dane zostały pomyślnie zapisane');
    }

    public function delete($id, Request $request)
    {
        $model = Repairs::find($id);
        $model->Aktywne = false;

        $model->save();

        return redirect("/repairs");
    }
}
