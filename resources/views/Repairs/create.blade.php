@extends("main", ["title" => "Naprawy Dodaj"])

@section("menu")
<h2>Naprawy</h2>
    <a class="btn btn-primary" href="/repairs">Powrót</a>
@endsection

@section("content")
<div class="container">
    <form method="post" action="/repairs/add-to-db">
    @csrf
    <div class="row gy-3">
        <div class="col-md-12 col-lg-6 col-xxl-4">
                <div class="input-group">
                    <label class="input-group-text">
                        <i class="material-icons-round align-middle">language</i>
                        Lokalizacja
                    </label>
                    <select class="form-select" name="IDLokalizacji">
                    @foreach ($shops as $item)
                        <option {{ $item->IDLokalizacji }} value="{{ $item->IDLokalizacji}}">{{ $item->Kod }} - {{ $item->Nazwa_Lokalizacji }}</option>
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
                        <option {{ $item->IDDostawcy }} value="{{ $item->IDDostawcy}}">{{ $item->Nazwa }} - {{ $item->Mail }}</option>
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
                        <option {{ $item->id }} value="{{ $item->id}}">{{ $item->numer_faktury }}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xxl-4">
                <div class="input-group">
                    <label class="input-group-text">
                        <i class="material-icons-round align-middle">payments</i>
                        Kwota naprawy
                    </label>
                    <input class="form-control validate @error('Kwota') is-invalid @enderror" name="Kwota" value="{{old('Kwota', $model->Kwota)}}">
                    @error('Kwota')
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
                    <input type="date" class="form-control validate" name="DataNaprawy" value="{{$model->DataNaprawy}}">
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
