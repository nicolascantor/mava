<x-guest-layout>
    <table class="table-auto border-collapse border border-slate-500">
        <thead>
            <tr>
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
                    <td class="border border-slate-700 pl-1 pr-1"><button class="rounded-lg bg-amber-300 p-1 text-white">Editar</button></td>
                    <td class="border border-slate-700 pl-1 pr-1"><button class="rounded-lg bg-green-300 p-1 text-white">Save</button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-guest-layout>
