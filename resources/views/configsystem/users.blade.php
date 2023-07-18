<x-app-layout>
    <x-slot name="tittle_section">
        {{ __('Usuarios') }}
    </x-slot>

    <div>
        <div>
            <div class="w-full mb-3">
                <a href="{{ route('register') }}" class="rounded-2xl bg-green-400 p-2 text-white uppercase">
                        <span>crear nuevo usuario</span>
                </a>
            </div>
            <div class="w-full mt-7">
                <table class="table-auto rounded-lg border-collapse border border-slate-500 w-full">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border border-slate-600 ...">Nombre</th>
                            <th class="border border-slate-600 ...">Celular</th>
                            <th class="border border-slate-600 ...">Email</th>
                            <th  class="border border-slate-600 ...">Tipo Documento</th>
                            <th  class="border border-slate-600 ...">No Documento</th>
                            <th  class="border border-slate-600 ...">Sede</th>
                            <th  class="border border-slate-600 ...">Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="border border-slate-700 pl-1 pr-1">{{ $user->nombre }} {{ $user->apellido }}</td>
                                <td class="border border-slate-700 pl-1 pr-1">{{ $user->celular }}</td>
                                <td class="border border-slate-700 pl-1 pr-1">{{ $user->email }}</td>
                                <td class="border border-slate-700 pl-1 pr-1">{{ $user->tipo_documento }}</td>
                                <td class="border border-slate-700 pl-1 pr-1">{{ $user->numero_documento }}</td>
                                <td class="border border-slate-700 pl-1 pr-1">{{ $user->sede->nombre }}</td>
                                <td class="border border-slate-700 pl-1 pr-1"><a href={{ url('user/'.$user->id.'/edit') }} class="bg-amber-300 text-white w-full">Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
