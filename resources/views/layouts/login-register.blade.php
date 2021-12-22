<x-guest-layout>
    <!-- Login Or Resgister -->
    <x-slot name="action"></x-slot>

    <!-- Page Content -->
    <div class="h-screen grid grid-cols-12 gap-x-6 items-center justify-between px-8">
        <!-- Form -->
        <div class="col-span-12 md:col-span-5">
            {{ $slot }}
        </div>

        <!-- Illustration -->
        <div class="hidden col-span-0 md:block md:col-span-7">
            {{ $illustration }}
        </div>
    </div>
</x-guest-layout>