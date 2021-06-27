<div class="flex items-center justify-center  ">
    {{-- 4 form--}}
    <form wire:submit.prevent="save">
        <div class="grid border-2 border-green-300 border-opacity-50 bg-white 
                rounded-md shadow-2xl ">
            <div class="flex justify-center" >
                <div class="flex">
                    <h1 class="text-gray-600 mt-4 font-bold md:text-2xl 
                    text-xl">Solicitud De Almecen</h1>
                </div>
            </div>
            <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-4 mt-5 mx-7">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light 
                        font-semibold">Nombre</label>
               
                        <input name="VEnombre" id="VEnombre" placeholder="Nombre-Serie-Modelo" wire:model="VEnombre" 
                        class="py-2 px-10 rounded-lg border-2 border-green-300 mt-1 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent" type="text" />
                        <p>Ej.:ThinkCentre-M720-Tiny </p>
                        @if($errors->has('VEnombre'))
                            <p>{{$errors->first('VEnombre')}}</p>
                        @endif
                    </div>

                    <div class="col-span-4 mt-5 mx-7">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Marca</label>
                        <select name="VEmarca" id="VEmarca" wire:model="VEmarca"
                        class="py-2 px-10 rounded-lg border-2 border-green-300 mt-1 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent">
                        <option value=" ">Seleccionar</option>    
                        {{-- @foreach ($marcas as $marca)
                            <option value="{{$marca->id}}">{{$marca->nombre}}</option>

                            @endforeach --}}
                        </select>
                        @if($errors->has('VEmarca'))
                        <p>{{$errors->first('VEmarca')}}</p>
                        @endif
                    </div>

                    <div class="col-span-4 mt-5 mx-7">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Tipo Equipo</label>
                        <select name="VEtipoEquipo" id="VEtipoEquipo" wire:model="VEtipoEquipo"
                        class="py-2 px-5 rounded-lg border-2 border-green-300 mt-1 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent">
                        <option value=" ">Seleccionar</option>               
                                    {{-- RENDER      VARIABLE EXTRA --}}
                            {{-- @foreach ($tipoEquipos as $tipoequipo)
                            <option value="{{$tipoequipo->id}}">{{$tipoequipo->nombre}}</option>

                            @endforeach --}}
                        </select>
                        @if($errors->has('VEtipoEquipo'))
                        <p>{{$errors->first('VEtipoEquipo')}}</p>
                            @endif
                            </div>
                    </div>  



                    <div class="grid grid-cols-1 mt-5 mx-7">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Stock</label>
                        <input name="VEstock" id="VEstock" wire:model="VEstock"
                        class="py-2 px-3 rounded-lg border-2 border-green-300 mt-1 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent" type="text" />
                        @if($errors->has('VEstock'))
                            <p>{{$errors->first('VEstock')}}</p>
                        @endif
                    </div>
                    <div class="grid grid-cols-1 mt-5 mx-7">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light 
                        font-semibold">Cantidad Pedido</label>
                        <input name="VAcantidadP" id="VAcantidadP" wire:model="VAcantidadP"
                        class="py-2 px-10 rounded-lg border-2 border-green-300 mt-1 
                        focus:outline-none focus:ring-2 focus:ring-green-600 
                        focus:border-transparent" type="text"/>
                        @if($errors->has('VAcantidadP'))
                            <p>{{$errors->first('VAcantidadP')}}</p>
                        @endif
                    </div>
                        <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="Date">
                        Fecha Pedido</label>
                        <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 
                        text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        name="date" id="date" type="date" required/>
                    </div>
                    <div class="grid grid-cols-1 mt-5 mx-7">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light 
                        font-semibold">Cantidad Recibido</label>
                        <input name="VAcantidadR" id="VAcantidadR" wire:model="VAcantidadR"
                            class="py-2 px-10 rounded-lg border-2 border-green-300 mt-1 
                            focus:outline-none focus:ring-2 focus:ring-green-600 
                            focus:border-transparent" type="text"/>
                            @if($errors->has('VAcantidadR'))
                                <p>{{$errors->first('VAcantidadR')}}</p>
                            @endif
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="Date">
                            Fecha Recibida</label>
                        <input class="shadow appearance-none border rounded w-full 
                        py-2 px-3 text-gray-700 leading-tight focus:outline-none 
                        focus:shadow-outline"name="date" id="date" type="date"required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="name"
                        >Descripcion</label>
                        <textarea class="bshadow appearance-none border rounded w-full py-2 
                        px-3 text-gray-700 leading-tight focus:outline-none 
                        focus:shadow-outline" name="message2" id="message2" type="text" 
                        required></textarea>
                    </div>
            </div>

            <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                <button type="button" onclick="document.getElementById('modal-create-rol').close()" class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancel</button>
                <button type="submit" class='w-auto bg-purple-500 hover:bg-green-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Agregar</button>
            </div>
            
        </div>
    </form>
</div>
