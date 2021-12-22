{{-- <a {{ $attributes->merge(['class' => 'block p py-sm bg-gray-100 rounded border text-xs tracking-wider transition duration-200 ease-in-out'])}}>
	{{ $slot }}
</a> --}}

<a {{ $attributes->merge(['class' => 'block bg-blue-50 hover:bg-blue-100 font-medium border border-blue-200 cursor-pointer text-blue-300 hover:text-blue-400 text-center rounded-md transition duration-200 ease-in-out']) }}>
	{{ $slot }}
</a>
