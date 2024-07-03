@extends("main", ["title" => "Sklepy Edycja"])

@section("menu")
<h2>Sklepy</h2>
    <a class="btn btn-primary" href="/shops">Powrót</a>
@endsection

@section("content")
<div class="container">
    <form method="post" action="/shops/update/{{$model -> IDLokalizacji}}">
    @csrf
    <div class="row gy-3">
            <div class="col-md-12 col-lg-6 col-xxl-4">
                <div class="input-group">
                    <label class="input-group-text">
                        <i class="material-icons-round align-middle">printer</i>
                        Kod sklepu
                    </label>
                    <input class="form-control validate" name="Kod" value="{{$model->Kod}}">
                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xxl-4">
                <div class="input-group">
                    <label class="input-group-text">
                        <i class="material-icons-round align-middle">description</i>
                        Nazwa Lokalizacji
                    </label>
                    <input class="form-control validate" name="Nazwa_Lokalizacji" value="{{$model->Nazwa_Lokalizacji}}">
                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xxl-4">
                <div class="input-group">
                    <label class="input-group-text">
                        <i class="material-icons-round align-middle">pin</i>
                        Ilość drukarek na sklepie
                    </label>
                    <input class="form-control validate" name="IleDrukarek" value="{{$model->IleDrukarek}}">
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
                        <input class="form-check-input validate" {{ $model->Aktywne ? "checked" : "" }} type="checkbox" name="IsPublic">
                        <label class="form-check-label">
                        <i class="material-icons-round align-middle">public</i>    
                            Aktywne 
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <button class="btn btn-primary">Zapisz</button>
            </div>
        </div>
    </form>
</div>
@endsection