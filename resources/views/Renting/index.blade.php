
@extends("main", ["title" => "Dzierżawa"])

@section("menu")
<h2>Dzierżawa</h2>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <a class="btn btn-primary" href="/"> Strona główna </a>
                <a class="btn btn-primary" href="/renting/create"> Dodaj nowy </a>
                <a class="btn btn-primary" href="/renting">Wszystkie</a>
            </div>
            <div class="ms-auto">
                <form action="{{ route('renting.filter') }}" method="GET" class="d-flex">
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
        <div class="col">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Drukarka</th>
                            <th scope="col">Numer seryjny</th>
                            <th scope="col">Adres IP</th>
                            <th scope="col">Lokalizacja</th>
                            <th scope="col">Sklep</th>
                            <th scope="col">Stan na dzisiaj</th>
                            <th scope="col">Kwota jednostkowa netto</th>
                            <th scope="col">Ilość</th>
                            <th scope="col">Kwota dzierżawy</th>
                            <th scope="col">Suma dzierżawy</th>
                            <th scope="col">Data</th>
                            <th scope="col">Numer faktury</th>
                            <th scope="col">Dostawca</th>
                            <th scope="col">Akcje</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($models as $model)
                        <tr>
                            <td>{{$model->PrintersInventoryFK->PrintersModelsFK->Producent}} {{$model->PrintersInventoryFK->PrintersModelsFK->Model}} {{$model->PrintersInventoryFK->ContractorsFK->Nazwa}} - {{$model->PrintersInventoryFK->ContractorsFK->Mail}}</td>
                            <td>{{$model->PrintersInventoryFK->NumerSeryjny}}</td>
                            <td>{{$model->PrintersInventoryFK->AdresIP}}</td>
                            <td>{{$model->PrintersInventoryFK->Lokalizacja}}</td>
                            <td>{{$model->PrintersInventoryFK->LocationsFK->Kod}} - {{$model->PrintersInventoryFK->LocationsFK->Nazwa_Lokalizacji}}</td>
                            <td>{{$model->StanNaDzisiaj}}</td>
                            <td>{{$model->KwotaJedNetto}}</td>
                            <td>{{$model->Ilosc}}</td>
                            <td>{{$model->KwotaDzierzawy}}</td>
                            <td>{{$model->Suma}}</td>
                            <td>{{$model->Data}}</td>
                            <td>{{$model->InvoicesFK->numer_faktury}}</td>
                            <td>{{$model->ContractorsFK->Nazwa}} - {{$model->ContractorsFK->Mail}}</td>
                            <td>
                                <a href="{{ url()->current() }}/edit/{{ $model->IDDzierzawy }}" class="btn btn-primary">Edytuj</a>
                                <a href="{{ url()->current() }}/delete/{{ $model->IDDzierzawy }}" class="btn btn-danger">Usuń</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection