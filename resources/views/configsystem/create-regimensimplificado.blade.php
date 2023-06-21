<x-guest-layout>
    <form method="POST" action="{{ route('create-regimensimplificado') }}">
        @csrf

        <!-- nombre -->
        <div>
            <x-input-label for="nombre" :value="__('Nombre')"/>
            <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')"  required autofocus autocomplete="nombre"/>
            <x-input-error :messages="$errors->get('nombre')" class="mt-2"/>
        </div>

        <!-- nit -->
        <div>
            <x-input-label for="nit" :value="__('Nit')"/>
            <x-text-input id="nit" class="block mt-1 w-full" type="text" name="nit" :value="old('nit')"  required autofocus autocomplete="nit"/>
            <x-input-error :messages="$errors->get('nit')" class="mt-2"/>
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Crear') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
