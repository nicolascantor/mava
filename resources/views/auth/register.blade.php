<x-app-layout>
    <x-slot name="tittle_section">
        {{ __('Crear Nuevo Usuario') }}
    </x-slot>
    <div class="flex w-full justify-center">
        <div class="flex flex-col justify-items-center w-full">

            <div class="bg-gray-200 justify-items-center text-center rounded-lg mb-7">
                <span class="text-gray-500 text-">
                    Nuevo Usuario
                </span>
            </div>

            <div class="justify-center">
                <div class="lg:mx-32 justify-center lg:w-3/4">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name -->
                        <div>
                            <x-input-label for="nombre" :value="__('Nombre')" />
                            <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus autocomplete="nombre" />
                            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                        </div>

                        <!-- Apellido -->
                        <div>
                            <x-input-label for="apellido" :value="__('Apellido')" />
                            <x-text-input id="apellido" class="block mt-1 w-full" type="text" name="apellido" :value="old('apellido')" required autofocus autocomplete="apellido" />
                            <x-input-error :messages="$errors->get('apellido')" class="mt-2" />
                        </div>

                        <!-- Celular -->
                        <div>
                            <x-input-label for="celular" :value="__('Celular')" />
                            <x-text-input id="celular" class="block mt-1 w-full" type="text" name="celular" :value="old('celular')" required autofocus autocomplete="celular" />
                            <x-input-error :messages="$errors->get('celular')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
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
                            <x-text-input id="numero_documento" class="block mt-1 w-full" type="text" name="numero_documento" :value="old('numero_documento')" required autocomplete="numero_documento" />
                            <x-input-error :messages="$errors->get('numero_documento')" class="mt-2" />
                        </div>

                        <!-- sede -->
                        <div class="mt-4">
                            <x-input-label for="sede" :value="__('sede')" />
                            <select name="sede_id" id="sede" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option disabled selected>Seleccione una opción</option>
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
                                            required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                            type="password"
                                            name="password_confirmation" required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>

                            <x-primary-button class="ml-4">
                                {{ __('Register') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>

            </div>

        </div>

</x-app-layout>
