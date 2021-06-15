<div class="flex bg-green-200 items-center justify-center ">
    {{-- 4 form--}}
    <form wire:submit.prevent="save">
        <div class="grid bg-white rounded-lg shadow-2xl ">


          <div class="flex justify-center" >
            <div class="flex">
              <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Ingreso de Equipo</h1>
            </div>
          </div>

          <div class="grid grid-cols-1 mt-5 mx-7">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nombre</label>
          {{-- 5 variables --}}
            <input name="VEnombre" id="VEnombre" wire:model="VEnombre"
             class="py-2 px-3 rounded-lg border-2 border-green-300 mt-1 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent" type="text" />
             @if($errors->has('VEnombre'))
                <p>{{$errors->first('VEnombre')}}</p>
             @endif
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Marca</label>
                <select name="VEmarca" id="VEmarca" wire:model="VEmarca"
                class="py-2 px-3 rounded-lg border-2 border-green-300 mt-1 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent">
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
                <select name="VEtipoequipo" id="VEtipoequipo" wire:model="VEtipoequipo"
                 class="py-2 px-3 rounded-lg border-2 border-green-300 mt-1 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent">
                    @foreach ($tipoEquipos as $tipoequipo)
                    <option value="{{$tipoequipo->id}}">{{$tipoequipo->nombre}}</option>

                    @endforeach
                </select>
                @if($errors->has('VEtipoequipo'))
                <p>{{$errors->first('VEtipoequipo')}}</p>
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
            <button onclick="document.getElementById('modal-create-rol').close()" class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancel</button>
            <button type="submit" class='w-auto bg-purple-500 hover:bg-green-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Agregar</button>
          </div>

        </div>
    </form>
</div>
