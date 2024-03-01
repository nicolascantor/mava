<div>
    <div class="flex flex-row w-full mr-5">
        <div class="mr-5">
            <h2>SELECCIONE LOS ELEMENTOS A PEDIR</h2>
        </div>
        <div>
            <livewire:show-elemento>
        </div>
    </div>
    <div>
        <h2>Elementos seleccionados</h2>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 lg:p-2 lg:m-1 border-slate-500">
            <thead class="text-lg text-gray-700  bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr scope="col" class="px-6 py-3 text-center">
                    <th>Eliminar</th>
                    <th>Referencia</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Observaciones</th>
                </tr>
            </thead>
            <tbody>
                @if($elementosSeleccionados)
                @foreach ($elementosSeleccionados as $key => $elementoSeleccionado)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-center">
                    <td class="px-6 py-4">
                        <button wire:click="deleteElement({{ $key }})">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20" width="17.5" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#de1b1b" d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"/></svg>
                        </button>
                    </td>
                    <td class="px-6 py-4">{{ $elementoSeleccionado['referencia']}}</td>
                    <td class="px-6 py-4">{{ $elementoSeleccionado['nombre']}}</td>
                    <td class="px-6 py-4">{{ $elementoSeleccionado['cantidad']}}</td>
                    <td class="px-6 py-4">{{ $elementoSeleccionado['observacion']}}</td>
                </tr>
                @endforeach
                @else
            <h1>Por favor selecciones uno o varios elementos a pedir</h1>
            @endif
            </tbody>
        </table>
    </div>
</div>
