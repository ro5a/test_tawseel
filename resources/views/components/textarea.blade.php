<div class="{{ $col??'col-md-6' }} my-3">
    <label class="form-label fs-6" for="{{ $field_name }}">{{ $label_name }}</label>
    <textarea name="{{ $field_name }}" id="{{ $field_name }}" class="form-control" cols="30" rows="10">{{$value}}</textarea>
    @error(sprintf($field_name))
    <span class="text-end text-danger">* {{ $message }} </span>
    @enderror
</div>
