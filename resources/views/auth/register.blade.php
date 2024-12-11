<x-guest-layout>
    <div class="">
        <div
            class="bg-[#F5F5F5] h-screen grid md:grid-cols-2 p-12 md:grid-rows-1 grid-rows-2 justify-center items-center">
            <div class="">
                <div class="md:w-4/5 bg-white p-12 rounded-md">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mt-4">
                            <x-label for="name" value="{{ __('Name') }}" />
                            <x-input id="name" autofocus class="block mt-1 w-full" type="text" name="name" required
                                autocomplete="given-name" />
                        </div>

                        <div class="mt-4">
                            <x-label for="last_name" value="{{ __('Last Name') }}" />
                            <x-input id="last_name" autofocus class="block mt-1 w-full" type="text" name="last_name"
                                required autocomplete="family-name" />
                        </div>

                        <div class="mt-4">
                            <x-label for="email" value="{{ __('Email') }}" />
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email')" required autocomplete="username" />
                        </div>


                        <div class="mt-4">
                            <x-label for="password" value="{{ __('Password') }}" />
                            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                                autocomplete="new-password" />
                        </div>

                        <div class="mt-4">
                            <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                            <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                name="password_confirmation" required autocomplete="new-password" />
                        </div>

                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mt-4">
                            <x-label for="terms">
                                <div class="flex items-center">
                                    <x-checkbox name="terms" id="terms" required />

                                    <div class="ms-2">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'"
                                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms
                                            of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'"
                                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy
                                            Policy').'</a>',
                                        ]) !!}
                                    </div>
                                </div>
                            </x-label>
                        </div>
                        @endif

                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>

                            <x-button class="ms-4">
                                {{ __('Register') }}
                            </x-button>
                        </div>

                    </form>
                </div>
            </div>
            <div class="flex flex-col">
                <div class="text-center">
                    <h3 class="text-3xl font-bold">Bienvenido a WaterWise</h3>
                    <h5 class="text-2xl font-semibold">Registrate acá</h5>
                </div>
                <div class="flex justify-center">
                    <img src="{{asset('assets/img/WaterWise/logo_no-bg.png')}}" class="md:h-72 h-32" alt="">
                </div>
            </div>

        </div>

    </div>
</x-guest-layout>