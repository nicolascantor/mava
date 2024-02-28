<x-app-layout>
    <x-slot name="tittle_section">
        {{ __('Crear un nuevo pedido') }}
    </x-slot>

    <div>
        <div>
            <div class="flex w-full justify-center">
                <div class="pt-10" ><img src="https://meicol.com/wp-content/uploads/2022/05/logo_-meicol.png" alt="imagen"></div>
            </div>

            <div  class="flex flex-row-reverse justify-between ">
                <div class="pr-32"><p class="font-bold text-xl">PEDIDO #12345</p></div>
            </div>
            <div class="flex flex-row text-xl">
                <dir class="w-1/2 m-0 p-0">
                    <h2 class="font-bold">DATOS DE LA SEDE</h2>
                    <p>Nombre: {{ Auth::user()->sede->nombre }}</p>
                    <p>Telefono: {{ Auth::user()->sede->telefono }}</p>
                    <p>Direccion: {{ Auth::user()->sede->direccion }}</p>
                    <p>Ciudad: {{ Auth::user()->sede->ciudad }}</p>
                </dir>
                <div class="w-1/2 m-0 p-0">
                    <h2 class="font-bold">DATOS DEL FUNCIONARIO</h2>
                    <p>Nombre: {{ Auth::user()->nombre }} {{ Auth::user()->apellido }}</p>
                    <p>Sede: {{ Auth::user()->sede->nombre }}</p>
                </div>
            </div>
            <div class="w-full mt-7">
                <livewire:create-order>
            </div>
        </div>
    </div>
</x-app-layout>
