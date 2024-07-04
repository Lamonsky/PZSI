
@extends("main", ["title" => "Sklepy"])

@section("menu")
<h2>Sklepy</h2>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <a class="btn btn-primary" href="/"> Strona główna </a>
                <a class="btn btn-primary" href="/shops/create"> Dodaj nowy </a>
                <a class="btn btn-primary" href="/shops">Wszystkie</a>
            </div>
            <div class="ms-auto">
                <form action="{{ route('shops.index') }}" method="GET" class="d-flex">
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
                        <p class="card-title h5">{{ $model->Kod }}</p>
                        <p>Lokalizacja: {!! $model -> Nazwa_Lokalizacji !!}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ url()->current() }}/edit/{{ $model->IDLokalizacji }}" class="btn btn-primary">Edytuj</a>                        
                        <a href="{{ url()->current() }}/delete/{{ $model->IDLokalizacji }}" class="btn btn-danger">Usuń</a>
                    </div>
                </div>
            </div>
        @endforeach
        
    </div>
</div>
@endsection