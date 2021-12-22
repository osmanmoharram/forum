@props(['disabled' => false])

@php
	if ($errors->has($attributes->get('name'))) {
		$classes = 'w-72 border-red-500 text-sm placeholder-gray-300 focus:border-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-50 transition duration-200 ease-in-out rounded';
	} else {
		$classes = 'w-72 border-gray-200 text-sm placeholder-gray-300 focus:border-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-50 transition duration-200 ease-in-out rounded';
	}
@endphp

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => $classes]) !!}/>