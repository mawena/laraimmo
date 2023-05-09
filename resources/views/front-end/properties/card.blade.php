<div class="card">
    <div class="card-body">
        <h5 class="card-title">
            <a
                href="{{ route('property.show', ['slug' => $property->getSlug(), 'property' => $property]) }}">{{ $property->title }}</a>
        </h5>

        <p class="card-text">{{ $property->getFormatedSurface() }} - {{ $property->city }} ({{ $property->postal_code }})
        </p>
        <div class="text-primary" style="font-size: 1.4rem;">
            {{ $property->getFormatedPrice() }}
        </div>
    </div>
</div>
