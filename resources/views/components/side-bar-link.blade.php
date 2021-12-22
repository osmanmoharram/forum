@props(['href' => '#'])

<a href="{{ $href }}" class="flex items-center space-x-2 w-full p-3 text-main text-sm hover:text-blue-400 hover:bg-blue-50 rounded transition duration-200 ease-in-out">
	{{ $slot }}
</a>
