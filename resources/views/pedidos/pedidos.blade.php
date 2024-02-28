<x-app-layout>
    <x-slot name="tittle_section">
        {{ __('Pedidos') }}
    </x-slot>

    <div>
        <div>
            <div class="w-full mb-3">
                <a href="{{ route('create-order') }}" class="rounded-2xl bg-green-400 p-2 text-white uppercase">
                        <span>Nuevo pedido</span>
                </a>
            </div>
            <div class="w-full mt-7">
                @if(count($pedidos)>0)
                    <table class="table-auto rounded-lg border-collapse border border-slate-500 w-full">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border border-slate-600 ...">No</th>
                                <th class="border border-slate-600 ...">Fecha</th>
                                <th class="border border-slate-600 ...">Estado</th>
                                <th class="border border-slate-600 ...">Ver Detalles</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pedidos as $pedido)
                                <tr>
                                    <td class="border border-slate-700 pl-1 pr-1">{{ $pedido->id }} </td>
                                    <td class="border border-slate-700 pl-1 pr-1">{{ $pedido->fecha }}</td>
                                    <td class="border border-slate-700 pl-1 pr-1">{{ $pedido->estado }}</td>
                                    <td class="border border-slate-700 pl-1 pr-1"><a href="#" class="bg-amber-300 text-white w-full">Editar</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $pedidos->links() }}
                @else
                    <span>No existen pedidos en la base de datos</span>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
