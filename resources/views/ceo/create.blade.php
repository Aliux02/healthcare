<x-guest-layout>
    <x-jet-authentication-card>
    <Style>
        h1{
            font-size: 60px;
        }
        a {
            color:blue !important;
            text-decoration: underline;
        }
    </Style>
        <x-slot name="logo">
            <h1>Ligonines vadovo registracija</h1>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />
        <a href="{{ route('home') }}">I pradzia</a>
        <form method="POST" action="{{ route('ceo.store') }}">
            @csrf
            <div>
                <x-jet-label for="hospital" value="{{ __('Hospital') }}" />
                <x-jet-input id="hospital" class="block mt-1 w-full" type="text" name="hospital" :value="old('hospital')" required autofocus autocomplete="hospital" />
            </div>

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="surname" value="{{ __('Surname') }}" />
                <x-jet-input id="surname" class="block mt-1 w-full" type="surname" name="surname" :value="old('surname')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="ak" value="{{ __('AK') }}" />
                <x-jet-input id="ak" class="block mt-1 w-full" type="ak" name="ak" :value="old('ak')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="phone" value="{{ __('Phone') }}" />
                <x-jet-input id="phone" class="block mt-1 w-full" type="phone" name="phone" :value="old('phone')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="address" value="{{ __('Address') }}" />
                <x-jet-input id="address" class="block mt-1 w-full" type="address" name="address" :value="old('address')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>
            
            <div class="flex items-center justify-end mt-4">


                <x-jet-button class="ml-4">
                    {{ __('Uzregistruoti vadova') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
