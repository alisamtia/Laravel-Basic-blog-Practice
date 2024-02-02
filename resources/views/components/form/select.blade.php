@props(['name',"frontname"=>false])

<div class="form-group">
  <label for="{{$name}}">{{$frontname ?? ucwords($name)}}</label>
  <select class="form-control" name="{{$name}}" id="{{$name}}">
      {{$slot}}
  </select>
  @error($name)
    <p style="color:red">{{ $message }}</p>
  @enderror
</div>
