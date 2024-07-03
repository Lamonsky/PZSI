@extends("main", ["title" => "Faktury Dodaj"])

@section("menu")
<h2>Tonery</h2>
    <a class="btn btn-primary" href="/invoices">Powrót</a>
@endsection

@section("content")
<div class="container">
    <form method="post" action="/invoices/add-to-db">
    @csrf
        <div class="row gy-3">
            <div class="col-md-12 col-lg-6 col-xxl-4">
                <div class="input-group">
                    <label class="input-group-text">
                        <i class="material-icons-round align-middle">printer</i>
                        Numer faktury
                    </label>
                    <input class="form-control validate" name="numer_faktury" value="{{$model->numer_faktury}}">
                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xxl-4">
                <div class="row">
                    <div class="col-auto">
                    <label class="form-check-label">
                            <i class="material-icons-round align-middle">block</i>
                            Zablokuj
                        </label>
                    </div>
                    <div class="form-switch form-check col-auto">
                        <input class="form-check-input validate" {{ $model->Aktywne ? "checked" : "" }} type="checkbox" name="Aktywne">
                        <label class="form-check-label">
                        <i class="material-icons-round align-middle">public</i>    
                            Aktywne 
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <button class="btn btn-primary">Dodaj</button>
            </div>
        </div>
    </form>
</div>
@endsection
