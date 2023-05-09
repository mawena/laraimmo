@php
    $class ??= null;
    $name ??= '';
    $value ??= '';
    $label ??= ucfirst($name);
@endphp

<div @class(['form-group', $class])>
    <label for="{{ $name }}"> {{ $label }} </label>
    <select name="{{ $name }}[]" id="{{ $name }}" multiple>
        @foreach ($options as $id => $name)
            <option @selected($value->contains($id)) value="{{ $id }}">{{ $name }}</option>
        @endforeach
    </select>

    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
