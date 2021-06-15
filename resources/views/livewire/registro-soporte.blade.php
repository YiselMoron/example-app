<div class="flex bg-green-200 items-center justify-center ">
    {{-- 4 form--}}
    <form wire:submit.prevent="save">
        <div class="grid bg-white rounded-lg shadow-2xl ">


          <div class="flex justify-center" >
            <div class="flex">
              <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Registro</h1>
            </div>
          </div>

          <div class="grid grid-cols-1 mt-5 mx-7">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nombre Completo</label>
          {{-- 5 variables --}}
            <input name="VPnombreCompleto" id="VPnombreCompleto" wire:model="VPnombreCompleto"
             class="py-2 px-3 rounded-lg border-2 border-green-300 mt-1 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent" type="text" />
             @if($errors->has('VPnombreCompleto'))
                <p>{{$errors->first('VPnombreCompleto')}}</p>
             @endif
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Departamento</label>
                <select name="VPdepartamento" id="VPdepartamento" wire:model="VPdepartamento"
                class="py-2 px-3 rounded-lg border-2 border-green-300 mt-1 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent">
                    @foreach ($departamentos as $departamento)
                    <option value="{{$departamento->id}}">{{$departamento->nombre}}</option>

                    @endforeach
                </select>
                @if($errors->has('VPdepartamento'))
                <p>{{$errors->first('VPdepartamento')}}</p>
             @endif
            </div>
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Cargo</label>
                <select name="VPcargo" id="VPcargo" wire:model="VPcargo"
                 class="py-2 px-3 rounded-lg border-2 border-green-300 mt-1 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent">
                    @foreach ($cargos as $cargo)
                    <option value="{{$cargo->id}}">{{$cargo->nombre}}</option>

                    @endforeach
                </select>
                @if($errors->has('VPcargo'))
                <p>{{$errors->first('VPcargo')}}</p>
             @endif
            </div>
          </div>

          <div class="grid grid-cols-1 mt-5 mx-7">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Celular</label>
            <input name="VPcelular" id="VPcelular" wire:model="VPcelular"
             class="py-2 px-3 rounded-lg border-2 border-green-300 mt-1 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent" type="text" />
             @if($errors->has('VPcelular'))
                <p>{{$errors->first('VPcelular')}}</p>
             @endif
          </div>

          <div class="grid grid-cols-1 mt-5 mx-7">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Email</label>
            <input name="VPemail" id="VPemail" wire:model="VPemail"
            class="py-2 px-3 rounded-lg border-2 border-green-300 mt-1 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent" type="email"/>
            @if($errors->has('VPemail'))
                <p>{{$errors->first('VPemail')}}</p>
             @endif
          </div>

          <div class="grid grid-cols-1 mt-5 mx-7">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Password</label>
            <input name="VPpassword" id="VPpassword" wire:model="VPpassword"
            class="py-2 px-3 rounded-lg border-2 border-green-300 mt-1 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent" type="password"  autocomplete="new-password"/>
            @if($errors->has('VPpassword'))
                <p>{{$errors->first('VPpassword')}}</p>
             @endif
          </div>

          <div class="grid grid-cols-1 mt-5 mx-7">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Rol</label>
            <select name="VProl" id="VProl" wire:model="VProl"
             class="py-2 px-3 rounded-lg border-2 border-green-300 mt-1 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent">
                @foreach ($roles as $rol)
                    <option value="{{$rol->id}}">{{$rol->nombre}}</option>

                    @endforeach
            </select>
            @if($errors->has('VProl'))
                <p>{{$errors->first('VProl')}}</p>
             @endif
          </div>


          <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
            <button onclick="document.getElementById('modal-create-rol').close()" class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancel</button>
            <button type="submit" class='w-auto bg-purple-500 hover:bg-green-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Create</button>
          </div>

        </div>
    </form>
    </div>
