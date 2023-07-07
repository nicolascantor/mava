<x-app-layout>
    <x-slot name="tittle_section">
        {{ __('Sedes') }}
    </x-slot>

    <div>
        <div>
            <div class="w-full mb-3">
                <a href="{{ route('create-sede') }}" class="rounded-2xl bg-green-400 p-2 text-white uppercase">
                        <span>crear nueva sede</span>
                </a>
            </div>
            <div class="w-full mt-7">
                <table class="table-auto rounded-lg border-collapse border border-slate-500 w-full">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border border-slate-600 ...">Nombre</th>
                            <th class="border border-slate-600 ...">Direccion</th>
                            <th class="border border-slate-600 ...">Telefono</th>
                            <th  class="border border-slate-600 ...">Ciudad</th>
                            <th  class="border border-slate-600 ...">Regimen Simplificado</th>
                            <th  class="border border-slate-600 ...">Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sedes as $sede)
                            <tr>
                                <td class="border border-slate-700 pl-1 pr-1">{{ $sede->nombre }}</td>
                                <td class="border border-slate-700 pl-1 pr-1">{{ $sede->direccion }}</td>
                                <td class="border border-slate-700 pl-1 pr-1">{{ $sede->telefono }}</td>
                                <td class="border border-slate-700 pl-1 pr-1">{{ $sede->ciudad }}</td>
                                <td class="border border-slate-700 pl-1 pr-1">{{ $sede->regimen_simplificado->nombre }}</td>
                                <td class="border border-slate-700 pl-1 pr-1"><a href={{ url('sedes/'.$sede->id.'/edit') }} class="bg-amber-300 text-white w-full">Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
