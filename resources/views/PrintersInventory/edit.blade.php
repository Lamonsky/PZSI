@extends("main", ["title" => "Drukarki Inwentaryzacja Edycja"])

@section("menu")

<h2>Drukarki Inwentaryzacja</h2>
    <a class="btn btn-primary" href="/printers-inventory">Powrót</a>
@endsection

@section("content")
<div class="container">
    <form method="post" action="/printers-inventory/update/{{$model -> IDdrukarki}}">
    @csrf
    <div class="row gy-3">
            <div class="col-md-12 col-lg-6 col-xxl-4">
                <div class="input-group">
                    <label class="input-group-text">
                        <i class="material-icons-round align-middle">printer</i>
                        Drukarka
                    </label>
                    <select class="form-select" name="IDModeluDrukarki">
                    @foreach ($printersmodels as $item)
                    <option value="{{ $item->IDdrukarki }}" {{ $model->IDModeluDrukarki == $item->IDdrukarki ? 'selected' : '' }}>
                            {{ $item->Producent }} {{ $item->Model }}
                        </option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xxl-4">
                <div class="input-group">
                    <label class="input-group-text">
                        <i class="material-icons-round align-middle">description</i>
                        Dostawca
                    </label>
                    <select class="form-select" name="IDDostawcy">
                    @foreach ($contractors as $item)
                        <option {{ $item->IDDostawcy }} value="{{ $item->IDDostawcy}}" {{ $model->IDDostawcy == $item->IDDostawcy ? 'selected' : '' }}>
                            {{ $item->Nazwa }} - {{ $item->Mail }}
                        </option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xxl-4">
                <div class="input-group">
                    <label class="input-group-text">
                        <i class="material-icons-round align-middle">home</i>
                        Lokalizacja
                    </label>
                    <select class="form-select" name="IDLokalizacji">
                    @foreach ($locations as $item)
                        <option {{ $item->IDLokalizacji }} value="{{ $item->IDLokalizacji}}" {{ $model->IDLokalizacji == $item->IDLokalizacji ? 'selected' : '' }}>
                            {{ $item->Kod }} - {{ $item->Nazwa_Lokalizacji }}
                        </option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xxl-4">
                <div class="input-group">
                    <label class="input-group-text">
                        <i class="material-icons-round align-middle">description</i>
                        Numer Seryjny
                    </label>
                    <input class="form-control validate" name="NumerSeryjny" value="{{$model->NumerSeryjny}}">
                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xxl-4">
                <div class="input-group">
                    <label class="input-group-text">
                        <i class="material-icons-round align-middle">description</i>
                        Adres IP
                    </label>
                    <input class="form-control validate @error('AdresIP') is-invalid @enderror" name="AdresIP" value="{{old('AdresIP', $model->AdresIP)}}">
                    @error('AdresIP')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xxl-4">
                <div class="input-group">
                    <label class="input-group-text">
                        <i class="material-icons-round align-middle">pin_drop</i>
                        Dział
                    </label>
                    <input class="form-control validate" name="Lokalizacja" value="{{$model->Lokalizacja}}">
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
                <button class="btn btn-primary">Dodaj</button>
            </div>
        </div>
    </form>
</div>
@endsection