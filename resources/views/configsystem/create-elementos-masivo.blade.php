<x-app-layout>
    <x-slot name="tittle_section">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear elementos masivamente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('cargue-masivo') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Referencia -->
                        <div>
                            <x-input-label for="referencia" :value="__('Por favor cargue el archivo con los elementos nuevos a crear')"/>
                            <input  class="block mt-1 w-full" type="file" name="elementos" accept=".csv"  required />
                            <x-input-error :messages="$errors->get('elementos')" class="mt-2"/>
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
