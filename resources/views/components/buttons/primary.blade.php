@props(['value'])

<a {{ $attributes->merge(['class' => 'bg-primary text-white text-sm text-center font-medium rounded-md cursor-pointer hover:shadow-lg transition duration-200 ease-in-out']) }}>
	{!! ucwords($value ?? $slot) !!}
</a>