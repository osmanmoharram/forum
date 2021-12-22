@props(['submit' => false])

{{-- <a {{ $attributes->merge(['class' => 'block px-6 py-3 bg-gray-100 rounded border text-xs tracking-wider transition duration-200 ease-in-out'])}}>
	{{ $slot }}
</a> --}}

<a {{ $submit ? @click.prevent="document.querySelector('form').submit()" $attributes->merge(['class' => 'bg-primary text-white text-sm text-center font-medium rounded-md']) }}>
	{{ $slot }}
</a>



{{-- <button  {{ $attributes->merge(['class' => 'py-sm rounded-md bg-blue-500 hover:bg-blue-600 text-sm text-white tracking-wider transition duration-200 ease-in-out']) }}>
	{{ $slot }}
</button> --}}