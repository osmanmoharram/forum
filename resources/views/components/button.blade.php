@props(['disabled' => false])

<button {{ $disabled ? 'disabled' : '' }} {{ $attributes->merge(['class' => 'py-sm rounded-md bg-blue-500 hover:bg-blue-600 text-sm text-white tracking-wider transition duration-200 ease-in-out']) }}>
	{{ $slot }}
</button>