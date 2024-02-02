@props(['name','default'=>false])
<div class="form-group">
    <label class="form-control-label" for="{{$name}}">{{ucwords($name)}}</label>
    <textarea required {{ $attributes }} class="form-control" rows="3" id="{{$name}}" name="{{$name}}">{{ $default ? $default : old($name) }}</textarea>
    @error($name)
    <p style="color:red">{{ $message }}</p>
    @enderror
</div>