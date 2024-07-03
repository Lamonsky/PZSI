<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contractors;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContractorsController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('search');

        $query = Contractors::where("Aktywne", "=", true);

        if ($keyword != "") {
            $query->where(function ($q) use ($keyword) {
                $q->where('Nazwa', 'like', "%$keyword%")
                ->orWhere('Mail', 'like', "%$keyword%");
            });
        }

        $models = $query->orderBy('IDDostawcy', 'asc')->paginate(10);

        return view('Contractors.index', ["models" => $models]);
    }


    public function create() : View
    {
        $model = new Contractors();
        return view('Contractors.create', ["model" => $model]);
    }

    public function addToDb(Request $request) : RedirectResponse
    {
        $model = new Contractors();
        $model->Nazwa = $request->input("Nazwa");
        $model->Mail = $request->input("Mail");
        $model->Aktywne = $request->input("Aktywne") ? true : false;
        $model->save();

        return redirect("/contractors");
    }

    public function edit($id) : View
    {
        $model = Contractors::find($id);
        return view('Contractors.edit', ["model" => $model]);
    }

    public function update($id, Request $request)
    {
        $model = Contractors::find($id);
        $model->Nazwa = $request->input("Nazwa");
        $model->Mail = $request->input("Mail");
        $model->Aktywne = $request->input("Aktywne") ? true : false;

        $model->save();
        
        return redirect("/contractors");
    }

    public function delete($id, Request $request)
    {
        $model = Contractors::find($id);
        $model->Aktywne = false;

        $model->save();

        return redirect("/contractors");
    }
}
