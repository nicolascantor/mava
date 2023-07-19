<x-app-layout>
    <x-slot name="tittle_section">
        {{ __('Editar Elemento') }}
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
                    <form method="POST" action="{{ url('elemento/'.$elemento->id.'/update') }}">
                        @method('PUT')
                        @csrf

                        <!-- Referencia -->
                        <div>
                            <x-input-label for="referencia" :value="__('Referencia')"/>
                            <x-text-input id="referencia" class="block mt-1 w-full" type="text" name="referencia" :value="old('referencia', $elemento->referencia)" onkeyup="javascript:this.value=this.value.toUpperCase();"  required autofocus autocomplete="referencia"/>
                            <x-input-error :messages="$errors->get('referencia')" class="mt-2"/>
                        </div>

                        <!-- Nombre -->
                        <div>
                            <x-input-label for="nombre" :value="__('Nombre')"/>
                            <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre', $elemento->nombre)" onkeyup="javascript:this.value=this.value.toUpperCase();"  required autofocus autocomplete="nombre"/>
                            <x-input-error :messages="$errors->get('nombre')" class="mt-2"/>
                        </div>

                        <!-- Unidad de medida -->
                        <div>
                            <x-input-label for="unidad_medida" :value="__('Unidad de medida')"/>
                            <x-text-input id="unidad_medida" class="block mt-1 w-full" type="text" name="unidad_medida" :value="old('unidad_medida', $elemento->unidad_medida)"  required autofocus autocomplete="unidad_medida"/>
                            <x-input-error :messages="$errors->get('unidad_medida')" class="mt-2"/>
                        </div>

                         <!-- Valor venta al publico -->
                         <div>
                            <x-input-label for="valor_venta_publico" :value="__('Valor venta al publico')"/>
                            <x-text-input id="valor_venta_publico" class="block mt-1 w-full" type="number" name="valor_venta_publico" :value="old('valor_venta_publico', $elemento->valor_venta_publico)"   autofocus autocomplete="valor_venta_publico"/>
                            <x-input-error :messages="$errors->get('valor_venta_publico')" class="mt-2"/>
                        </div>
                        <!-- Valor venta a las sedes -->
                        <div>
                            <x-input-label for="valor_venta_sede" :value="__('Valor venta a las sedes')"/>
                            <x-text-input id="valor_venta_sede" class="block mt-1 w-full" type="number" name="valor_venta_sede" :value="old('valor_venta_sede', $elemento->valor_venta_sede)"   autofocus autocomplete="valor_venta_sede"/>
                            <x-input-error :messages="$errors->get('valor_venta_sede')" class="mt-2"/>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Editar elemento') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>

            </div>

        </div>

    </div>

</x-app-layout>
