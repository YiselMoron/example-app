<div class="pt-5 mt-5">
    <!-- component -->
<div class="pt-3">
    <div class="flex h-screen overflow-y-hidden bg-gray-50" x-data="setup()" x-init="$refs.loading.classList.add('hidden')">
      <!-- Loading screen -->


      <div class="flex flex-col flex-1 overflow-hidden">

        <!-- Main content -->
        <main class="flex-1 p-5 overflow-hidden ">
         <h3 class="mt-6 text-xl">Solicitudes Pendientes</h3>
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
                          Tipo Solicitud
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase" >
                          Estado
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase" >
                          Area
                        </th>

                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-right text-gray-500 uppercase">
                          accion
                        </th>
                      </tr>

                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($asistencias as $asistencia)
                        <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                            <td class="px-6 py-4 whitespace-nowrap">

                                  <div class="text-sm font-medium text-gray-900">{{ $asistencia->persona->nombreCompleto }}</div>
                                  <div class="text-sm text-gray-500">{{ $asistencia->persona->user->email }}</div>

                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                              <div class="text-sm text-gray-900">Mantenimiento</div>
                              <div class="text-sm text-gray-500">Soporte/Mantenimiento</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                              <span class="inline-flex px-2 text-xs font-semibold leading-5 text-white bg-red-500 rounded-full" >
                                Pendiente
                              </span>

                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $asistencia->persona->departamento->nombre }}</td>
                            <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                              <a wire:click="procesarSolicitud({{ $asistencia->id }}, 'soporte')" class="text-indigo-600 hover:text-indigo-900">Procesar</a>
                            </td>
                        </tr>
                        @endforeach
                        @foreach ($solicitudes as $solicitud)
                        <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $solicitud->persona->nombreCompleto }}</div>
                                <div class="text-sm text-gray-500">{{ $solicitud->persona->user->email }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                              <div class="text-sm text-gray-900">Solicitud de equipo</div>
                              <div class="text-sm text-gray-500">Equipo</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                              <span class="inline-flex px-2 text-xs font-semibold leading-5 text-white bg-red-500 rounded-full" >
                                Pendiente
                              </span>

                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $solicitud->persona->departamento->nombre }}</td>
                            <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                              <a wire:click="procesarSolicitud({{ $solicitud->id }}, 'equipo')" class="text-indigo-600 hover:text-indigo-900">Procesar</a>
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
