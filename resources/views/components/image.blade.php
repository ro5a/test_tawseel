<div class="col-md-6 my-3">
    <label class="form-label fs-6" for="{{ $field_name }}"> {{ $label_name }}</label>
    <div class="input-group input-group-merge">
        <input name="{{ $field_name }}" type="file" class="form-control" {{ $attributes }} id="{{ $field_name }}" />
    </div>
    @error(sprintf($field_name))
        <span class="text-end text-danger">* {{ $message }} </span>
    @enderror
    <img id="{{ $preview_id }}" src="{{ $src }}" style="max-height: 100px;">
</div>
