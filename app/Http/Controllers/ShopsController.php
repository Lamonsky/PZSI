<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shops;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ShopsController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('search');

        $query = Shops::where("Aktywne", "=", true);

        if ($keyword != "") {
            $query->where(function ($query) use ($keyword) {
                $query->where('Kod', 'like', "%$keyword%")
                    ->orWhere('Nazwa_Lokalizacji', 'like', "%$keyword%")
                    ->orWhere('IleDrukarek', 'like', "%$keyword%");
            });
        }

        $models = $query->orderBy('IDLokalizacji', 'asc')->paginate(10);

        return view('shops.index', [
            "models" => $models,
        ]);
    }


    public function create() : View
    {
        $model = new Shops();
        return view('shops.create', ["model" => $model]);
    }

    public function addToDb(Request $request) : RedirectResponse
    {
        $model = new Shops();
        $model->Kod = $request->input("Kod");
        $model->Nazwa_Lokalizacji = $request->input("Nazwa_Lokalizacji");
        $model->IleDrukarek = $request->input("IleDrukarek");
        $model->Aktywne = $request->input("Aktywne") ? false : true;
        $model->save();

        return redirect("/shops");
    }

    public function edit($id) : View
    {
        $model = Shops::find($id);
        return view('Shops.edit', ["model" => $model]);
    }

    public function update($id, Request $request)
    {
        $model = Shops::find($id);
        $model->Kod = $request->input("Kod");
        $model->Nazwa_Lokalizacji = $request->input("Nazwa_Lokalizacji");
        $model->IleDrukarek = $request->input("IleDrukarek");
        $model->Aktywne = $request->input("Aktywne") ? false : true;

        $model->save();

        return redirect("/shops");
    }

    public function delete($id, Request $request)
    {
        $model = Shops::find($id);
        $model->Aktywne = false;

        $model->save();

        return redirect("/shops");
    }
}
