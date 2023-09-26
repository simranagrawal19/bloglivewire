@props(['name', 'type' => 'text'])
<div class="form-group">
    <label for="{{ $name }}">{{ ucwords($name) }}</label>
    <input type="{{ $type }}"
      class="border border-gray-400 p-2 w-full" name="{{ $name }}" id="{{ $name }}" {{ $attributes(['value' =>old($name)]) }}>

     <x-form.error name="{{ $name }}"/>
    
  </div>