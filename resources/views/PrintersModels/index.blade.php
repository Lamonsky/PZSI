
@extends("main", ["title" => "Drukarki Modele"])

@section("menu")
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <a class="btn btn-primary" href="/"> Strona główna </a>
                <a class="btn btn-primary" href="/printers-models/create"> Dodaj nowy </a>
                <a class="btn btn-primary" href="/printers-models">Wszystkie</a>
            </div>
            <div class="ms-auto">
                <form action="{{ route('printersmodels.filter') }}" method="GET" class="d-flex">
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
                        <p class="card-title h5">{{ $model->Producent }}</p>
                        <p>Model: {!! $model -> Model !!}</p>
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