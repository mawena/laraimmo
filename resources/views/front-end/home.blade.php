@extends('front-end.base')

@section('title', 'Acceuil')

@section('content')
    <div class="gb-light p-5 mb-5 text-center">
        <div class="container">
            <h1>Agence dums dums</h1>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maiores aut earum quo reprehenderit cumque
                voluptatem omnis nemo, eos possimus. Distinctio nam hic saepe, cupiditate asperiores quae enim, nesciunt
                aspernatur perspiciatis esse, quos eveniet ducimus fuga quas at nisi. Facere, repellat corrupti sapiente
                error eaque vel quae minima quidem impedit velit delectus neque quo officiis in quam accusantium voluptates
                expedita adipisci fuga? Odit voluptas nisi dolor ex necessitatibus architecto veritatis hic, et sunt!
                Sapiente, eveniet delectus sed possimus quo alias impedit nesciunt vitae, unde at odit optio expedita ex,
                aspernatur fugiat quia ullam beatae porro adipisci. Eos fuga quas sit animi molestiae nulla ea. Sapiente
                laudantium corrupti perspiciatis quae aspernatur sequi mollitia modi impedit blanditiis. Sunt, voluptatibus
                reprehenderit. Deleniti facilis illum quam eos aspernatur quo quisquam placeat sed totam ratione, earum non
                nisi eaque excepturi molestiae officiis natus blanditiis quos. Quas fuga a minima maxime rem aperiam
                doloremque suscipit incidunt nemo.</p>
        </div>

    </div>
    <div class="container">
        <h2>Nos derniers biens</h2>
        <div class="row">
            @foreach ($properties as $property)
                <div class="col">
                    @include('front-end.properties.card')
                </div>
            @endforeach
        </div>
    </div>
@endsection
