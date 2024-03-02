<x-app-layout>
    <x-slot name="tittle_section">
        {{ __('Pedidos') }}
    </x-slot>

    <div>
        <div>
            <div class="flex p-2 text-2xl text-blue-800 justify-center">
                <span>{{ Auth::user()->nombre }} {{ Auth::user()->apellido }} estos son los pedidos que has realziad para la sede {{ Auth::user()->sede->nombre }}:</span>
            </div>
            <div class="w-full mb-3">
                <a href="{{ route('create-order') }}" class="rounded-2xl bg-teal-500 p-2 text-white uppercase">
                        <span>Nuevo pedido</span>
                </a>
            </div>
            <div class="w-full mt-7">
                @if(count($pedidos)>0)
                    <table class="table-fixed w-full">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border border-slate-400 ...">No</th>
                                <th class="border border-slate-400 ...">Fecha</th>
                                <th class="border border-slate-400 ...">Estado</th>
                                <th class="border border-slate-400 ...">Ver Detalles</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pedidos as $pedido)
                                <tr>
                                    <td class="border border-slate-400 pl-1 pr-1">{{ $pedido->id }} </td>
                                    <td class="border border-slate-400 pl-1 pr-1">{{ $pedido->fecha }}</td>
                                    <td class="border border-slate-400 pl-1 pr-1 justify-center">{{ $pedido->estado }}</td>
                                    <td class="flex border border-slate-400 content-center justify-center p-0 m-0"><a href="#" class="w-full p-0 m-0 bg-teal-400 text-blue-900 text-center hover:bg-teal-500">Ver detalles</a></td>
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
