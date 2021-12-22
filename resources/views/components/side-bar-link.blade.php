@props(['href' => '#'])

<a href="{{ $href }}" class="flex items-center space-x-3 p-3 text-gray-700 text-opacity-60 text-sm hover:text-blue-400 hover:bg-blue-50 rounded-md transition duration-200 ease-in-out">
	{{ $slot }}
</a>
