<div class="flex items-center justify-center ">
    {{-- 4 form--}}
    <form wire:submit.prevent="save">
        <div class="grid border-2 border-green-300 border-opacity-50 bg-white m-2 rounded-md shadow-2xl ">

          <div class="flex justify-center" >
            <div class="flex">
              <h1 class="text-gray-600 mt-4 font-bold md:text-2xl text-xl">Ingreso de Equipo</h1>
            </div>
          </div>

          <div class="grid grid-cols-1 mt-5 mx-7">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nombre</label>
          {{-- 5 variables --}}
            <input name="VEnombre" id="VEnombre" wire:model="VEnombre"
             class="py-2 px-10 rounded-lg border-2 border-green-300 mt-1 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent" type="text" />
             @if($errors->has('VEnombre'))
                <p>{{$errors->first('VEnombre')}}</p>
             @endif
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Marca</label>
                <select name="VEmarca" id="VEmarca" wire:model="VEmarca"
                class="py-2 px-10 rounded-lg border-2 border-green-300 mt-1 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent">
                <option value=" ">Seleccionar</option>    
                @foreach ($marcas as $marca)
                    <option value="{{$marca->id}}">{{$marca->nombre}}</option>

                    @endforeach
                </select>
                @if($errors->has('VEmarca'))
                <p>{{$errors->first('VEmarca')}}</p>
             @endif
            </div>
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Tipo Equipo</label>
                <select name="VEtipoEquipo" id="VEtipoEquipo" wire:model="VEtipoEquipo"
                 class="py-2 px-5 rounded-lg border-2 border-green-300 mt-1 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent">
                 <option value=" ">Seleccionar</option>               
                            {{-- RENDER      VARIABLE EXTRA --}}
                    @foreach ($tipoEquipos as $tipoequipo)
                    <option value="{{$tipoequipo->id}}">{{$tipoequipo->nombre}}</option>

                    @endforeach
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




          <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
            <button type="button" onclick="document.getElementById('modal-create-rol').close()" class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancel</button>
            <button type="submit" class='w-auto bg-purple-500 hover:bg-green-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Agregar</button>
          </div>

        </div>
    </form>
</div>
