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
             <div class=" ml-auto mt-3"><button class="px-6 py-2.5  mb-4  text-base   font-semibold rounded-full block  bg-transparent border border-green-500  text-green-500 hover:bg-green-700 hover:text-white hover:border-green-500 ">New</button>
             </div>
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
                          Area
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
                          Email
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
                        <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                              <div class="flex-shrink-0 w-10 h-10">
                                <img
                                  class="w-10 h-10 rounded-full"
                                  src="https://avatars0.githubusercontent.com/u/57622665?s=460&u=8f581f4c4acd4c18c33a87b3e6476112325e8b38&v=4"
                                  alt=""
                                />
                              </div>
                              <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">Ahmed Kamel</div>

                              </div>
                            </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">RRHH</div>

                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">Administrador</td>

                          <td class="text-sm text-gray-500">ahmed.kamel@example.com</td>

                          <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                            <a href="#" class="text-indigo-600 hover:text-indigo-900">23456789</a>
                          </td>
                          <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                          </td>
                        </tr>

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