
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<x-guest-layout>
    <x-jet-authentication-card>
    <Style>
        h1{
            font-size: 80px;
        }
    </Style>

        <x-slot name="logo">
            <h1>Gydytojo registracija</h1>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div id="hos1">

            </div>
            <input type="hidden" name="hospital" id="hos2">
            <script>
                    $("#hos1").load('{{route("hospitals")}}' );

            </script>
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
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Jau uzsiregistravot?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Gydytojo uzregistravimas') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
<script>
 function getHospitals(){
        hospitals=Array.from( document.getElementById('hospitals').selectedOptions).map(option => option.value+"|");
        document.getElementById("hos2").value=hospitals;
        }
</script>
