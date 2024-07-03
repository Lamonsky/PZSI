@extends("main", ["title" => "Dostawcy Edycja"])

@section("menu")
<h2>Dostawcy</h2>

    <a class="btn btn-primary" href="/contractors">Powrót</a>
@endsection

@section("content")
<div class="container">
    <form method="post" action="/contractors/update/{{$model -> IDDostawcy}}">
    @csrf
        <div class="row gy-3">
            <div class="col-md-12 col-lg-6 col-xxl-4">
                <div class="input-group">
                    <label class="input-group-text">
                        <i class="material-icons-round align-middle">link</i>
                        Nazwa
                    </label>
                    <input class="form-control validate" name="Nazwa" value="{{$model->Nazwa}}">
                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xxl-4">
                <div class="input-group">
                    <label class="input-group-text">
                        <i class="material-icons-round align-middle">description</i>
                        Mail
                    </label>
                    <input class="form-control validate" name="Mail" value="{{$model->Mail}}">
                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xxl-4">
                <div class="row">
                    <div class="col-auto">
                        <label class="form-check-label">
                            Zablokuj
                            <i class="material-icons-round align-middle">block</i>
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