<x-guest-layout>
    <table class="table-auto border-collapse border border-slate-500">
        <thead>
            <tr>
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
                    <td class="border border-slate-700 pl-1 pr-1"><button class="rounded-lg bg-amber-300 p-1 text-white">Editar</button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-guest-layout>
