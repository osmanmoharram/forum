<form
    action="{{ route('topics.index') }}"
    method="GET"
    class="mb-8 flex items-center overflow-hidden bg-gray-200 bg-opacity-80
    text-gray-700 text-opacity-60 rounded-md">

    @csrf

    <button type="submit" class="m-1 p-2 hover:bg-gray-300 hover:bg-opacity-50 text-gray-700 text-opacity-40 rounded-md transition duration-200 ease-in-out">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
    </button>

    <input
        type="text"
        name="search"
        value="{{ request('search') ?? '' }}"
        class="w-full bg-transparent p-0 border-none ring-0 focus:ring-0 outline-none focus:outline-none">
</form>
