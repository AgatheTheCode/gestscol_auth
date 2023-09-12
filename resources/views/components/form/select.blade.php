@props(['disabled' => false,
'name',
'label' =>null,
'placeholder' => null,
'type' => 'text',
'value' => null,
'option' => null,
]);

@php
    $fieldId = $name.'-'.Str::uuid(); //permet d'avoir un id unique même si on a plusieurs input
@endphp
@if($label)
    <label class="block text-gray-700 text-sm font-bold mb-2" for="{{ $fieldId }}">{{ $label }}</label>
@endif

<select>
    <option value="0"></option>
    @foreach($options as $id => $name)
        <option value="{{ $id }}" {{ $id == $selected ? 'selected' : '' }}>{{ $name }}</option>
    @endforeach
</select>
