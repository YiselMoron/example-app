<div class="pt-5 mt-5">
    <!-- component -->
<div class="pt-3">
    <div class="flex  overflow-y-hidden bg-white" >
             <!-- Sidebar footer -->

      <div class="flex flex-col flex-1  overflow-hidden">

        <!-- Main content -->
        <main class="flex-1  p-5 overflow-hidden ">
            <div class="grid grid-cols-2">
                <div class=" text-left"><h3 class="mt-6 text-xl">Solicitud Equipo</h3> </div>
                <dialog id="modal-solicitud-equipo" class=" w-11/12 md:w-6/12 p-5 bg-transparent rounded-md mt-0">
                    <div class="flex flex-col w-full h-auto ">
                        <div>
                            @livewire('registro-solicitud-equipo')
                        </div>
                    </div>
                </dialog>
            </div>
          <div class="flex flex-col m-6">
            <div class=" overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden border-b border-gray-500 rounded-md shadow-md">
                  <table class="min-w-full overflow-x-scroll divide-y divide-gray-200">
                    <thead class="bg-gray-100 border-b-8 border-green-500">
                      <tr>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider  text-gray-500 uppercase" >
                          Codigo
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-gray-500 uppercase" >
                          Responsable
                        </th>

                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-gray-500 uppercase" >
                          Area
                        </th>
                        <th scope="col"
                        class="px-6 py-3 text-xs font-medium tracking-wider text-gray-500 uppercase">
                          Fecha Pedido
                        </th>

                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-gray-500 uppercase" >
                          Estado
                        </th>

                        <th scope="col"
                        class="px-6 py-3 text-xs font-medium tracking-wider text-right text-gray-500 uppercase">
                          Accion
                        </th>

                      </tr>

                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($SolicitudEquipos as $equipo)
                        <tr class="transition-all hover:bg-gray-100 hover:shadow-lg text-center">
                            <td class="px-6 py-4 whitespace-nowrap">
                                00{{ $equipo->id}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $equipo->persona->nombreCompleto }}</div>
                                <div class="text-sm text-gray-500">{{ $equipo->persona->user->email }}</div>
                            </td>
                         <td class="px-6 py-4 whitespace-nowrap">

                            <div class="text-sm font-medium text-gray-900">{{ $equipo->persona->departamento->nombre }} </div>
                        </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ date("d/m/Y", strtotime($equipo->fechaSolicitud))}}</div>
                          </td>

                          <td class="px-6 py-4 whitespace-nowrap">
                            @switch($equipo->estado)
                                @case(1)
                                      <span class="inline-flex px-2 text-xs font-semibold leading-5 text-white bg-green-500 rounded-full">
                                          P
                                      </span>
                                    @break
                                @case(2)
                                      <span class="inline-flex px-2 text-xs font-semibold leading-5 text-white bg-blue-500 rounded-full">
                                          A
                                      </span>
                                    @break
                                @case(3)
                                      <span class="inline-flex px-2 text-xs font-semibold leading-5 text-white bg-red-500 rounded-full">
                                          D
                                      </span>
                                    @break
                                @default

                            @endswitch

                          </td>
                            <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                            <a wire:click="selectItem({{ $equipo->id }})" class="text-indigo-600 hover:text-indigo-900">VER</a>
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
    <script>
        window.addEventListener('openModal', event =>{
            document.getElementById('modal-solicitud-equipo').showModal()
        })
    </script>
</div>
</div>


