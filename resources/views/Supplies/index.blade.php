
@extends("main", ["title" => "Tonery"])

@section("menu")
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <a class="btn btn-primary" href="/"> Strona główna </a>
                <a class="btn btn-primary" href="/supplies/create"> Dodaj nowy </a>
                <a class="btn btn-primary" href="/supplies">Wszystkie</a>
            </div>
            <div class="ms-auto">
                <form action="{{ route('supplies.filter') }}" method="GET" class="d-flex">
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
                            <th scope="col">Lokalizacja</th>
                            <th scope="col">Kwota</th>
                            <th scope="col">Data</th>
                            <th scope="col">Numer faktury</th>
                            <th scope="col">Ilosc</th>
                            <th scope="col">Suma</th>
                            <th scope="col">Akcje</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($models as $model)
                        <tr>
                            <td>{{$model->ShopsFK->Kod}} - {{$model->ShopsFK->Nazwa_Lokalizacji}}</td>
                            <td>{{$model->Kwota}}</td>
                            <td>{{$model->Data}}</td>
                            <td>{{$model->InvoicesFK->numer_faktury}}</td>
                            <td>{{$model->Ilosc}}</td>
                            <td>{{$model->Suma}}</td>
                            <td>
                                <a href="{{ url()->current() }}/edit/{{ $model->IDToneru }}" class="btn btn-primary">Edytuj</a>
                                <a href="{{ url()->current() }}/delete/{{ $model->IDToneru }}" class="btn btn-danger">Usuń</a>
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