<div class="p-4 m-2 border-green-300 border-opacity-50 bg-white rounded-md shadow-2xl">
    <form wire:submit.prevent="save">
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
                    <div class=" col-span-4 ">
                        Nº Almacen:
                        <div class="grid grid-cols-1">
                                <input name="VAcode" id="VAcode" wire:model="VAcode"
                                class="py-2 px-3 rounded-lg border-2 border-green-300 mt-1
                                focus:outline-none focus:ring-2 focus:ring-green-600
                                focus:border-transparent" type="text" />
                                @if($errors->has('VAcode'))
                                    <p>{{$errors->first('VAcode')}}</p>
                                @endif
                        </div>
                    </div>
                    <div class=" col-span-5 ">
                        Pedido: {{ $detalles->fechaPedido }}
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
                          </tr>
                        </thead>
                        <tbody>

                            @forelse ($detalles->solicitudAlmacen as $key => $detalle)
                            <tr class="transition-all hover:bg-gray-100 hover:shadow-lg text-center">
                                <td class="px-3 py-1 whitespace-nowrap">{{ $detalle->equipo->nombre }}</td>
                                <td class="px-3 py-1 whitespace-nowrap">{{ $detalle->cantidadPedido }}</td>
                                <td class="px-3 py-1 whitespace-nowrap">
                                    <input type="number" name="VAcant[{{$key}}]" id="VAcant[{{$key}}]" wire:model="VAcant.{{ $key }}" class="py-2 px-3 rounded-lg border-2 border-green-300 mt-1
                                    focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent" style="width: 128px;">
                                </td>
                                <td class="px-3 py-1 whitespace-nowrap">{{ $detalle->descripcion }}</td>
                            </tr>
                            @empty

                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        @endif

        <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
            <button type="button" onclick="document.getElementById('modal-almacen').close()" class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancel</button>
            <button type="submit" class='w-auto bg-purple-500 hover:bg-green-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Guardar</button>
        </div>
    </form>
</div>
