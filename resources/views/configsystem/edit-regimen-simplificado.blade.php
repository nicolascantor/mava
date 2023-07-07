<x-app-layout>
    <x-slot name="tittle_section">
        {{ __('Editar Regimen Simplificado') }}
    </x-slot>


    <div class="flex w-full justify-center">
        <div class="flex flex-col justify-items-center w-full">

            <div class="bg-gray-200 justify-items-center text-center rounded-lg mb-7">
                <span class="text-gray-500 text-">
                    Nuevo formulario
                </span>
            </div>

            <div class="justify-center">
                <div class="lg:mx-32 justify-center lg:w-3/4">
                    <form method="POST" action="{{ url('regimensimplificado/'.$regimen_simplificado->id.'/update') }}">
                        @method('PUT')
                        @csrf

                        <!-- nombre -->
                        <div>
                            <x-input-label for="nombre" :value="__('Nombre')"/>
                            <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" value="{{ $regimen_simplificado->nombre }}"  required autofocus autocomplete="nombre"/>
                            <x-input-error :messages="$errors->get('nombre')" class="mt-2"/>
                        </div>

                        <!-- nit -->
                        <div>
                            <x-input-label for="nit" :value="__('Nit')"/>
                            <x-text-input id="nit" class="block mt-1 w-full" type="text" name="nit" value="{{ $regimen_simplificado->nit }}"  required autofocus autocomplete="nit"/>
                            <x-input-error :messages="$errors->get('nit')" class="mt-2"/>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-edit-button>
                                {{ __('Editar') }}
                            </x-edit-button>
                        </div>
                    </form>
                </div>

            </div>

        </div>

    </div>

</x-app-layout>
