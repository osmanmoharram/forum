<x-login-register-layout>
    <!-- Registration Form -->
    <div x-data class="flex flex-col items-center justify-center space-y-6">
        <h1 class="font-semibold text-lg text-gray-700 text-opacity-70 tracking-wide">{{ __('Join Our Community') }}</h1>

        <p class="text-sm text-center text-gray-500 text-opacity-80 tracking-wide">
            {{ __('Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum, debitis.') }}</p>

        <form action="{{ route('register') }}" method="POST" class="register-form">
            @csrf

            <div class="flex flex-col space-y-3 mb-8">
                <div>
                    <x-fields.label for="name" value="name" />

                    <x-fields.input class="w-72" type="text" name="name" placeholder="What do you what us to call you?" />
                        
                    @error('name')
                        <span class="block text-red-500 text-xs font-medium mt-2 ml-1">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div>
                    <x-fields.label for="email" value="email" />

                    <x-fields.input class="w-72" type="email" name="email" placeholder="What's your email?" />

                    @error('email')
                        <span class="block text-red-500 text-xs font-medium mt-2 ml-1">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div>
                    <x-fields.label for="password" value="password" />

                    <x-fields.input class="w-72" type="password" name="password" placeholder="What's the magic word?" />

                    @error('password')
                        <span class="block text-red-500 text-xs font-medium mt-2 ml-1">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div>
                    <x-fields.label for="password_confirmation" value="confirm password" />

                    <x-fields.input class="w-72" type="password" name="password_confirmation" placeholder="Say it again..." />

                    @error('password_confirmation')
                        <span class="block text-red-500 text-xs font-medium mt-2 ml-1">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>

            
            <x-buttons.primary class="block py-sm mt-6" @click.prevent="document.querySelector('.register-form').submit()">
                {{ __('Register') }}
            </x-buttons.primary>
        </form>

        <a href="{{ route('login') }}" class="text-sm text-gray-700 text-opacity-60 tracking-wide hover:underline hover:text-primary transition duration-200 ease-in-out">
            {{ __('Already have an account?') }}
        </a>
    </div>

    <!-- Registration Form -->
    <x-slot name="illustration">
        <img src="{{ asset('img/register.svg') }}" alt="register" class="">
    </x-slot>
</x-login-register-layout>
