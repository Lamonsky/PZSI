<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrintersModels;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PrintersModelsController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('search');

        $query = PrintersModels::where("Aktywne", "=", true);

        if ($keyword != "") {
            $query->where('Producent', 'like', "%$keyword%")
                ->orWhere('Model', 'like', "%$keyword%");
        }

        $models = $query->orderBy('IDdrukarki', 'asc')->paginate(10);

        return view('PrintersModels.index', [
            "models" => $models,
        ]);
    }


    public function create() : View
    {
        $model = new PrintersModels();
        return view('PrintersModels.create', ["model" => $model]);
    }

    public function addToDb(Request $request) : RedirectResponse
    {
        $model = new PrintersModels();
        $model->Producent = $request->input("Producent");
        $model->Model = $request->input("Model");
        $model->Aktywne = $request->input("Aktywne") ? false : true;
        $model->save();

        return redirect("/printers-models");
    }

    public function edit($id) : View
    {
        $model = PrintersModels::find($id);
        return view('PrintersModels.edit', ["model" => $model]);
    }

    public function update($id, Request $request)
    {
        $model = PrintersModels::find($id);
        $model->Producent = $request->input("Producent");
        $model->Model = $request->input("Model");
        $model->Aktywne = $request->input("Aktywne") ? false : true;

        $model->save();

        return redirect("/printers-models");
    }

    public function delete($id, Request $request)
    {
        $model = PrintersModels::find($id);
        $model->Aktywne = false;

        $model->save();

        return redirect("/printers-models");
    }



}
