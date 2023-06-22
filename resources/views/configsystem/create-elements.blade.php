<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear elementos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('create-element') }}">
                        @csrf

                        <!-- Referencia -->
                        <div>
                            <x-input-label for="referencia" :value="__('Referencia')"/>
                            <x-text-input id="referencia" class="block mt-1 w-full" type="text" name="referencia" :value="old('referencia')" onkeyup="javascript:this.value=this.value.toUpperCase();"  required autofocus autocomplete="referencia"/>
                            <x-input-error :messages="$errors->get('referencia')" class="mt-2"/>
                        </div>

                        <!-- Nombre -->
                        <div>
                            <x-input-label for="nombre" :value="__('Nombre')"/>
                            <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" onkeyup="javascript:this.value=this.value.toUpperCase();"  required autofocus autocomplete="nombre"/>
                            <x-input-error :messages="$errors->get('nombre')" class="mt-2"/>
                        </div>

                        <!-- Unidad de medida -->
                        <div>
                            <x-input-label for="unidad_medida" :value="__('Unidad de medida')"/>
                            <x-text-input id="unidad_medida" class="block mt-1 w-full" type="text" name="unidad_medida" :value="old('unidad_medida')"  required autofocus autocomplete="unidad_medida"/>
                            <x-input-error :messages="$errors->get('unidad_medida')" class="mt-2"/>
                        </div>

                         <!-- Valor venta al publico -->
                         <div>
                            <x-input-label for="valor_venta_publico" :value="__('Valor venta al publico')"/>
                            <x-text-input id="valor_venta_publico" class="block mt-1 w-full" type="number" name="valor_venta_publico" :value="old('valor_venta_publico')"  required autofocus autocomplete="valor_venta_publico"/>
                            <x-input-error :messages="$errors->get('valor_venta_publico')" class="mt-2"/>
                        </div>
                        <!-- Valor venta a las sedes -->
                        <div>
                            <x-input-label for="valor_venta_sede" :value="__('Valor venta a las sedes')"/>
                            <x-text-input id="valor_venta_sede" class="block mt-1 w-full" type="number" name="valor_venta_sede" :value="old('valor_venta_sede')"  required autofocus autocomplete="valor_venta_sede"/>
                            <x-input-error :messages="$errors->get('valor_venta_sede')" class="mt-2"/>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Crear elemento') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function mayus(e){
            let tecla = e.value;
            let
        }

    </script>

</x-app-layout>
