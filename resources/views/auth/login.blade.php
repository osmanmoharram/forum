<x-auth-layout>
    <x-slot name="authAction">
        <x-link href="{{ route('register') }}" class="text-blue-500 bg-blue-50 hover:bg-blue-100">
            {{ __('Register') }}
        </x-link>
    </x-slot>

    <!-- Registration Form -->
    <div class="flex flex-col items-center justify-center space-y-8">
        <h1 class="font-semibold text-lg text-gray-500 tracking-wide">{{ __('Welcome Back!') }}</h1>

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="flex flex-col space-y-4 mb-8">
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

				<a href="#" class="block mt-3 ml-1 text-sm text-gray-500 text-opacity-80 tracking-wide hover:underline hover:text-blue-500 transition duration-200 ease-in-out">
					{{ __('Can\'t remember your magic word?') }}
				</a>
            </div>

            <x-button type="submit" class="w-72 hover:shadow-lg">
                {{ __('Login') }}
            </x-button>

            <x-buttons.primary type="submit" role="button" class="block py-sm mt-6">
                {{ __('Login') }}
            </x-buttons.primary>
        </form>

        <a href="#" class="text-sm text-gray-500 text-opacity-80 tracking-wide hover:underline hover:text-blue-500 transition duration-200 ease-in-out">
			{{ __('Create new account') }}
		</a>
    </div>

    <!-- Registration Form -->
    <x-slot name="illustration">
        <img src="{{ asset('img/login.svg') }}" alt="register" class="">
    </x-slot>
</x-auth-layout>

