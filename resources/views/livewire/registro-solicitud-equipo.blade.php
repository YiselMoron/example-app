<div class="p-4 m-2 border-green-300 border-opacity-50 bg-white rounded-md shadow-2xl">
    <div class="flex justify-center pb-3" >
        <div class="flex">
            <h1 class="text-gray-600 mt-4 font-bold md:text-2xl
            text-xl">Solicitud de equipos</h1>
        </div>
    </div>
    @if ($detalle)
    <div class="grid grid-cols-12 gap-4 ">
        <div class="col-span-12 bg-gray-200 px-3 py-2">
            <div class="grid grid-cols-12 gap-4">
                <div class=" col-span-4 ">
                    Nº Pedido: 00{{ $detalle->id }}
                </div>
                <div class=" col-span-4 ">
                    Pedido: {{ $detalle->fechaSolicitud }}
                </div>
                <div class=" col-span-4">
                    Estado:
                    @switch($detalle->estado)
                        @case(1)
                              <span class="inline-flex px-2 text-xs font-semibold leading-5 text-white bg-green-500 rounded-full">
                                  Procesando
                              </span>
                            @break
                        @case(2)
                              <span class="inline-flex px-2 text-xs font-semibold leading-5 text-white bg-blue-500 rounded-full">
                                  Aceptado
                              </span>
                            @break
                        @case(3)
                              <span class="inline-flex px-2 text-xs font-semibold leading-5 text-white bg-red-500 rounded-full">
                                  Denegado
                              </span>
                            @break
                        @default
                          
                    @endswitch
                </div>
            </div>
        </div>
        <div class="col-span-12">
            <div class="grid grid-cols-1">
                <table class="table-auto">
                    <thead>
                      <tr>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-gray-500 uppercase">Equipo</th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-gray-500 uppercase">Cantidad</th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-gray-500 uppercase">Justificación</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($detalle->folmularioEquipo as $key => $item)
                        <tr class="transition-all hover:bg-gray-100 hover:shadow-lg text-center">
                            <td class="px-3 py-1 whitespace-nowrap">{{ $item->equipo->nombre }}</td>
                            <td class="px-3 py-1 whitespace-nowrap">{{ $item->cantidad }}</td>
                            <td class="px-3 py-1 whitespace-nowrap">{{ $item->justificacion }}</td>
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
        <button type="button" onclick="document.getElementById('modal-solicitud-equipo').close()" class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cerrar</button>
        @if ($detalle)
            @if ($detalle->estado < 2)
            <button type="button" wire:click="procesar(3)" class='w-auto bg-red-500 hover:bg-red-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Denegar</button>
            <button type="button" wire:click="procesar(2)" class='w-auto bg-green-500 hover:bg-green-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Aceptar</button>
            @endif
        @endif
    </div>
</div>
