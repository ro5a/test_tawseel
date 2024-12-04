<div class="{{$col ?? 'col-md-6'}} my-3" {{$items ?? null}}>
    <label class="form-label fs-6" for="{{ $field_name }}"> {{ $label_name }}</label>
    <select id="{{ $field_name }}" {{$attributes }} name="{{ $field_name }}" class="form-select form-select-md">
        {{$options}}
    </select>
    @error(sprintf($field_name))
        <span class="text-end text-danger">* {{ $message }} </span>
    @enderror
</div>
