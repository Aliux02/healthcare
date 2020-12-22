<x-guest-layout>
    <x-jet-authentication-card>
    <Style>
        h1{
            font-size: 80px;
        }
        a {
            color:blue !important;
            text-decoration: underline;
        }
    </Style>
        <x-slot name="logo">
            <h1>Paciento registracija</h1>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />
        <a href="{{ route('home') }}">atgal</a>
        <form method="POST" action="{{ route('patient.store') }}">
            @csrf

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

            
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('home') }}">
                    {{ __('Grizti i pacientu sarasa') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Uzregistruoti pacienta') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
