<p>Pedido No {{ $pedido->id }}</p>
<p>Sede: {{ Auth::user()->sede->nombre }}</p>
<p>Sede: {{ Auth::user()->nombre }}</p>
<p>Sede: {{ Auth::user()->apellido }}</p>
<p>Fecha {{ $pedido->fecha }}</p>
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
