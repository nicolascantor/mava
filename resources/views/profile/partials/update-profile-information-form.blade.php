<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="nombre" :value="__('Nombre')" />
            <x-text-input id="nombre" name="nombre" type="text" class="mt-1 block w-full" :value="old('nombre', $user->nombre)" required autofocus autocomplete="nombre" />
            <x-input-error class="mt-2" :messages="$errors->get('nombre')" />
        </div>
        <div>
            <x-input-label for="apellido" :value="__('Apellido')" />
            <x-text-input id="apellido" name="apellido" type="text" class="mt-1 block w-full" :value="old('apellido', $user->apellido)" required autofocus autocomplete="apellido" />
            <x-input-error class="mt-2" :messages="$errors->get('apellido')" />
        </div>
        <div>
            <x-input-label for="celular" :value="__('celular')" />
            <x-text-input id="celular" name="celular" type="text" class="mt-1 block w-full" :value="old('celular', $user->celular)" required autofocus autocomplete="celular" />
            <x-input-error class="mt-2" :messages="$errors->get('celular')" />
        </div>
        <div >
            <x-input-label for="tipo_documento" :value="__('Tipo de documento')" />
            <select name="tipo_documento" id="tipo_documento" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                <option disabled selected>Seleccione una opción</option>
                <option value="ti">Tarjeta de identidad</option>
                <option value="cc">Cedula de Ciudadania</option>
                <option value="ce">Cedula de Extranjeria</option>
                <option value="pa">Pasaporte</option>
            </select>
            <x-input-error :messages="$errors->get('tipo_documento')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="numero_documento" :value="__('Numero de documento')" />
            <x-text-input id="numero_documento" name="numero_documento" type="text" class="mt-1 block w-full" :value="old('numero_documento', $user->numero_documento)" required autofocus autocomplete="numero_documento" />
            <x-input-error class="mt-2" :messages="$errors->get('numero_documento')" />
        </div>
        <!-- sede -->
        <div>
            <x-input-label for="sede" :value="__('sede')" />
            <select name="sede_id" id="sede" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">

                @foreach ($sedes as $sede)
                    @if($sede->nombre == $user->sede->nombre)
                        <option selected value="{{ $sede->id }}">{{ $sede->nombre }}</option>
                    @endif
                    <option value="{{ $sede->id }}">{{ $sede->nombre }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('sede')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Actualizar') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
