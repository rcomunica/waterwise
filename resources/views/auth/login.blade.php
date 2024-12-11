<x-guest-layout>
    <div class="">
        <div
            class="bg-[#F5F5F5] h-screen grid md:grid-cols-2 p-12 md:grid-rows-1 grid-rows-2 justify-center items-center">
            <div class="flex flex-col">
                <div class="text-center">
                    <h3 class="text-3xl font-bold">Bienvenido a WaterWise</h3>
                    <h5 class="text-2xl font-semibold">Inicia sesión</h5>
                </div>
                <div class="flex justify-center">
                    <img src="{{asset('assets/img/WaterWise/logo_no-bg.png')}}" class="md:h-72 h-32" alt="">
                </div>
            </div>
            <div class="">
                <div class="md:w-4/5 bg-white p-12 rounded-md">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div>
                            <x-label for="email" value="{{ __('Email') }}" />
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email')" required autofocus autocomplete="username" />
                        </div>

                        <div class="mt-4">
                            <x-label for="password" value="{{ __('Password') }}" />
                            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                                autocomplete="current-password" />
                        </div>

                        <div class="block mt-4">
                            <label for="remember_me" class="flex items-center">
                                <x-checkbox id="remember_me" name="remember" />
                                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                            @endif

                            <x-button class="ms-4">
                                {{ __('Log in') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</x-guest-layout>