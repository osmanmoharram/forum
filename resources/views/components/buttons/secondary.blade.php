@props(['value'])

<a {{ $attributes->merge(['class' => 'block bg-blue-50 hover:bg-blue-100 text-sm font-medium border border-blue-200 cursor-pointer text-blue-300 hover:text-blue-400 text-center rounded-md transition duration-200 ease-in-out']) }}>
	{{ ucwords($value ?? $slot) }}
</a>
