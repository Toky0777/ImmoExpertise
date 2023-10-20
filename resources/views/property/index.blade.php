@extends('base')

@section('title', 'Tous nos biens')

@section('content')

    <div class="bg-light p-5 mb-5 text-center">
        <form action="" method="get" class="container d-flex gap-2">
            <input type="number" placeholder="Surface minimum" class="form-control" name="surface"
                value="{{ $input['surface'] ?? '' }}">
            <input type="number" placeholder="Nombre de pièce min" class="form-control" name="rooms"
                value="{{ $input['rooms'] ?? '' }}">
            <input type="number" placeholder="Budget max" class="form-control" name="price"
                value="{{ $input['price'] ?? '' }}">
            <input placeholder="Mot clé" class="form-control" name="title" value="{{ $input['title'] ?? '' }}">
            <button class="bg-gray-700 flew-grow-8 text-white px-3 py-2 rounded-lg">
                Rechercher
            </button>
        </form>
    </div>

    <div class="container">
        <div class="row">
            @forelse ($properties as $property)
                <div class="col-3 mb-4">
                    @include('property.card')
                </div>
            @empty
                <div class="flex w-full justify-center">
                    <img src="https://img.freepik.com/vecteurs-libre/aucun-concept-donnees-dessine-main_52683-127823.jpg?w=996&t=st=1697704535~exp=1697705135~hmac=e6eaa10786d33802382653346db2f9465f9cf7f459e98dbb1de6a6d324d1238a"
                        alt="" class="h-auto w-[30%]">
                </div>
            @endforelse
        </div>

        <div class="my-4">
            {{ $properties->links() }}
        </div>
    </div>

@endsection
