<div class="pt-5 mt-5">
    <!-- component -->
    <div class="pt-3">
        <div class="flex flex-col flex-1  overflow-hidden">
            <!-- Main content -->
            <main class="flex-1  p-5 overflow-hidden ">
                <div class="grid grid-cols-2">
                    <div class=" text-left"><h3 class="mt-6 text-xl">Solicitud de Equipos</h3></div>
                </div>

                <dialog id="modal-almacen" class=" w-12/12 md:w-11/12 p-5 bg-transparent rounded-md mt-0">
                    <div class="flex flex-col w-full h-auto ">
                            <div>
                                @livewire('registro-almacen-admin')
                            </div>
                    </div>
                 </dialog>

                <div class="flex flex-col mt-6">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden border-b border-gray-500 rounded-md shadow-md">
                    <table class="min-w-full overflow-x-scroll md-4">
                        <thead class="bg-gray-100 border-b-8 border-green-500 ">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider
                                 text-center text-gray-500 uppercase">Codigo</th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider
                                text-center text-gray-500 uppercase">Numero Almacen</th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider
                                text-center text-gray-500 uppercase">Fecha Pedido</th>
                                <th scope="col"class="px-6 py-3 text-xs font-medium tracking-wider
                                 text-center text-gray-500 uppercase">Estado</th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider
                                 text-center text-gray-500 uppercase">Accion</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">

                            @foreach ($almacenes as $item)
                            <tr class="transition-all hover:bg-gray-100 hover:shadow-lg text-center">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $item->id }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $item->numeroAlmacen }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $item->fechaPedido }}</div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">

                                        @if ($item->solicitudAlmacen[0]->estado == 0 || $item->solicitudAlmacen[0]->estado == null)
                                            <span class="inline-flex px-2 text-xs font-semibold leading-5 text-white bg-green-500 rounded-full">
                                                PENDIENTE
                                            </span>
                                        @elseif ($item->solicitudAlmacen[0]->estado == 1)
                                            <span class="inline-flex px-2 text-xs font-semibold leading-5 text-white bg-blue-500 rounded-full">
                                            Acceptado
                                            </span>
                                        @else
                                            <span class="inline-flex px-2 text-xs font-semibold leading-5 text-white bg-red-500 rounded-full">
                                                Denegado
                                            </span>
                                        @endif

                                </td>
                                <td class="px-6 py-4 text-sm font-medium text-center whitespace-nowrap">
                                    <a wire:click="selectItem({{ $item->id }})" class="text-indigo-600 hover:text-indigo-900">Ver</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
                </div>
                </div>
            </main>
        </div>
        </div>

    </div>
    <script>
        window.addEventListener('openModal', event =>{
            document.getElementById('modal-almacen').showModal()
        })
    </script>

</div>



