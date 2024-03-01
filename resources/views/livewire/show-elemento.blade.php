<div>
     <button class="border-green-950 bg-green-300 p-1 px-2 rounded-md text-white hover:bg-green-500" wire:click="$set('open', false)">Ver elementos</button>
     <div class="relative z-50 @if($open) hidden @endif" aria-labelledby="modal-title" role="dialog" aria-modal="true" >
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div class="fixed inset-0 z-50 w-screen overflow-y-auto">
          <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all md:w-2/5 sm:my-8 sm:w-full @if(!$openElemeto) hidden @endif">
              <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:w-full">
                  <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left sm:w-full">
                    <h1 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Seleccione el elementos a pedir</h1>
                    <div class="flex flex-col">
                        <div class="mt-2 flex flex-row w-full h-5/6 justify-end">
                            <div class="w-1/2">
                                <span class="w-1/4">Buscar:</span>
                                <input class="ml-2 rounded-xl w-3/4 border-gray-300" wire:model="searchName" type="search" placeholder="Buscar por nombre">
                            </div>
                            <div class="w-1/2">
                                <span class="w-1/4">Buscar:</span>
                                <input class="ml-2 rounded-xl w-3/4 border-gray-300" wire:model="searchReferens" type="search" placeholder="Buscar por referencia">
                            </div>
                        </div>

                        <!--  Tabla -->
                        <div class="mt-2">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-lg text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr scope="col" class="px-6 py-3 text-center">
                                        <th>Referencia</th>
                                        <th>Nombre</th>
                                        <th>Pedir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($elementos as $index => $elemento)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td class="px-6 py-4">{{ $elemento->referencia }}</td>
                                        <td class="px-6 py-4">{{ $elemento->nombre }}</td>
                                        <td class="px-6 py-4">
                                            <button wire:click="send({{ $elemento }})">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#63E6BE" d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96zM252 160c0 11 9 20 20 20h44v44c0 11 9 20 20 20s20-9 20-20V180h44c11 0 20-9 20-20s-9-20-20-20H356V96c0-11-9-20-20-20s-20 9-20 20v44H272c-11 0-20 9-20 20z"/></svg>
                                                PEDIR
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $elementos->links() }}
                        </div>

                    </div>

                  </div>
                </div>
              </div>
              <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                <button type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto" wire:click="$set('open', true)">Cancel</button>
              </div>
            </div>

            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all md:w-2/5 sm:my-8 sm:w-full @if($openCantidad) hidden @endif">
              <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:w-full">
                  <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left sm:w-full">
                    <h1 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Seleccione el elementos a pedir</h1>
                    <div class="flex flex-col">
                      <div class="mt-2 flex flex-row w-full h-5/6 justify-end">
                        <div class="px-4 py-4 sm:flex sm:flex-row-reverse">
                            <button type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-red-200 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-400 sm:mt-0 sm:w-auto" wire:click="atras()">Atras</button>
                        </div>
                        <div class="">
                            <span class="w-1/4">Cantidad a pedir:</span>
                            <input class="ml-2 rounded-xl w-3/4 border-gray-300" wire:model="cantidad" type="number" placeholder="Cantidad">
                            @error('cantidad') <span class="error text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="">
                            <span class="w-1/4">Observacion de este elemento:</span>
                            <input class="ml-2 rounded-xl w-3/4 border-gray-300" wire:model="observacion" type="text" placeholder="Observacion">
                        </div>
                        <div class="px-4 py-4 sm:flex sm:flex-row-reverse">
                            <button type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-green-400 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-600 sm:mt-0 sm:w-auto" wire:click="add()">Agregar</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
    </div>
</div>
