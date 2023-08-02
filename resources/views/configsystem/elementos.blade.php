<x-app-layout>
    <x-slot name="tittle_section">
        {{ __('Elementos') }}
    </x-slot>

    <div>
        <div>
            <div class="w-full mb-3">
                <a href="{{ route('create-element') }}" class="rounded-2xl bg-green-400 p-2 text-white uppercase">
                        <span>Nuevo elemento</span>
                </a>
                <a href="{{ route('elementos-masivo') }}" class="rounded-2xl bg-green-400 p-2 text-white uppercase">
                    <span>Cargar masivamente</span>
            </a>
            </div>
            <div class="w-full mt-7">
                @if(count($elementos)>0)
                    <table class="table-auto rounded-lg border-collapse border border-slate-500 w-full">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border border-slate-600 ...">Referencia</th>
                                <th class="border border-slate-600 ...">nombre</th>
                                <th class="border border-slate-600 ...">Unidad medida</th>
                                <th  class="border border-slate-600 ...">Valor venta publico</th>
                                <th  class="border border-slate-600 ...">Valor venta sede</th>
                                <th  class="border border-slate-600 ...">Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($elementos as $elemento)
                                <tr>
                                    <td class="border border-slate-700 pl-1 pr-1">{{ $elemento->referencia }} </td>
                                    <td class="border border-slate-700 pl-1 pr-1">{{ $elemento->nombre }}</td>
                                    <td class="border border-slate-700 pl-1 pr-1">{{ $elemento->unidad_medida }}</td>
                                    <td class="border border-slate-700 pl-1 pr-1">${{ number_format($elemento->valor_venta_publico) }}</td>
                                    <td class="border border-slate-700 pl-1 pr-1">${{ number_format($elemento->valor_venta_sede) }}</td>
                                    <td class="border border-slate-700 pl-1 pr-1"><a href={{ url('elemento/'.$elemento->id.'/edit') }} class="bg-amber-300 text-white w-full">Editar</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $elementos->links() }}
                @else
                    <span>No existen elementos en la base de datos creados</span>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
