<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="numero_documento" :value="__('Numero de documento')" />
            <x-text-input id="numero_documento" class="block mt-1 w-full" type="text" name="numero_documento" :value="old('numero_documento')" required autofocus autocomplete="numero_documento" />
            <x-input-error :messages="$errors->get('numero_documento')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-3">
                {{ __('Ingresar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
