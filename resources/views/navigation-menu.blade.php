
<nav x-data="{ open: false }" class=" border-b bg-white fixed w-max" style="width: 100%;top: 0px;" >

    <!-- Primary Navigation Menu -->

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 ">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center text-green-500">
                    <a href="{{ route('dashboard') }}" >
                        <p class="font-black text-center" >Las Lomas</p>
                        <p class="font-black text-xs" >Primera Siderurgica Boliviana</p>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">

                    @can('soporte')
                    <x-jet-nav-link href="{{ route('index') }}" :active="request()->routeIs('index')">
                        {{ __('Inicio') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="{{ route('Persona') }}" :active="request()->routeIs('Persona')">
                        {{ __('Persona') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="{{ route('Equipo') }}" :active="request()->routeIs('Equipo')">
                        {{ __('Inventario') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="{{ route('SolicitudAlmacen') }}" :active="request()->routeIs('SolicitudAlmacen')">
                        {{ __('Almacen') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="{{ route('Soporte') }}" :active="request()->routeIs('Soporte')">
                        {{ __('Asistencia Tecnica') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="{{ route('PedidoEquipo') }}" :active="request()->routeIs('PedidoEquipo')">
                        {{ __('Solicitud Equipo') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="{{ route('AsignacionEquipo') }}" :active="request()->routeIs('AsignacionEquipo')">
                        {{ __('Asignacion Equipo') }}
                    </x-jet-nav-link>
                    @endcan
                    @can('almacen')
                    <x-jet-nav-link href="{{ route('Almacen') }}" :active="request()->routeIs('Almacen')">
                        {{ __('Almacen adm') }}
                    </x-jet-nav-link>
                    @endcan
                    @can('general')
                    <x-jet-nav-link href="{{ route('Administracion') }}" :active="request()->routeIs('Administracion')">
                        {{ __('Administracion') }}
                    </x-jet-nav-link>
                    @endcan
                </div>

            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                        {{ Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>

                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Administrador de Cuentas') }}
                            </div>

                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Perfil') }}
                            </x-jet-dropdown-link>

                            <x-jet-dropdown-link href="{{ route('register') }}">
                                {{ __('Registro') }}
                            </x-jet-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-jet-dropdown-link>
                            @endif

                            <div class="border-t border-gray-100"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Cerrar Sesi??n') }}
                                </x-jet-dropdown-link>
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">

            <x-jet-responsive-nav-link href="{{ route('index') }}" :active="request()->routeIs('index')">
                {{ __('Inicio') }}
            </x-jet-responsive-nav-link>
            <x-jet-responsive-nav-link href="{{ route('Persona') }}" :active="request()->routeIs('Persona')">
                {{ __('Persona') }}
            </x-jet-responsive-nav-link>
            <x-jet-responsive-nav-link href="{{ route('Equipo') }}" :active="request()->routeIs('Equipo')">
                {{ __('Inventario') }}
            </x-jet-responsive-nav-link>
            <x-jet-responsive-nav-link href="{{ route('SolicitudAlmacen') }}" :active="request()->routeIs('SolicitudAlmacen')">
                {{ __('Almacen') }}
            </x-jet-responsive-nav-link>
            <x-jet-responsive-nav-link href="{{ route('Soporte') }}" :active="request()->routeIs('Soporte')">
                {{ __('Asistencia Tecnica') }}
            </x-jet-responsive-nav-link>
            <x-jet-responsive-nav-link href="{{ route('PedidoEquipo') }}" :active="request()->routeIs('PedidoEquipo')">
                {{ __('Solicitud Equipo') }}
            </x-jet-responsive-nav-link>
            <x-jet-responsive-nav-link href="{{ route('AsignacionEquipo') }}" :active="request()->routeIs('AsignacionEquipo')">
                {{ __('Asignacion Equipo') }}
            </x-jet-responsive-nav-link>
            <x-jet-responsive-nav-link href="{{ route('Almacen') }}" :active="request()->routeIs('Almacen')">
                {{ __('Almacen') }}
            </x-jet-responsive-nav-link>
            <x-jet-responsive-nav-link href="{{ route('Administracion') }}" :active="request()->routeIs('Administracion')">
                {{ __('Administracion') }}
            </x-jet-responsive-nav-link>

        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="flex-shrink-0 mr-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Administracion de cuentas -->
                <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Perfil') }}
                </x-jet-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-jet-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        {{ __('Cerrar sesi??n') }}
                    </x-jet-responsive-nav-link>
                </form>


            </div>
        </div>
    </div>
</nav>

