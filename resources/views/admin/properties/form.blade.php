@extends('admin.base')

@section('title', $property->exists ? 'Editer un bien' : 'Créer un bien')

@section('content')
    <h1>@yield('title')</h1>
    <form class="vstack gap-2"
        action="{{ route($property->exists ? 'admin.property.update' : 'admin.property.store', $property) }}" method="POST">

        @csrf
        @method($property->exists ? 'PATCH' : 'POST')

        <div class="row">
            @include('shared.input', [
                'class' => 'col',
                'name' => 'title',
                'value' => $property->title,
            ])
            @include('shared.input', [
                'type' => 'number',
                'class' => 'col',
                'name' => 'surface',
                'value' => $property->surface,
            ])
            @include('shared.input', [
                'type' => 'number',
                'class' => 'col',
                'name' => 'price',
                'value' => $property->price,
            ])
        </div>
        @include('shared.input', [
            'type' => 'textarea',
            'class' => 'col',
            'name' => 'description',
            'value' => $property->description,
        ])

        <div class="row">
            @include('shared.input', [
                'type' => 'number',
                'class' => 'col',
                'name' => 'rooms',
                'label' => 'Pièces',
                'value' => $property->rooms,
            ])

            @include('shared.input', [
                'type' => 'number',
                'class' => 'col',
                'name' => 'bedrooms',
                'label' => 'Chambres',
                'value' => $property->bedrooms,
            ])

            @include('shared.input', [
                'type' => 'number',
                'class' => 'col',
                'name' => 'floor',
                'label' => 'Etage',
                'value' => $property->floor,
            ])
        </div>

        <div class="row">
            @include('shared.input', [
                'class' => 'col',
                'name' => 'address',
                'label' => 'Adresse',
                'value' => $property->address,
            ])

            @include('shared.input', [
                'class' => 'col',
                'name' => 'city',
                'label' => 'Ville',
                'value' => $property->city,
            ])

            @include('shared.input', [
                'class' => 'col',
                'name' => 'postal_code',
                'label' => 'Code postal',
                'value' => $property->postal_code,
            ])
        </div>

        <div class="row">
            @include('shared.select', [
                'name' => 'options',
                'label' => 'Options',
                'value' => $property->options()->pluck('id'),
                'multiple' => true,
                'options' => $options,
            ])
        </div>

        @include('shared.checkbox', [
            'name' => 'sold',
            'label' => 'Vendu',
            'value' => $property->sold,
        ])
        <button class="btn btn-primary">
            @if ($property->exists)
                Modifier
            @else
                Créer
            @endif
        </button>

        <div>
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Retour</a>
        </div>
    </form>


@endsection
