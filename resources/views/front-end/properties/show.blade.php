@extends('front-end.base')

@section('title', $property->title)

@section('content')

    <div class="container mt-4">


        <h1>{{ $property->title }}</h1>
        <h2>{{ $property->rooms }} pièces - {{ $property->getFormatedSurface() }}</h2>

        <div class="text-primary fw-bold" style="font-size: 4rem;">
            {{ $property->getFormatedPrice() }}
        </div>

        <hr>

        <div class="mt-4">
            <h4>Intéressé par ce bien ?</h4>

            <form action="{{ route('property.contact', $property) }}" method="post" class="vstack gap-3">
                @csrf
                <div class="row">
                    @include('shared.input', [
                        'class' => 'col',
                        'name' => 'firstname',
                        'label' => 'Prénom',
                        'value' => 'John',
                    ])
                    @include('shared.input', [
                        'class' => 'col',
                        'name' => 'lastname',
                        'label' => 'Nom',
                        'value' => 'Doe',
                    ])
                </div>
                <div class="row">
                    @include('shared.input', [
                        'class' => 'col',
                        'name' => 'phone',
                        'label' => 'Téléphone',
                        'value' => '06 00 00 00 00',
                    ])
                    @include('shared.input', [
                        'type' => 'email',
                        'class' => 'col',
                        'name' => 'email',
                        'label' => 'Email',
                        'value' => 'John@doepublic.fr',
                    ])
                </div>
                @include('shared.input', [
                    'type',
                    'textarea',
                    'class' => 'col',
                    'name' => 'message',
                    'label' => 'Message',
                    'value' => 'Mon petit message',
                ])

                <button class="btn btn-primary">Nous contacter</button>
            </form>
        </div>

        <div class="mt-4">
            <p>{!! nl2br($property->description) !!}</p>
            <div class="row">
                <div class="col-8">
                    <h2>Caractéristique</h2>
                    <table class="table table-striped">
                        <tr>
                            <td>Suface habitable</td>
                            <td>{{ $property->getFormatedSurface() }}</td>
                        </tr>
                        <tr>
                            <td>Pièces</td>
                            <td>{{ $property->rooms }}</td>
                        </tr>
                        <tr>
                            <td>Chambres</td>
                            <td>{{ $property->bedrooms }}</td>
                        </tr>
                        <tr>
                            <td>Etage</td>
                            <td>{{ $property->floor ?: 'Rez de chaussé' }}</td>
                        </tr>
                        <tr>
                            <td>Localisation</td>
                            <td>
                                {{ $property->address }} <br>
                                {{ $property->postal_code }}
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-4">
                    <h2>Spécificités</h2>
                    <ul class="list-group">
                        @foreach ($property->options as $option)
                            <li class="list-group-item">{{ $option->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
