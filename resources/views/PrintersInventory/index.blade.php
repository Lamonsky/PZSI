
@extends("main", ["title" => "Drukarki Inwentaryzacja"])

@section("menu")
<h2>Drukarki Inwentaryzacja</h2>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <a class="btn btn-primary" href="/"> Strona główna </a>
                <a class="btn btn-primary" href="/printers-inventory/create"> Dodaj nowy </a>
                <a class="btn btn-primary" href="/printers-inventory">Wszystkie</a>
            </div>
            <div class="ms-auto">
                <form action="{{ route('printersinventory.index') }}" method="GET" class="d-flex">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Wyszukaj..." class="form-control me-2">
                    <button type="submit" class="btn btn-primary">Szukaj</button>
                </form>
            </div>
        </div>
    </div>
@endsection


@section("content")
<div class="container">
    <div class="row gy-3">
        @foreach ($models as $model)
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title h7">Producent: {{$model->PrintersModelsFK->Producent}}</p>
                        <p>Model: {{$model->PrintersModelsFK->Model}}</p>
                        <p>Numer seryjny: {{$model->NumerSeryjny}}</p>
                        <p>Adres IP: {{$model->AdresIP}}</p>
                        <div class="badge bg-secondary">
                            <p>Serwis</p>
                            <p>Nazwa:{{$model->ContractorsFK->Nazwa}}</p>
                            <p>Mail:{{$model->ContractorsFK->Mail}}</p>
                        </div>
                        <div class="badge bg-primary">
                            <p>Lokalizacja</p>
                            <p>{{$model->LocationsFK->Kod}} {{$model->LocationsFK->Nazwa_Lokalizacji}}</p>
                            @if($model->LocationsFK->IleDrukarek != NULL )
                                <p>Drukarek na lokalizacji:{{$model->LocationsFK->IleDrukarek}}</p>                            
                            @endif
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ url()->current() }}/edit/{{ $model->IDdrukarki }}" class="btn btn-primary">Edytuj</a>                        
                        <a href="{{ url()->current() }}/delete/{{ $model->IDdrukarki }}" class="btn btn-danger">Usuń</a>
                    </div>
                </div>
            </div>
        @endforeach
        
    </div>
</div>
@endsection