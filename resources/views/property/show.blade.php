@extends('base')

@section('title', $property->title)

@section('content')
    <div class="container mt-4">
        <div class="inline-flex justify-between w-full bg-white shadow-md p-4 gap-4">
            <div class="w-full pl-8  flex flex-col gap-2">
                <h1 class="text-4xl font-medium text-gray-800">{{ $property->title }}</h1>
                <hr>
                <div class="pl-2">
                    <p class="text-xl font-medium">Caractéristiques</p>
                    <table class="table table-striped">
                        <tr>
                            <td>Surface habitable</td>
                            <td>{{ $property->surface }}m²</td>
                        </tr>
                        <tr>
                            <td>Pièce</td>
                            <td>{{ $property->rooms }}</td>
                        </tr>
                        <tr>
                            <td>Chambre</td>
                            <td>{{ $property->bedrooms }}</td>
                        </tr>
                        <tr>
                            <td>Etages</td>
                            <td>{{ $property->floor ?: 'Rez de chaussé' }}</td>
                        </tr>
                        <tr>
                            <td>Localisation</td>
                            <td>
                                {{ $property->address }} <br>
                                {{ $property->city }} ({{ $property->postal_code }})
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="pl-2">
                    <div class="inline-flex items-start justify-between w-full">
                        <div>
                            <p class="text-xl font-medium">Description</p>
                            <p>{!! nl2br($property->description) !!}</p>
                        </div>
                        <div class="col-4">
                            <h2 class="text-xl font-medium">Spécificités</h2>
                            <ul class="list-group">
                                @foreach ($property->options as $option)
                                    <li class="list-group-item">{{ $option->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="text-primary fw-bold" style="font-size: 2rem;">
                            {{ number_format($property->price, thousands_separator: ' ') }} $
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-end ">
                <img src="https://images.unsplash.com/photo-1499696010180-025ef6e1a8f9?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1470&amp;q=80"
                    alt="ui/ux review check" class="h-auto w-auto rounded-lg shadow-lg" />
            </div>
        </div>
        <div class="mt-4">
            <h4>Interessé par ce bien</h4>

            <form action="{{ route('property.contact', $property) }}" method="post" class="vstack gap-3">
                @csrf

                @include('shared.flash')

                <div class="row">
                    @include('shared.input', [
                        'class' => 'col',
                        'name' => 'firstname',
                        'label' => 'Prénom',
                    ])
                    @include('shared.input', [
                        'class' => 'col',
                        'name' => 'lastname',
                        'label' => 'Nom',
                    ])
                </div>
                <div class="row">
                    @include('shared.input', [
                        'class' => 'col',
                        'name' => 'phone',
                        'label' => 'Téléphone',
                    ])
                    @include('shared.input', [
                        'type' => 'email',
                        'class' => 'col',
                        'name' => 'email',
                        'label' => 'Email',
                    ])
                </div>
                @include('shared.input', [
                    'type' => 'textarea',
                    'class' => 'col',
                    'name' => 'message',
                    'label' => 'Votre message',
                ])
                <div>
                    <button class="btn btn-primary">Nous contacter</button>
                </div>
            </form>
        </div>
    </div>


@endsection
