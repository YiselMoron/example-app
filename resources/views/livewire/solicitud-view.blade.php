<div class="pt-5 mt-5">
    <!-- component -->
<div class="pt-3">
    <div class="flex h-screen overflow-y-hidden bg-white" >
      <!-- Loading screen -->


      <div class="flex flex-col flex-1 h-full overflow-hidden">

        <!-- Main content -->
        <main class="flex-1 max-h-full p-5 overflow-hidden ">
            <dialog id="modal-solucion" class=" w-11/12 md:w-6/12 p-5 bg-transparent rounded-md mt-0">
                <div class="flex flex-col w-full h-auto ">
                    <div >
                        @livewire('registro-soporte')
                    </div>
                </div>
            </dialog>
            <div class="grid grid-cols-2">
                <div class=" text-left"><h3 class="mt-6 text-xl">Solicitud</h3> </div>
            </div>
          <div class="flex flex-col mt-6">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden border-b border-gray-500 rounded-md shadow-md">
                  <table class="min-w-full overflow-x-scroll divide-y divide-gray-200">
                    <thead class="bg-gray-100 border-b-8 border-green-500">
                      <tr>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase" >
                          Nombre
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase" >
                          Solicitud
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase" >
                            Solución
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase" >
                          Estado
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase" >
                          Area
                        </th>
                        <th scope="col"
                        class="px-6 py-3 text-xs font-medium tracking-wider text-right text-gray-500 uppercase">
                          Fecha Solicitud
                        </th>
                        <th scope="col"
                        class="px-6 py-3 text-xs font-medium tracking-wider text-right text-gray-500 uppercase">
                          accion
                        </th>
                      </tr>

                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 ">
                        @foreach ($asistencias as $asistencia)
                        <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $asistencia->persona->nombreCompleto }}</div>
                            <div class="text-sm text-gray-500">{{ $asistencia->persona->user->email }}</div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $asistencia->problema }}</div>
                            <div class="text-sm text-gray-500">
                                @if ($asistencia->mantenimiento)
                                    Mantenimiento
                                @elseif ($asistencia->soporte)
                                    Soporte
                                @else
                                    diagnostico pendiente
                                @endif
                            </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            {{ $asistencia->solucion }}
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            
                              @switch($asistencia->estado)
                                  @case(1)
                                        <span class="inline-flex px-2 text-xs font-semibold leading-5 text-white bg-green-500 rounded-full">
                                            P
                                        </span>
                                      @break
                                  @case(2)
                                        <span class="inline-flex px-2 text-xs font-semibold leading-5 text-white bg-red-500 rounded-full">
                                            F
                                        </span>
                                      @break
                                  @default
                                      
                              @endswitch
                          </td>
                          <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $asistencia->persona->departamento->nombre }}</td>
                          <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap text-right">{{ date("d/m/Y", strtotime($asistencia->created_at)) }}</td>
                          <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                            @if ($asistencia->mantenimiento || $asistencia->soporte)
                                @if ($asistencia->mantenimiento)
                                    <a wire:click="finalizar({{ $asistencia->mantenimiento->id }}, {{ $asistencia->id }}, 'mantenimiento')" class="text-indigo-600 hover:text-indigo-900">Finalizar</a>
                                @elseif ($asistencia->soporte)
                                    <a wire:click="finalizar({{ $asistencia->soporte->id }}, {{ $asistencia->id }}, 'soporte')" class="text-indigo-600 hover:text-indigo-900">Finalizar</a>
                                @endif
                            @else
                                <a wire:click="diagnostico({{ $asistencia->id }}, 'soporte')" class="text-indigo-600 hover:text-indigo-900">Soporte</a> / 
                                <a wire:click="diagnostico({{ $asistencia->id }}, 'mantenimiento')" class="text-indigo-600 hover:text-indigo-900">Mantenimiento</a>
                            @endif
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
                document.getElementById('modal-solucion').showModal()
            })
    </script>
</div>
</div>

