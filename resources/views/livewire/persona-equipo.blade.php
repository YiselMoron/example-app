<div class="flex items-center justify-center p-4 m-2 border-green-300 border-opacity-50 bg-white
rounded-md shadow-2xl">
    {{-- 4 form--}}
    <form wire:submit.prevent="save">
        <div class="flex justify-center pb-3" >
            <div class="flex">
                <h1 class="text-gray-600 mt-4 font-bold md:text-2xl
                text-xl">Solicitud De Almecen</h1>
            </div>
        </div>

        <div class="grid grid-cols-12 gap-4 ">

            <div class="col-span-5">
                <div class="grid grid-cols-1">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nombre</label>
                        <input name="VEnombre" id="VEnombre" wire:keydown="buscar" placeholder="Nombre-Serie-Modelo" wire:model="VEnombre"class="py-2 px-3 rounded-lg border-2 border-green-300 mt-1 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent" type="text" />
                            @if ($autocomplete)
                                <div class="relative" {{ $ocultar }}>
                                    <div class="absolute z-50 left-0 right-0 rounded border border-gray-100 shadow bg-white">
                                        @forelse ($autocomplete as $item)
                                            <div class="cursor-pointer p-2 hover:bg-gray-200 focus:bg-gray-200" wire:click="seleccion({{$item->id}}, '{{ $item->nombre }}')" >{{ $item->nombre }}</div>
                                        @empty
                                        @endforelse
                                    </div>
                                </div>
                            @endif
                        <p class=" text-sm" >Ej.:ThinkCentre-M720-Tiny </p>
                        @if($errors->has('VEnombre'))
                            <p>{{$errors->first('VEnombre')}}</p>
                        @endif
                </div>
            </div>

            <div class="col-span-2">
                <div class="grid grid-cols-1">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light
                        font-semibold">Cantidad</label>
                        <input name="VAcantidadP" id="VAcantidadP" wire:model="VAcantidadP"
                        class="py-2 px-3 rounded-lg border-2 border-green-300 mt-1
                        focus:outline-none focus:ring-2 focus:ring-green-600
                        focus:border-transparent" type="number" />
                        @if($errors->has('VAcantidadP'))
                            <p>{{$errors->first('VAcantidadP')}}</p>
                        @endif
                </div>
            </div>

            <div class="col-span-4">
                <div class="grid grid-cols-1">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light
                        font-semibold">Descripcion</label>
                        <input name="VAjustificacion" id="VAjustificacion" wire:model="VAjustificacion"
                        class="py-2 px-3 rounded-lg border-2 border-green-300 mt-1
                        focus:outline-none focus:ring-2 focus:ring-green-600
                        focus:border-transparent" type="text" />
                        @if($errors->has('VAjustificacion'))
                            <p>{{$errors->first('VAjustificacion')}}</p>
                        @endif
                </div>
            </div>

            <div class="col-span-1">
                <div class="grid grid-cols-1 py-2">
                    <button type="button" wire:click="agregar" class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-1 py-2'><i class="fas fa-plus"></i></button>
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
                             text-left text-gray-500 uppercase">Cantidad</th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider
                             text-left text-gray-500 uppercase">Descripcion</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                            @forelse ($lista as $key => $item)
                              <tr class="transition-all hover:bg-gray-100 hover:shadow-lg text-center">
                                <td class="px-3 py-1 whitespace-nowrap">{{ $item['nombre'] }}</td>
                                <td class="px-3 py-1 whitespace-nowrap">{{ $item['cantidad'] }}</td>
                                <td class="px-3 py-1 whitespace-nowrap">{{ $item['descripcion'] }}</td>
                                <td class="px-3 py-1" wire:click="eliminar_fila({{ $key }})" ><i class="fas fa-times text-red-500"></i></td>
                              </tr>
                            @empty

                            @endforelse
                            </tbody>
                          </table>


                </div>
            </div>

        </div>

        <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
            <button type="button" onclick="document.getElementById('modal-equipo').close()" class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancel</button>
            <button type="submit" class='w-auto bg-purple-500 hover:bg-green-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Guardar</button>
        </div>
    </form>
</div>
