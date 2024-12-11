<nav class="bg-white border-gray-200">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <div href="#" class="flex items-center space-x-3 rtl:space-x-reverse">

            <div class="flex flex-row gap-4">
                <img class="w-14 h-14 p-1 rounded-full ring-2 ring-gray-300" src="{{ Auth::user()->profile_photo_url }}"
                    alt="{{ Auth::user()->firstname }}" />

                <div class="flex flex-col">
                    <span class="text-left text-xl font-semibold whitespace-nowrap">{{Auth::user()->name}}</span>
                    @if (Auth::user()->current_device)
                    <span class="self-center whitespace-nowrap">Dispositivo:
                        <b>{{Auth::user()->current_device->name}}</b></span>
                    @endif
                </div>
            </div>
        </div>
        <button data-collapse-toggle="navbar-default" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-[18px] text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
            aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul
                class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white">
                <li>
                    <button id="Dispositivos" data-dropdown-toggle="dropdown"
                        class=" py-2 w-full px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 flex items-center"
                        type="button">
                        Dispositivos
                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 ">
                        @if(devices(Auth::user()->id)->count() >= 1 )
                        <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownDefaultButton">
                            @foreach (devices(Auth::user()->id) as $item)
                            <li>
                                <a href="{{route('user.device.update',['device'=> $item->id])}}" class="block px-4 py-2
                                    hover:bg-gray-100">{{$item->name}}</a>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                        <div class="py-2">
                            @if (Auth::user()->current_device)
                            <a href="{{route('device.edit',['device' => Auth::user()->current_device_id]) }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Editar</a>
                            @endif

                            <a href="{{route('device.add')}}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Vincular</a>
                            @if (Auth::user()->current_device)

                            <a wire:confirm='¿Esta seguro de eliminar este dispositivo?'
                                href="{{route('user.device.remove', ['device' => Auth::user()->current_device_id])}}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Desvincular</a>
                            @endif

                        </div>
                    </div>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">Ayuda
                        <box-icon name="help-circle"></box-icon>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">Configuración
                        <box-icon name="cog"></box-icon>
                    </a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                        <a class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0"
                            href="{{ route('logout') }}" @click.prevent="$root.submit();">
                            {{ __('Log Out') }}
                        </a>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>