@props(['name','required'=>"true"])
<div class="form-group mb-3">
  <label for="{{$name}}">{{ ucwords($name) }}</label>
  <input {{ $attributes }} class="form-control" value="{{old($name)}}" name="{{ $name }}" type="text" {{$required=="true" ? " required " : ""}} id="{{$name}}" placeholder="Enter {{ $name }}">
  @error($name)
    <p style="color:red">{{ $message }}</p>
  @enderror
</div>