<x-app-layout>
    <x-slot name="tittle_section">
        {{ __('Orden de pedido') }}
    </x-slot>

    <div>
        <div>
            <div class="flex p-2 text-2xl text-blue-800 justify-center">
                <span>{{ Auth::user()->nombre }} {{ Auth::user()->apellido }}, tu pedido No. {{ $pedido->id }} de la sede: {{ Auth::user()->sede->nombre }}:</span>

            </div>
            <div class="flex flex-col w-full">
                <span>Fecha de creacion del pedido: {{ $pedido->fecha }}</span>
                <span>Autor del pedido: {{ Auth::user()->nombre }} {{ Auth::user()->apellido }}</span>
                <span>Estado del pedido: {{ $pedido->estado }}</span>
            </div>
            <div class="w-full mt-7">
                    <table class="table-fixed w-full">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border border-slate-400 ...">Referencia</th>
                                <th class="border border-slate-400 ...">Nombre</th>
                                <th class="border border-slate-400 ...">Cantidad</th>
                                <th class="border border-slate-400 ...">Observaciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($elementos as $elemento)
                                <tr>
                                    <td class="border border-slate-400 pl-1 pr-1">{{ $elemento->elemento->referencia }} </td>
                                    <td class="border border-slate-400 pl-1 pr-1">{{ $elemento->elemento->nombre }}</td>
                                    <td class="border border-slate-400 pl-1 pr-1 justify-center">{{ $elemento->cantidad }}</td>
                                    <td class="border border-slate-400 pl-1 pr-1 justify-center">{{ $elemento->obervacion }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="flex flex-row w-full justify-center pt-3">
                        <button class="bg-red-500 p-1 hover:bg-red-600 rounded-lg mx-2 text-white">Decargar PDF</button>
                        <button class="bg-green-500 p-1 hover:bg-green-600 rounded-lg text-white">Descargar Excel</button>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>
