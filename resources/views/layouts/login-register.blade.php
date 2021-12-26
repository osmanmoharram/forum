<x-guest-layout>
    <x-slot name="action"></x-slot>

    <!-- Page Content -->
    <div class="h-screen max-w-7xl mx-auto">
        <div class="grid grid-cols-12 gap-x-6 items-center justify-between pt-20">
            <!-- Form -->
            <div class="col-span-12 md:col-span-5">
                {{ $slot }}
            </div>
    
            <!-- Illustration -->
            <div class="hidden col-span-0 md:block md:col-span-7">
                {{ $illustration }}
            </div>
        </div>
    </div>
</x-guest-layout>