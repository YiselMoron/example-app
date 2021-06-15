<div class="pt-5 mt-5">
    <!-- component -->
<div class="pt-3">
    <div class="flex h-screen overflow-y-hidden bg-white" x-data="setup()" x-init="$refs.loading.classList.add('hidden')">
      <!-- Loading screen -->
      <div
        x-ref="loading"
        class="fixed inset-0 z-50 flex items-center justify-center text-black "
        style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)"
      >
        Loading.....
      </div>



        <!-- Sidebar footer -->
        <div class="flex-shrink-0 p-2 border-t max-h-14">

        </div>
      </aside>

      <div class="flex flex-col flex-1 h-full overflow-hidden">

        <!-- Main content -->
        <main class="flex-1 max-h-full p-5 overflow-hidden ">

         <div class="grid grid-cols-2">
             <div class=" text-left"><h3 class="mt-6 text-xl">Personal Administrativo</h3> </div>
             <div class=" ml-auto mt-3">
                 <button onclick="document.getElementById('modal-create-rol').showModal()"
                 class="px-6 py-2.5  mb-4  text-base font-semibold rounded-full block
                  bg-transparent border border-green-500  text-green-500
                   hover:bg-green-700 hover:text-white hover:border-green-500 "
                   >Registrar</button>
             </div>

            <dialog id="modal-create-rol" class=" w-11/12 md:w-6/12 p-5 bg-transparent rounded-md ">
                <div class="flex flex-col w-full h-auto ">
                     <!-- Header -->
                     <div class="flex w-full h-auto justify-center items-center">
                       <!--Header End-->
                     </div>
                       <!-- Modal Content-->
                        <div>
                            @livewire('registro-persona-view')
                        </div>
                       <!-- End of Modal Content-->
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
                        <th
                          scope="col"
                          class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                        >
                          Nombre Completo
                        </th>
                        <th
                          scope="col"
                          class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                        >
                          Departamento
                        </th>
                        <th
                          scope="col"
                          class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                        >
                          Cargo
                        </th>
                        <th
                          scope="col"
                          class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                        >
                          Usuario
                        </th>

                        <th scope="col"
                        class="px-6 py-3 text-xs font-medium tracking-wider text-right text-gray-500 uppercase">
                          Celular
                        </th>
                        <th scope="col"
                        class="px-6 py-3 text-xs font-medium tracking-wider text-right text-gray-500 uppercase">
                          Accion
                        </th>
                      </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">

                        @foreach ($personas as $item)
                        <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">

                              <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">{{ $item->nombreCompleto }}</div>

                              </div>
                            </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{$item->departamento->nombre}}</div>

                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">{{ $item->cargo->nombre }}</td>

                          <td class="text-sm text-center text-gray-500" >{{ $item->user->name }}</td>

                          <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">{{ $item->celular }}</td>

                          <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
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
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
    <script>
      const setup = () => {
        return {
          loading: true,
          isSidebarOpen: false,
          toggleSidbarMenu() {
            this.isSidebarOpen = !this.isSidebarOpen
          },
          isSettingsPanelOpen: false,
          isSearchBoxOpen: false,
        }
      }
    </script>
</div>
</div>
