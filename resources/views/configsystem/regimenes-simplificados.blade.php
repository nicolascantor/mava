<x-app-layout>
    <x-slot name="tittle_section">
        {{ __('Regimenes Simplificados') }}
    </x-slot>

    <div>
        <div>
            <div class="w-full mb-3">
                <a href="{{ route('create-regimensimplificado') }}" class="rounded-2xl bg-green-400 p-2 text-white uppercase">
                        <span>crear nuevo regimen simplificado</span>
                </a>
            </div>
            <div class="w-full mt-7">
                <table class="table-auto rounded-lg border-collapse border border-slate-500 w-full">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border border-slate-600 ...">Nombre</th>
                            <th class="border border-slate-600 ...">Nit</th>
                            <th class="border border-slate-600 ...">Editar</th>
                            <th  class="border border-slate-600 ...">Activar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($regimenes_simplificados as $regimen_simplificado)
                            <tr>
                                <td class="border border-slate-700 pl-1 pr-1">{{ $regimen_simplificado->nombre }}</td>
                                <td class="border border-slate-700 pl-1 pr-1">{{ $regimen_simplificado->nit }}</td>
                                <td class="border border-slate-700 pl-1 pr-1 content-center"><a href="{{ url('regimensimplificado/' . $regimen_simplificado->id . '/edit') }}" class="bg-amber-300 p-1 text-white w-full">Editar</a></td>
                                <td class="border border-slate-700 pl-1 pr-1"><button class=" bg-green-300 p-1 text-white w-full">Save</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
