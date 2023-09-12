@props(['disabled' => false,
'name',
'label' =>null,
'placeholder' => null,
'type' => 'text',
'value' => null
])
@php
    $fieldId = $name.'-'.Str::uuid(); //permet d'avoir un id unique même si on a plusieurs input similaires
@endphp
@if($label)
    <label class="block text-gray-700 text-sm font-bold mb-2" for="{{ $fieldId }}">{{ $label }}</label>
@endif
<p>{{$name}}</p>
<input
    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
    id="{{ $fieldId }}" @if($placeholder) placeholder="{{ $placeholder }}" @endif
    name="{{ $name }}"
    value="{{ old($name, $value) }}"
    type="{{ $type}}">
@error('$name')
<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
    <strong class="font-bold">Attention : </strong>
    <span class="block sm:inline">{{$message}}</span>
    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path
            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
  </span>
</div>
@enderror
