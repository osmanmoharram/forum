<x-guest-layout>
    
    <x-slot name="action">
        @auth
            @include('partials.notifications-user')
        @else
            <x-buttons.secondary class="py-sm w-24 text-sm">
                {{ __('Login') }}
            </x-buttons.secondary>
        @endauth
    </x-slot>

    <div class="min-h-screen bg-gray-100 flex flex-col">
        <!-- Sidebar -->
        @include('partials.side-bar')

        <div class="p-8 pb-16 sm:ml-52 flex-1 h-screen overflow-y-auto">
            <!-- Page Content -->
            {{ $slot }}
        </div>
    </div>

</x-guest-layout>