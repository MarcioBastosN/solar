<nav x-data="{ open: false }" class="bg-primary text-white">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('welcome') }}">
                        <a href="" class="flex items-center space-x-3 rtl:space-x-reverse ">
                            <img src="{{ asset('logo.png') }}" class="h-8 sm:h-6" alt="paula seilva" />
                            <img src="{{ asset('text_paula.png') }}" class="h-8 sm:h-6" alt="paula seilva" />
                            <img src="{{ asset('text_silva.png') }}" class="h-8 sm:h-6" alt="paula seilva" />
                            {{-- <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Paula Silva</span> --}}
                        </a>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    @hasallroles('user')
                        <x-nav-link :href="route('cliente.home')" :active="request()->routeIs('cliente.home')">
                            {{ __('Home') }}
                        </x-nav-link>
                        @if (auth()->user()->register()->count() > 0)
                            <x-nav-link :href="route('cliente.porjects')" :active="request()->routeIs('cliente.porjects')">
                                {{ __('Meus projetos') }}
                            </x-nav-link>
                        @endif
                    @endhasallroles
                    @hasallroles('admin')
                        <x-nav-link :href="route('admin.clientes')" :active="request()->routeIs('admin.clientes')">
                            {{ __('Clientes') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.disjuntor')" :active="request()->routeIs('admin.disjuntor')">
                            {{ __('Disjuntor') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.status.project')" :active="request()->routeIs('admin.status.project')">
                            {{ __('Status') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.gerente')" :active="request()->routeIs('admin.gerente')">
                            {{ __('Gerente') }}
                        </x-nav-link>
                    @endhasallroles
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent
                                text-sm leading-4 font-medium rounded-md hover:text-gray-400
                                focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    {{-- <x-slot name="content"> --}}
                    <x-dropdown.item :href="route('profile.edit')" class="text-primary">
                        {{ __('Perfil') }}
                    </x-dropdown.item>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}" class="text-primary">
                        @csrf

                        <x-dropdown.item :href="route('logout')"
                            onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown.item>
                    </form>
                    {{-- </x-slot> --}}
                </x-dropdown>
                <button id="theme-toggle" type="button" class="p-2 bg-gray-300 text-gray-700 rounded-lg">
                    <svg id="theme-toggle-light-icon" class="hidden h-4" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                            fill-rule="evenodd" clip-rule="evenodd"></path>
                    </svg>
                    <svg id="theme-toggle-dark-icon" class="hidden h-4" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                    </svg>
                </button>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md
                        hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100
                        focus:text-gray-500 transition duration-150 ease-in-out text-white">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1 ">
            @hasallroles('user')
                <x-responsive-nav-link :href="route('cliente.home')" :active="request()->routeIs('cliente/home')">
                    {{ __('Home') }}
                </x-responsive-nav-link>
                @if (auth()->user()->register()->count() > 0)
                    <x-responsive-nav-link :href="route('cliente.porjects')" :active="request()->routeIs('cliente.porjects')">
                        {{ __('Meus projetos') }}
                    </x-responsive-nav-link>
                @endif
            @endhasallroles
            {{-- <x-responsive-nav-link :href="route('admin.clientes')" :active="request()->routeIs('dmin.clientes')">
                {{ __('Clientes') }}
            </x-responsive-nav-link> --}}
            @hasallroles('admin')
                <x-responsive-nav-link :href="route('admin.clientes')" :active="request()->routeIs('admin.clientes')">
                    {{ __('Clientes') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin.disjuntor')" :active="request()->routeIs('admin.disjuntor')">
                    {{ __('Disjuntor') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin.status.project')" :active="request()->routeIs('admin.status.project')">
                    {{ __('Status') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin.gerente')" :active="request()->routeIs('admin.gerente')">
                    {{ __('Gerente') }}
                </x-responsive-nav-link>
            @endhasallroles
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-dashed border-secondary">
            <div class="px-4">
                <div class="font-medium text-base text-gray-400">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-400">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
