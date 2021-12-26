<div class="flex items-center space-x-6">

    <!-- Notification -->
    <x-dropdown width="w-64 sm:w-96">
        <x-slot name="trigger"
            class="relative cursor-pointer space-x-2 text-gray-700 text-opacity-40 hover:text-blue-400 transition duration-200 ease-in-out">
            <div class="h-2 w-2 rounded-full bg-red-500 bg-opacity-90 absolute -right-0.5"></div>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
        </x-slot>

        <x-slot name="content" class="">
            <x-dropdown-link href="#" class="text-xs my-2">
                {{ __(' Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio quam ab placeat? Praesentium eligendi fugit fugiat veritatis sed ea esse.  ') }}
            </x-dropdown-link>

            <hr>

            <x-dropdown-link href="#" class="text-xs my-2">
                {{ __(' Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio quam ab placeat? Praesentium eligendi fugit fugiat veritatis sed ea esse.  ') }}
            </x-dropdown-link>
        </x-slot>
    </x-dropdown>

    <!-- User Avatar -->
    <x-dropdown width="w-32" class="py-10">
        <x-slot name="trigger" class="cursor-pointer">
            <img class="h-8 w-8 sm:h-10 sm:w-10   rounded-full object-cover" src="{{ asset('img/model.jpg') }}" alt="Avatar">
        </x-slot>

        <x-slot name="content" class="space-y-2 text-center">
            <x-dropdown-link href="#" class="flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>

                <span>{{ __('Profile') }}</span>
            </x-dropdown-link>

            <x-dropdown-link href="#">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf

                    <button class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>

                        <span>{{ __('Logout') }}</span>
                    </button>
                </form>
            </x-dropdown-link>
        </x-slot>
    </x-dropdown>
    
</div>