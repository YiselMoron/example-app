<div class="pt-5 mt-5">
    <!-- component -->
<div class="pt-3">
    <div class="flex bg-white" x-data="setup()" x-init="$refs.loading.classList.add('hidden')">
     
     
      <div class="flex flex-col flex-1 h-full overflow-hidden">

        <!-- Main content -->
        <main class="flex-1 max-h-full p-5 overflow-hidden ">
            <div class="grid grid-cols-2">
                <div class=" text-left"><h3 class="mt-6 text-xl">Inventario</h3> </div>
                <div class=" ml-auto mt-3">
                    <button onclick="document.getElementById('modal-create-rol').showModal()"
                    class="px-6 py-2.5  mb-4  text-base
                    font-semibold rounded-full block  bg-transparent border border-green-500
                    text-green-500 hover:bg-green-700 hover:text-white
                    hover:border-green-500 ">+</button>
                </div>
                  <!--LLAMAR A REGISTRO + -->
            <dialog id="modal-create-rol" class=" w-11/12 md:w-6/12 p-5 bg-transparent rounded-md ">
                <div class="flex flex-col w-full h-auto ">
                     <div class="flex w-full h-auto justify-center items-center">
                     </div>
                        <div>
                            @livewire('registro-equipo')
                        </div>
                     </div>
             </dialog>

            </div>
          <div class="flex flex-col mt-6">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden border-b border-gray-500 rounded-md shadow-md">
                  <table class="min-w-full overflow-x-scroll divide-y divide-gray-200">
                    <thead class="bg-gray-100 border-b-8 border-green-500">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider
                         text-left text-gray-500 uppercase">Nombre</th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider
                        text-left text-gray-500 uppercase">Marca</th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider
                        text-left text-gray-500 uppercase">Tipo Equipo</th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider
                        text-left text-gray-500 uppercase">Stock</th>
                    </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">

                        @foreach ($equipos as $item)
                        <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{$item->nombre}}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{$item->marca->nombre}}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{$item->tipoEquipo->nombre}}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex px-2 text-xs font-semibold leading-5
                                 text-white bg-green-500 rounded-full">{{$item->Stock}}</span>
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
</div>

