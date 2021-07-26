<div class="pt-5 mt-5">
    <!-- component -->
  <div class="pt-3">
    <div class="flex flex-col flex-1 overflow-hidden">
        <!-- Main content -->
      <main class="flex-1 p-5 overflow-hidden ">
        <div class="grid grid-cols-12 gap-4 mt-6">
          <div class="col-span-12">
            <div class="grid grid-cols-2">
                <div class=" text-left"><h3 class="mt-6 text-xl">PANEL DE ADMINISTRACION</h3> </div>
                <div class=" ml-auto mt-3">
                    <div class="grid grid-cols-2 ">

                        <div class="mx-2">
                            @can('administrador')
                            <button onclick="clearFunction('equipo')" class="px-6 py-2.5  mb-4  text-base font-semibold rounded-full block  bg-transparent border border-green-500  text-green-500 hover:bg-green-700 hover:text-white hover:border-green-500 ">Nuevo equipo</button>
                            @endcan
                        </div>

                        <div class="mx-2">
                            <button onclick="clearFunction('asistencia')" class="px-6 py-2.5  mb-4  text-base font-semibold rounded-full block  bg-transparent border border-green-500  text-green-500 hover:bg-green-700 hover:text-white hover:border-green-500 ">Solicitud de asistencia</button>
                        </div>
                    </div>
                    <dialog id="modal-equipo" class=" w-11/12 md:w-6/12 p-5 bg-transparent rounded-md ">
                        <div>
                            <div>
                                <div>
                                    @livewire('persona-equipo')
                                </div>
                            </div>
                        </div>
                    </dialog>
                    <dialog id="modal-asistencia" class=" w-11/12 md:w-6/12 p-5 bg-transparent rounded-md ">
                        <div>
                            <div>
                                <div>
                                    @livewire('persona-asistencia')
                                </div>
                            </div>
                        </div>
                    </dialog>
                </div>
            </div>
          </div>
          <div class="col-span-3">

            <div class="ml-auto mt-3">
              <div class="mx-3">
                <div class=" text-left"><h3 class="mt-6 text-xl">Solicitudes</h3> </div>
                @foreach ($asistencias as $asistencia)
                <div class="flex my-4 ">
                    <div class=" rounded-md h-full text-left px-4 py-4 w-full justify-end border-2 border-green-500">
                      <a to="jobdet" class="flex items-center flex-wrap">
                          <span class="font-bold text-lg -mt-2">Soporte Técnico</span>
                          <div class="mt-2 mb-3 mx-5">
                              <p class="text-sm text-gray-500 font-bold">
                                  {{ $asistencia->problema }}
                              </p>
                          </div>
                      </a>
                      <div class="flex items-center flex-wrap ">
                          @switch($asistencia->estado)
                        @case(1)
                                  <span class="text-white mr-3 inline-flex text-xs items-center lg:ml-auto md:ml-0 ml-auto leading-none pr-3 py-1 px-2 bg-green-500 rounded-full">
                                      Procesando
                                  </span>
                                @break
                            @case(2)
                            <span class="text-white mr-3 inline-flex text-xs items-center lg:ml-auto md:ml-0 ml-auto leading-none pr-3 py-1 px-2 bg-blue-500 rounded-full">
                                Aceptado
                                  </span>
                                @break
                            @case(3)
                            <span class="text-gray-800 mr-3 inline-flex text-xs items-center lg:ml-auto md:ml-0 ml-auto leading-none pr-3 py-1 px-2 bg-red-500 rounded-full">
                                Denegado
                                  </span>
                                @break
                            @default

                        @endswitch
                          <span class="text-gray-400 inline-flex items-center leading-none text-sm">
                            6 days
                          </span>

                      </div>
                    </div>

                  </div>
                @endforeach
                @foreach ($solicitudes as $solicitud)
                <div class="flex my-4 bg-white ">
                    <div class=" rounded-md h-full text-left px-4 py-4 w-full justify-end border-2 border-green-500">
                      <a to="jobdet" class="flex items-center flex-wrap">
                          <span class="font-bold text-lg -mt-2">Solicitud de Equipo</span>
                          <div class="mt-2 mb-3 mx-5">
                            @forelse ($solicitud->folmularioEquipo as $item)
                                <p class="text-sm text-gray-500 font-bold">
                                    {{ $item->cantidad }} {{ $item->equipo->nombre }}
                                    @if ($item->justificacion)
                                    para {{ $item->justificacion }}
                                    @endif
                                </p>
                            @empty

                            @endforelse
                          </div>
                      </a>
                      <div class="flex items-center flex-wrap ">
                        @switch($item->estado)
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
                          <span class="text-gray-400 inline-flex items-center leading-none text-sm">
                            {{ $solicitud->created_at->diffForHumans() }}
                          </span>

                      </div>
                    </div>

                  </div>
                @endforeach


              </div>
            </div>
          </div>
          <div class="col-span-9">
              <div class="ml-auto mt-3">
                <div class=" text-left"><h3 class="mt-6 text-xl">Registro de Equipos</h3> </div>
                <div class="flex flex-col mt-6">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                      <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <div class="overflow-hidden border-b border-gray-500 rounded-md shadow-md">
                          <table class="min-w-full overflow-x-scroll divide-y divide-gray-200">
                            <thead class="bg-gray-100 border-b-8 border-green-500">
                              <tr>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                  Codigo
                                </th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                    Serie
                                </th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                  Fecha Entregado
                                </th>
                              </tr>

                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">

                                @foreach ($equipos as $equipo)
                                    @if ($equipo->formularioEquipo->solicitudEquipo->estado == 2 && $equipo->formularioEquipo->solicitudEquipo->persona->user->id == Auth::user()->id)
                                    <tr class="transition-all hover:bg-gray-100 hover:shadow-lg text-center">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">{{ $equipo->serie}} </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">{{ $equipo->codigo}} </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                          <div class="text-sm text-gray-900">{{ date("d/m/Y", strtotime($equipo->fechaEntrega))}}</div>
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
          </div>
        </div>
      </main>
    </div>
  </div>
  <script>
    function clearFunction(a) {
        document.getElementById('modal-'+a).showModal();
        //document.getElementById("form-"+a).reset();
    }

    window.addEventListener('openModalEdit', event =>{
        document.getElementById('modal-create-rol').showModal()
    })
</script>
</div>
