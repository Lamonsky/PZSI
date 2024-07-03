<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoices;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class InvoicesController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('search');
        $query = Invoices::where("Aktywne", "=", true);
        if ($keyword != "") {
            $query->where('numer_faktury', 'like', "%$keyword%");
        }
        $models = $query->orderBy('id', 'asc')->paginate(10);
        return view('Invoices.index', ["models" => $models]);
    }


    public function create() : View
    {
        $model = new Invoices();
        return view('Invoices.create', ["model" => $model]);
    }

    public function addToDb(Request $request) : RedirectResponse
    {
        $model = new Invoices();
        $model->numer_faktury = $request->input("numer_faktury");
        
        $model->Aktywne = $request->input("Aktywne") ? true : false;
        $model->save();

        return redirect("/invoices");
    }

    public function edit($id) : View
    {
        $model = Invoices::find($id);
        return view('Invoices.edit', ["model" => $model]);
    }

    public function update($id, Request $request)
    {
        $model = Invoices::find($id);
        $model->numer_faktury = $request->input("numer_faktury");
        
        $model->Aktywne = $request->input("Aktywne") ? true : false;

        $model->save();

        return redirect("/invoices");
    }

    public function delete($id, Request $request)
    {
        $model = Invoices::find($id);
        $model->Aktywne = false;

        $model->save();

        return redirect("/invoices");
    }
}
