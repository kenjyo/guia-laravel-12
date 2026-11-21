
<nav x-data="{ open: false }" class="sticky top-0 z-50 bg-[#172554] border-b border-[#172554] shadow-sm">

    <!-- Primary Navigation Menu -->
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="flex h-16 justify-between">

            <div class="flex">

                <!-- Logo / Nombre del sistema -->
                <div class="flex shrink-0 items-center">
                    <a href="{{ route('productos.index') }}"
                       class="text-xl font-bold tracking-tight text-white transition hover:text-blue-200">
                        Gestión de productos
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">

                    <a href="{{ route('productos.index') }}"
                       class="inline-flex items-center border-b-2 px-1 pt-1 text-sm font-medium transition
                       {{ request()->routeIs('productos.*')
                            ? 'border-blue-300 text-white'
                            : 'border-transparent text-blue-200 hover:border-blue-400 hover:text-white' }}">
                        Productos
                    </a>

                </div>

            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:ms-6 sm:flex sm:items-center">

                <x-dropdown align="right" width="48">

                    <x-slot name="trigger">
                        <button class="inline-flex items-center gap-2 rounded-lg border border-[#304477] bg-[#1e3268] px-4 py-2 text-sm font-medium text-white shadow-sm transition hover:border-[#526a9c] hover:bg-[#263b70] focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 focus:ring-offset-[#172554]">

                            <!-- User Icon -->
                            <svg class="h-5 w-5 text-blue-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.1a7.5 7.5 0 0115 0A17.9 17.9 0 0112 21.75 17.9 17.9 0 014.5 20.1z" />
                            </svg>

                            <span>{{ Auth::user()->name }}</span>

                            <svg class="h-4 w-4 fill-current text-blue-200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>

                        </button>
                    </x-slot>

                    <x-slot name="content">

                        <x-dropdown-link :href="route('profile.edit')">
                            Perfil
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                Cerrar sesión
                            </x-dropdown-link>
                        </form>

                    </x-slot>

                </x-dropdown>

            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">

                <button @click="open = ! open"
                    class="inline-flex items-center justify-center rounded-md p-2 text-blue-200 transition hover:bg-[#263b70] hover:text-white focus:bg-[#263b70] focus:text-white focus:outline-none">

                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">

                        <path :class="{'hidden': open, 'inline-flex': ! open}"
                            class="inline-flex"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />

                        <path :class="{'hidden': ! open, 'inline-flex': open}"
                            class="hidden"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />

                    </svg>

                </button>

            </div>

        </div>

    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden border-t border-[#304477] bg-[#172554] sm:hidden">

        <div class="space-y-1 pb-3 pt-2">

            <x-responsive-nav-link :href="route('productos.index')" :active="request()->routeIs('productos.*')">
                Productos
            </x-responsive-nav-link>

        </div>

        <!-- Responsive Settings Options -->
        <div class="border-t border-[#304477] pb-1 pt-4">

            <div class="px-4">

                <div class="text-base font-medium text-white">
                    {{ Auth::user()->name }}
                </div>

                <div class="text-sm font-medium text-blue-200">
                    {{ Auth::user()->email }}
                </div>

            </div>

            <div class="mt-3 space-y-1">

                <x-responsive-nav-link :href="route('profile.edit')">
                    Perfil
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        Cerrar sesión
                    </x-responsive-nav-link>
                </form>

            </div>

        </div>

    </div>

</nav>
