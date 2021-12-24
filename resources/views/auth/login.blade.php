<x-login-register-layout>
    <!-- Login Form -->
    <div x-data class="flex flex-col items-center justify-center space-y-8">
        <h1 class="font-semibold text-lg text-gray-700 text-opacity-70 tracking-wide">{{ __('Welcome Back!') }}</h1>

        <form action="{{ route('login') }}" method="POST" class="login-form">
            @csrf

            <div class="flex flex-col space-y-4 mb-8">
				<div>
					<x-fields.label for="email" value="email" />

					<x-fields.input class="w-72" type="email" name="email" placeholder="What's your email?" />

					@error('email')
						<span class="block text-red-500 text-xs mt-1 ml-1">
							{{ $message }}
						</span>
					@enderror
				</div>
    
				<div>
					<x-fields.label for="password" value="password" />
					
					<x-fields.input class="w-72" type="password" name="password" placeholder="What's the magic word?" />

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

            <x-buttons.primary class="block py-sm mt-6" @click.prevent="document.querySelector('.login-form').submit()">
                {{ __('Login') }}
            </x-buttons.primary>
        </form>

        <a href="{{ route('register') }}" class="text-sm text-gray-700 text-opacity-60 tracking-wide hover:underline hover:text-primary transition duration-200 ease-in-out">
			{{ __('Create new account') }}
		</a>
    </div>

    <x-slot name="illustration">
        <img src="{{ asset('img/login.svg') }}" alt="register" class="">
    </x-slot>
</x-login-register-layout>