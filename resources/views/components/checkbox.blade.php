<div class="{{ $col ?? 'col-md-6'}}">
<div class="mt-3 form-check">
    <input name="{{ $field_name }}" class="form-check-input" {{$attributes }} {{$checked}} type="{{ $type ?? 'text'}}" id="{{$id}}"/>
    <label class="form-check-label" for="{{ $id }}">{{ $label_name }}</label>
</div>
</div>
