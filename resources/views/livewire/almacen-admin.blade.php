<div class="pt-5 mt-5">
    <!-- component -->
    <div class="pt-3">
        <div class="flex flex-col flex-1 h-full overflow-hidden">
            <!-- Main content -->
            <main class="flex-1 max-h-full p-5 overflow-hidden ">
                <div class="grid grid-cols-2">
                    <div class=" text-left"><h3 class="mt-6 text-xl">Solicitud de Equipos</h3></div>
                </div>

                <dialog id="modal-almacen" class=" w-11/12 md:w-6/12 p-5 bg-transparent rounded-md mt-0">
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
                                        @if ($item->numeroAlmacen)
                                            <span class="inline-flex px-2 text-xs font-semibold leading-5 text-white bg-green-500 rounded-full">
                                            ENTREGADO
                                            </span>
                                        @else
                                            <span class="inline-flex px-2 text-xs font-semibold leading-5 text-white bg-red-500 rounded-full">
                                            PENDIENTE
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
  {{--              <dialog id="modal-detalle" class=" w-11/12 md:w-6/12 p-5 bg-transparent rounded-md mt-0">
                    <div class="flex flex-col w-full h-auto ">
                        <div>
                            <div class="p-4 m-2 border-green-300 border-opacity-50 bg-white rounded-md shadow-2xl">
                                <div class="flex justify-center pb-3" >
                                    <div class="flex">
                                        <h1 class="text-gray-600 mt-4 font-bold md:text-2xl
                                        text-xl">Solicitud De Almecen</h1>
                                    </div>
                                </div>
                                @if ($detalles)
                                <div class="grid grid-cols-12 gap-4 ">
                                    <div class="col-span-12 bg-gray-200 px-3 py-2">
                                        <div class="grid grid-cols-12 gap-4">
                                            <div class=" col-span-3 ">
                                                Nº Pedido: {{ $detalles->id }}
                                            </div>
                                            <div class=" col-span-3 ">
                                                Nº Almacen:
                                            </div>
                                            <div class=" col-span-6 ">
                                                Fecha Pedido: {{ $detalles->fechaPedido }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12">
                                        <div class="grid grid-cols-1">
                                            <table class="table-auto">
                                                <thead>
                                                  <tr>
                                                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider
                                                 text-left text-gray-500 uppercase">Equipo</th>
                                                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider
                                                 text-left text-gray-500 uppercase">Cant. Pedido</th>
                                                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider
                                                 text-left text-gray-500 uppercase">Cant. Recibido</th>
                                                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider
                                                 text-left text-gray-500 uppercase">Descripcion</th>
                                                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider
                                                 text-left text-gray-500 uppercase">Estado</th>
                                                  </tr>
                                                </thead>
                                                <tbody>

                                                    @forelse ($detalles->solicitudAlmacen as $detalle)
                                                    <tr class="transition-all hover:bg-gray-100 hover:shadow-lg text-center">
                                                        <td class="px-3 py-1 whitespace-nowrap">{{ $detalle->equipo->nombre }}</td>
                                                        <td class="px-3 py-1 whitespace-nowrap">{{ $detalle->cantidadPedido }}</td>
                                                        <td class="px-3 py-1 whitespace-nowrap">
                                                            @if ($detalle->cantidadRecibido)
                                                                {{ $detalle->cantidadRecibido }}
                                                            @else
                                                                -
                                                            @endif
                                                        </td>
                                                        <td class="px-3 py-1 whitespace-nowrap">{{ $detalle->descripcion }}</td>
                                                        <td class="px-3 py-1 whitespace-nowrap">{{ $detalle->estado }}</td>
                                                    </tr>
                                                    @empty

                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                <div class='flex items-center justify-end  md:gap-8 gap-4 pt-5 pb-5'>
                                    <button type="button" onclick="document.getElementById('modal-detalle').close()" class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cerrar</button>
                                </div>
                            </div>

                        </div>
                    </div>
                 </dialog> --}}
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



