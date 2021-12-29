<x-app-layout>
    <div class="max-w-3xl lg:ml-24 space-y-6">
        @include('partials.search-bar')

        @forelse ($topics as $topic)
            <div class="bg-white p-6 shadow rounded-md space-y-5">
                <section>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <img class="h-12 w-12 rounded-full object-cover" src="{{ $topic->creator->avatar }}" alt="Avatar">

                            <div class="flex flex-col space-y-px">
                                <a href="#"
                                    class="text-md text-blue-400 tracking-wide hover:underline transition duration-200 ease-in-out">
                                    {{ $topic->creator->name }}
                                </a>
                                <span class="text-sm text-gray-700 text-opacity-60">{{ $topic->created_at->diffForHumans() }}</span>
                            </div>
                        </div>

                        <x-dropdown width="w-32" align="lg:left">
                            <x-slot name="trigger"
                                class="text-gray-400 hover:text-gray-500 transition duration-200 ease-in-out cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                </svg>
                            </x-slot>

                            <x-slot name="content" class="space-y-2 text-center">
                                <x-dropdown-link href="#" class="flex items-center space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                                    </svg>

                                    <span class="text-sm">
                                        {{ __('Share') }}
                                    </span>
                                </x-dropdown-link>

                                <x-dropdown-link href="#" class="flex items-center space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>

                                    <span class="text-sm">
                                        {{ __('Edit') }}
                                    </span>
                                </x-dropdown-link>

                                <x-dropdown-link href="#" class="flex items-center space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>

                                    <form action="#" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit">{{ __('Delete') }}</button>
                                    </form>
                                </x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </section>

                <a href="#" class="block rounded-md bg-gray-50 hover:bg-gray-100 text-gray-700 text-opacity-60 tracking-wide p-3 transition duration-200 ease-in-out">
                    <section class="">
                        <h4 class="text-lg font-semibold text-gray-700">{{ $topic->title }}</h4>
                        <p class="mt-1 line-clamp-2">{{ $topic->body }}</p>
                    </section>
                </a>

                <section class="flex flex-col md:flex-row items-start md:items-center justify-between space-y-5 md:space-y-0">
                    <div class="flex items-center space-x-2">
                        @foreach ($topic->tags as $tag)
                            <x-tag>{{ $tag->name }}</x-tag>
                        @endforeach
                    </div>

                    <div class="flex items-center space-x-4">
                        <div
                            class="flex items-center space-x-1 text-xs text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                <path fill-rule="evenodd"
                                    d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>125</span>
                        </div>

                        <div
                            class="flex items-center space-x-1 text-xs text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>28</span>
                        </div>
                    </div>
                </section>
            </div>
        @empty
            <span>no topics</span>
        @endforelse
        {{ $topics->links() }}
    </div>
</x-app-layout>
