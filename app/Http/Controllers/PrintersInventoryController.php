<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrintersInventory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Shops;
use App\Models\PrintersModels;
use App\Models\Contractors;

class PrintersInventoryController extends Controller
{
    public function index(){
        $models = PrintersInventory::where("Aktywne", "=", true)->orderBy("IDLokalizacji","asc")->paginate(1000);
        return view('PrintersInventory.index', ["models" => $models]);
    }

    public function filter(Request $request)
    {
        $keyword = $request->input('search');

        // Wykonaj zapytanie z filtrowaniem używając Eloquent
        $models = PrintersInventory::where("Aktywne", "=", true)
        ->whereHas('PrintersModelsFK', function ($query) use ($keyword) {
            $query->where('Producent', 'like', "%$keyword%")
                ->orWhere('Model', 'like', "%$keyword%");
        })
        ->orWhereHas('ContractorsFK', function ($query) use ($keyword) {
            $query->where('Nazwa', 'like', "%$keyword%")
                ->orWhere('Mail', 'like', "%$keyword%");
        })
        ->orWhereHas('LocationsFK', function ($query) use ($keyword) {
            $query->where('Kod', 'like', "%$keyword%")
                ->orWhere('Nazwa_Lokalizacji', 'like', "%$keyword%");
        })
        ->orWhere('NumerSeryjny', 'like', "%$keyword%")
        ->orWhere('AdresIP', 'like', "%$keyword%")
        ->orWhere('Lokalizacja', 'like', "%$keyword%")
        
        ->orderBy('IDdrukarki', 'asc')
        ->paginate(10);


        return view('PrintersInventory.index', [
            "models" => $models,
        ]);
    }

    public function create() : View
    {
        $model = new PrintersInventory();
        $locations = Shops::all();
        $printersmodels = PrintersModels::all();
        $contractors = Contractors::all();
        return view('PrintersInventory.create', [
            "model" => $model, 
            "locations" => $locations, 
            "contractors" => $contractors, 
            "printersmodels" => $printersmodels
        ]);
    }

    public function addToDb(Request $request) : RedirectResponse
    {
        $validatedData = $request->validate([
            'AdresIP' => 'ip',
        ],
        [
            'AdresIP' => 'Wymagany jest adres IP',
        ]);

        $model = new PrintersInventory();
        $model->NumerSeryjny = $request->input("NumerSeryjny");
        $model->AdresIP = $request->input("AdresIP");
        $model->Lokalizacja = $request->input("Lokalizacja");
        $model->IDDostawcy = $request->input("IDDostawcy");
        $model->IDModeluDrukarki = $request->input("IDModeluDrukarki");
        $model->IDLokalizacji = $request->input("IDLokalizacji");
        $model->Aktywne = $request->input("Aktywne") ? false : true;
        $model->save();

        return redirect("/printers-inventory");
    }

    public function edit($id) : View
    {
        $model = PrintersInventory::find($id);
        $locations = Shops::all();
        $printersmodels = PrintersModels::all();
        $contractors = Contractors::all();
        return view('PrintersInventory.edit', ["model" => $model, "locations" => $locations, "contractors" => $contractors, "printersmodels" => $printersmodels]);
    }

    public function update($id, Request $request)
    {
        $model = PrintersInventory::find($id);
        $model->NumerSeryjny = $request->input("NumerSeryjny");
        $model->AdresIP = $request->input("AdresIP");
        $model->Lokalizacja = $request->input("Lokalizacja");
        $model->IDDostawcy = $request->input("IDDostawcy");
        $model->IDModeluDrukarki = $request->input("IDModeluDrukarki");
        $model->IDLokalizacji = $request->input("IDLokalizacji");
        $model->Aktywne = $request->input("Aktywne") ? false : true;
        $model->save();

        return redirect("/printers-inventory");
    }

    public function delete($id, Request $request)
    {
        $model = PrintersInventory::find($id);
        $model->Aktywne = false;

        $model->save();

        return redirect("/printers-inventory");
    }

}
