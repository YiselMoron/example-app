<div class="pt-5 mt-5">
    <!-- component -->
<div class="pt-3">
    <div class="flex overflow-y-hidden bg-white" x-data="setup()" x-init="$refs.loading.classList.add('hidden')">

    <div class="flex flex-col flex-1 overflow-hidden">

        <!-- Main content -->
        <main class="flex-1 p-5 overflow-hidden ">
            <div class="grid grid-cols-2">
                <div class=" text-left"><h3 class="mt-6 text-xl">Asignacion Equipos</h3> </div>
                <div class=" ml-auto mt-3">
                    <div class="mx-2">
                        <a href="/equipos_asignados_pdf" class="px-6 py-2.5  mb-4  text-base
                        font-semibold rounded-full block  bg-transparent border border-green-500
                        text-green-500 hover:bg-green-700 hover:text-white
                        hover:border-green-500 ">Reporte</a>
                    </div>
                </div>
            </div>
            <div class="flex flex-col mt-6">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <div class="overflow-hidden border-b border-gray-500 rounded-md shadow-md">
                <table class="min-w-full overflow-x-scroll divide-y divide-gray-200">
                    <thead class="bg-gray-100 border-b-8 border-green-500">
                        <tr>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-gray-500 uppercase">
                            Responsable
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-gray-500 uppercase">
                            Equipo
                        </th>

                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-gray-500 uppercase">
                            Codigo
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-gray-500 uppercase">
                            Fecha entregado
                        </th>
                        </tr>

                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">

                        @foreach ($AsignacionEquipos as $item)

                        <tr class="transition-all hover:bg-gray-100 hover:shadow-lg text-center">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $item->formularioEquipo->solicitudEquipo->persona->nombreCompleto }}</div>
                                <div class="text-sm text-gray-500">{{ $item->formularioEquipo->solicitudEquipo->persona->user->email }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $item->formularioEquipo->Equipo->nombre}}</div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $item->codigo}}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ date("d/m/Y", strtotime($item->fechaEntrega))}}</div>
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
