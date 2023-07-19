<x-app-layout>
    <x-slot name="tittle_section">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ url('user/'.$user->id.'/actualizar') }}">
                        @method('PUT')
                        @csrf

                        <!-- Name -->
                        <div>
                            <x-input-label for="nombre" :value="__('Nombre')" />
                            <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre', $user->nombre)" required autofocus autocomplete="nombre" />
                            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                        </div>

                        <!-- Apellido -->
                        <div>
                            <x-input-label for="apellido" :value="__('Apellido')" />
                            <x-text-input id="apellido" class="block mt-1 w-full" type="text" name="apellido" :value="old('apellido', $user->apellido)" required autofocus autocomplete="apellido" />
                            <x-input-error :messages="$errors->get('apellido')" class="mt-2" />
                        </div>

                        <!-- Celular -->
                        <div>
                            <x-input-label for="celular" :value="__('Celular')" />
                            <x-text-input id="celular" class="block mt-1 w-full" type="text" name="celular" :value="old('celular', $user->celular)" required autofocus autocomplete="celular" />
                            <x-input-error :messages="$errors->get('celular')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $user->email)" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Tipo Documento -->
                        <div class="mt-4">
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

                        <!-- Numero Documento -->
                        <div class="mt-4">
                            <x-input-label for="numero_documento" :value="__('Numero de Documento')" />
                            <x-text-input id="numero_documento" class="block mt-1 w-full" type="text" name="numero_documento" :value="old('numero_documento', $user->numero_documento)" required autocomplete="numero_documento" />
                            <x-input-error :messages="$errors->get('numero_documento')" class="mt-2" />
                        </div>

                        <!-- sede -->
                        <div class="mt-4">
                            <x-input-label for="sede" :value="__('sede')" />
                            <select name="sede_id" id="sede" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                @foreach ($sedes as $sede)
                                    <option value="{{ $sede->id }}">{{ $sede->nombre }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('sede')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Password')" />

                            <x-text-input id="password" class="block mt-1 w-full"
                                            type="password"
                                            name="password"
                                            autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Actualizar') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
