@props(['name'])
<div class="form-group">
    <label for="{{ $name }}">{{ ucwords($name ) }}</label>
    <textarea
      class="border border-gray-400 p-2 w-full" name="{{ $name }}" id="{{ $name }}" required>
      {{ $slot ?? old($name) }}
    </textarea>

    <x-form.error name="{{ $name }}"/>
    
  </div>