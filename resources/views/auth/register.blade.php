<x-auth-layout>
    <x-slot name="authAction">
        <x-link href="{{ route('login') }}" class="text-blue-500 bg-blue-50 hover:bg-blue-100">
            {{ __('Login') }}
        </x-link>
    </x-slot>

    <!-- Registration Form -->
    <div class="flex flex-col items-center justify-center space-y-8">
        <h1 class="font-semibold text-lg text-gray-500 tracking-wide">{{ __('Join Our Community') }}</h1>

        <p class="text-sm text-center text-gray-500 text-opacity-80 tracking-wide">
            {{ __('Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum, debitis.') }}</p>

        <form action="{{ route('register') }}" method="POST">
            @csrf

            <div class="flex flex-col space-y-4 mb-8">
                <div>
                    <x-input type="text" name="name" placeholder="What do you what us to call you?" />
                    @error('name')
                        <span class="block text-red-500 text-xs mt-1 ml-1">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div>
                    <x-input type="email" name="email" placeholder="What's your email?" />
                    @error('email')
                        <span class="block text-red-500 text-xs mt-1 ml-1">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div>
                    <x-input type="password" name="password" placeholder="What's the magic word?" />
                    @error('password')
                        <span class="block text-red-500 text-xs mt-1 ml-1">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div>
                    <x-input type="password" name="password_confirmation" placeholder="Say it again..." />
                    @error('password_confirmation')
                        <span class="block text-red-500 text-xs mt-1 ml-1">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>

            <x-button type="submit" class="w-72 hover:shadow-lg">
                {{ __('Register') }}
            </x-button>
        </form>

        <a href="#"
            class="text-sm text-gray-500 text-opacity-80 tracking-wide hover:underline hover:text-blue-500 transition duration-200 ease-in-out">{{ __('Already have an account?') }}</a>
    </div>

    <!-- Registration Form -->
    <x-slot name="illustration">
        <img src="{{ asset('img/register.svg') }}" alt="register" class="">
    </x-slot>
</x-auth-layout>
