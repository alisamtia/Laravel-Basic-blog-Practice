@props(['name',"frontname"=>false])
<div>
    <div class="flex items-center justify-between">
      <label for="{{$name}}" class="block text-sm font-medium leading-6 text-gray-900">{{$frontname ? ucwords($frontname) : ucwords($name)}}</label>
    </div>
    <div class="mt-2">
      <select id="{{$name}}" name="{{$name}}" {{ $attributes }} required class="p-3 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-500 sm:text-sm sm:leading-6">
        {{ $slot }}
      </select>
    </div>
    @error($name)
        <p class="text-md mt-2 text-red-600">{{$message}}</p>
    @enderror
</div>
