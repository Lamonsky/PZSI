@extends("main", ["title" => "Dzierżawa Edycja"])

@section("menu")
<h2>Dzierżawa</h2>
    <a class="btn btn-primary" href="/renting">Powrót</a>
@endsection

@section("content")
<div class="container">
    <form method="post" action="/renting/update/{{$model -> IDDzierzawy}}">
    @csrf
    <div class="row gy-3">
            <div class="col-md-12 col-lg-6 col-xxl-4">
                <div class="input-group">
                    <label class="input-group-text">
                        <i class="material-icons-round align-middle">printer</i>
                        Drukarka
                    </label>
                    <select class="form-select" name="IDDrukarki">
                    @foreach ($printersinventory as $item)
                        <option value="{{ $item->IDdrukarki}}" {{ $model->IDDrukarki == $item->IDdrukarki ? 'selected' : '' }}>
                            Dostawca: {{ $item->ContractorsFK->Nazwa }} 
                            Drukarka: {{ $item->PrintersModelsFK->Producent }}  
                            {{ $item->PrintersModelsFK->Model }} 
                            Sklep: {{ $item->LocationsFK->Kod }} 
                            {{ $item->LocationsFK->Nazwa_Lokalizacji }} 
                            SN: {{ $item->NumerSeryjny }}
                            IP: {{ $item->AdresIP }}
                            Lokalizacja:{{ $item->Lokalizacja }}
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
                        <i class="material-icons-round align-middle">description</i>
                        Faktura
                    </label>
                    <select class="form-select" name="IDFaktury">
                    @foreach ($invoices as $item)
                        <option {{ $item->id }} value="{{ $item->id}}" {{ $model->IDFaktury == $item->id ? 'selected' : '' }}>{{ $item->numer_faktury }}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xxl-4">
                <div class="input-group">
                    <label class="input-group-text">
                        <i class="material-icons-round align-middle">payments</i>
                        Kwota Jednostkowa Netto
                    </label>
                    <input class="form-control validate @error('KwotaJedNetto') is-invalid @enderror" name="KwotaJedNetto" value="{{ old('KwotaJedNetto', $model->KwotaJedNetto) }}">
                    @error('KwotaJedNetto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xxl-4">
                <div class="input-group">
                    <label class="input-group-text">
                        <i class="material-icons-round align-middle">payments</i>
                        Ilość
                    </label>
                    <input class="form-control validate @error('Ilosc') is-invalid @enderror" name="Ilosc" value="{{ old('Ilosc', $model->Ilosc) }}">
                    @error('Ilosc')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xxl-4">
                <div class="input-group">
                    <label class="input-group-text">
                        <i class="material-icons-round align-middle ">payments</i>
                        Stan na dzisiaj
                    </label>
                    <input class="form-control validate @error('StanNaDzisiaj') is-invalid @enderror" name="StanNaDzisiaj" value="{{ old('StanNaDzisiaj', $model->StanNaDzisiaj) }}">
                    @error('StanNaDzisiaj')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xxl-4">
                <div class="input-group">
                    <label class="input-group-text">
                        <i class="material-icons-round align-middle ">payments</i>
                        Kwota dzierżawy
                    </label>
                    <input class="form-control validate @error('KwotaDzierzawy') is-invalid @enderror" name="KwotaDzierzawy" value="{{ old('KwotaDzierzawy', $model->KwotaDzierzawy) }}">
                    @error('KwotaDzierzawy')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xxl-4">
                <div class="input-group">
                    <label class="input-group-text">
                        <i class="material-icons-round align-middle">event</i>
                        Data
                    </label>
                    <input type="date" class="form-control validate" name="Data" value="{{$model->Data}}">
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