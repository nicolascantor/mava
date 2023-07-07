<x-app-layout>
    <x-slot name="tittle_section">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear sedes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ url('sedes/'.$sede->id.'/update') }}">
                        @method('PUT')
                        @csrf

                        <!-- nombre -->
                        <div>
                            <x-input-label for="nombre" :value="__('Nombre')"/>
                            <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" value="{{ $sede->nombre }}"  required autofocus autocomplete="nombre"/>
                            <x-input-error :messages="$errors->get('nombre')" class="mt-2"/>
                        </div>

                        <!-- direccion -->
                        <div>
                            <x-input-label for="direccion" :value="__('Direccion')"/>
                            <x-text-input id="direccion" class="block mt-1 w-full" type="text" name="direccion" value="{{ $sede->direccion }}" required autofocus autocomplete="direccion"/>
                            <x-input-error :messages="$errors->get('direccion')" class="mt-2"/>
                        </div>

                        <!-- telefono -->
                        <div>
                            <x-input-label for="telefono" :value="__('Telefono')"/>
                            <x-text-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" value="{{ $sede->telefono }}"  required autofocus autocomplete="telefono"/>
                            <x-input-error :messages="$errors->get('telefono')" class="mt-2"/>
                        </div>

                         <!-- ciudad -->
                         <div>
                            <x-input-label for="ciudad" :value="__('Ciudad')"/>
                            <x-text-input id="ciudad" class="block mt-1 w-full" type="text" name="ciudad" value="{{ $sede->ciudad }}"  required autofocus autocomplete="ciudad"/>
                            <x-input-error :messages="$errors->get('ciudad')" class="mt-2"/>
                        </div>

                        <!-- Regimen simplificado -->
                        <div class="mt-4">
                            <x-input-label for="regimen_simplificado" :value="__('Regimen Simplificadonto')" />
                            <x-select-input id="regimen_simplificado" class="block mt-1 w-full" type="text" name="regimen_simplificado"
                             :options="$regimenes_simplificados"
                             :value="old('regimen_simplificado')" required autocomplete="regimen_simplificado" />
                            <x-input-error :messages="$errors->get('regimen_simplificado')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-edit-button class="ml-4">
                                {{ __('Editar') }}
                            </x-edit-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
