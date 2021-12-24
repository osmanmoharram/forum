@props(['value'])

@php
	if ($errors->has($attributes->get('name'))) {
		$classes = 'block p-3 text-sm placeholder-gray-700 placeholder-opacity-30 text-gray-700 text-opacity-90 rounded-md border-red-500 focus:border-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-50 transition duration-200 ease-in-out focus:ring-4 focus:ring-blue-200 focus:border-blue-500';
	} else {
		$classes = 'block p-3 text-sm placeholder-gray-700 placeholder-opacity-30 text-gray-700 text-opacity-90 rounded-md border-gray-200 focus:border-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-50 transition duration-200 ease-in-out focus:ring-4 focus:ring-blue-200 focus:border-blue-500';
	}
@endphp

<textarea {!! $attributes->merge(['class' => $classes]) !!}>{{ ucwords($value ?? $slot) }}</textarea>