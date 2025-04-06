@php
    // $links = [
    //     [
    //         /* vista medica */
    //         'name' => 'Vista Medica',
    //         'url' => route('vistamedica.index'),
    //         'active' => request()->routeIs('vistamedica.*'),
    //         'icon' => 'fa-solid fa-hand-holding-medical',
    //         'can' => 'vista_medica',
    //     ],
    //     [
    //         /* vista agotado */
    //         'name' => 'Vista Agotados',
    //         'url' => route('agotados'),
    //         'active' => request()->routeIs('agotados'),
    //         'icon' => 'fa-solid fa-v',
    //         'can' => 'agotados',
    //     ],

    //     [
    //         /*cpyparte impresoras */
    //         'name' => 'Administracion de reportes',
    //         'url' => route('Copyparte.index'),
    //         'active' => request()->routeIs('Copyparte.*'),
    //         'icon' => 'fa-solid fa-globe',
    //         'can' => 'copy',
    //     ],
    //     [
    //         /*historial de impresoras */
    //         'name' => 'Historial de maquinas',
    //         'url' => route('Copypart.index2'),
    //         'active' => request()->routeIs('Copypart.index2'),
    //         'icon' => 'fa-solid fa-clock-rotate-left',
    //         'can' => 'copy',
    //     ],
    //     /* confirmar usuarios huv */
    //     [
    //         'name' => 'Solicitudes Creacion Usuarios Farmart',
    //         'url' => route('solicitud.index'),
    //         'active' => request()->routeIs('solicitud.*'),
    //         'icon' => 'fa-regular fa-hospital',
    //         'can' => 'solicitudes',
    //     ],
    //     /* permisos de cambio huv */
    //     [
    //         'name' => 'Solicitudes Permisos Servinte',
    //         'url' => route('huvpermisos.index'),
    //         'active' => request()->routeIs('huvpermisos.*'),
    //         'icon' => 'fa-solid fa-user-gear',
    //         'can' => 'solicitudes',
    //     ],
    //     /* inacticaion codigos huv*/
    //     /*  [
//         'name' => 'Inactivar Codigos Huv',
//         'url' => route('cambio.index'),
//         'active' => request()->routeIs('cambio.*'),
//         'icon' => 'fa-regular fa-circle-xmark',
//     ], */

    //     /* cambiar contra*/
    //     [
    //         'name' => 'Cambiar Password',
    //         'url' => route('cambio.index'),
    //         'active' => request()->routeIs('cambio.*'),
    //         'icon' => 'fa-solid fa-unlock-keyhole',
    //     ],
    // ];

    $buttonAdmin = [
        'can' => 'ModuloAdmin',
    ];

    $superadmin = [
        /* nuevos usuarios*/
        [
            'name' => 'Administrar Usuarios',
            'url' => route('users.index'),
            'active' => request()->routeIs('users.*'),
            'icon' => 'fa-solid fa-users',
            'can' => 'admin_usuarios',
        ],
        /* roles*/
        [
            'name' => 'Roles',
            'url' => route('roles.index'),
            'active' => request()->routeIs('roles.*'),
            'icon' => 'fa-solid fa-gear',
            'can' => 'crear_roles',
        ],
        /* permisos*/
        [
            'name' => 'Permisos',
            'url' => route('permissions.index'),
            'active' => request()->routeIs('permissions.*'),
            'icon' => 'fa-solid fa-key',
            'can' => 'crear_permisos',
        ],
    ];

    //CREACION PACIENTE
    $buttonPresmy = [
        'can' => 'ModuloMipres',
    ];

    $pacientes = [
        /*  Crear Paciente*/
        [
            'name' => 'Crear Pacientes',
            'url' => route('pacientes.create'),
            'active' => request()->routeIs('pacientes.create'),
            'icon' => 'fa-regular fa-circle',
            'can' => 'Mipres_Crear_Paciente',
        ],
        /*  buscar Paciente*/
        [
            'name' => 'Buscar Pacientes',
            'url' => route('pacientes.index'),
            'active' => request()->routeIs('pacientes.index'),
            'icon' => 'fa-regular fa-circle',
            'can' => 'Mipres_Crear_Paciente',
        ],
    ];

    //SOLICITUD
    $buttonSolicitud = [
        'can' => 'ModuloMipres',
    ];

    $solicitudes = [
        /* Crear solicitud */
        [
            'name' => 'Crear Solicitudes',
            'url' => route('solicitud.create'),
            'active' => request()->routeIs('solicitud.create'),
            'icon' => 'fa-regular fa-circle',
            'can' => 'Mipres_Crear_mipres',
        ],
        /* crear formulacion de una solicitud */
        [
            'name' => 'Solicitudes ',
            'url' => route('solicitud.index'),
            'active' => request()->routeIs('solicitud.index'),
            'icon' => 'fa-regular fa-circle',
            'can' => 'Mipres_Crear_mipres',
        ],
    ];

    //PROGRAMACION
    $buttonDispensacion = [
        'can' => 'ModuloMipres',
    ];

    $dispensaciones = [
        /* Crear solicitud */
        [
            'name' => 'Solicitudes Pendientes',
            'url' => route('dispensacion.index'),
            'active' => request()->routeIs('dispensacion.*'),
            'icon' => 'fa-regular fa-circle',
            'can' => 'Mipres_Crear_mipres',
        ],
    ];

        //domicilio
    $buttonDomicilio = [
        'can' => 'ModuloMipres',
    ];

    $domicilios = [
        /* Crear solicitud */
        [
            'name' => 'Domicilios Pendientes',
            'url' => route('domicilios.index'),
            'active' => request()->routeIs('domicilios.index'),
            'icon' => 'fa-regular fa-circle',
            'can' => 'Mipres_Crear_mipres',
        ],
          /* Crear solicitud */
          [
            'name' => 'Reporte Domicilios',
            'url' => route('exportar.index'),
            'active' => request()->routeIs('exportar.index'),
            'icon' => 'fa-regular fa-circle',
            'can' => 'Mipres_Crear_mipres',
        ],
    ];

         //confirmar domicilio
    $buttonDomicilioConfirmar = [
        'can' => 'ModuloMipres',
    ];

    $domiciliosConfirmar = [
        /* Crear solicitud */
        [
            'name' => 'Confirmar Entrega Domicilios ',
            'url' => route('confirmacion.index'),
            'active' => request()->routeIs('confirmacion.index'),
            'icon' => 'fa-regular fa-circle',
            'can' => 'Mipres_Crear_mipres',
        ],
    ];

@endphp

<style>
    #linkNormales:hover {
        background: red;
        border-radius: 8px;
    }

    <style>

    /* ESTILOS ACTUALES (problema) */
    .collapse {
        transition: opacity 0.5s ease, transform 0.5s ease;
        opacity: 0;
        transform: scaleY(0);
        height: 0;
        overflow: hidden;
    }

    .collapse.show {
        opacity: 1;
        transform: scaleY(1);
        height: auto;
    }

    /* Estilo del sidebar */
    #sidebara {
        background: black;
        /* Fondo negro para el sidebar */
    }

    /* Estilo de los elementos de la lista */
    #sidebar-multi-level-sidebar ul li a {
        color: white;
        /* Letras blancas para los links */
    }

    /* Estilo para los submenús */
    #sidebar-multi-level-sidebar ul li ul {
        background: orange;
        border-radius: 8px;
        /* Fondo naranja para los submenús */
    }

    #sidebar-multi-level-sidebar ul li ul li a {
        color: black;
        /* Letras negras para los links de los submenús */
    }
</style>

<aside id="sidebar-multi-level-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen bg-black transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto " style="background: rgb(2, 7, 125)/* #0b1f6d */;">
        <ul class="space-y-2 font-medium">
            {{-- icono --}}
            <li>
                <a href="{{ route('dashboard') }}" class="flex items-center p-2  rounded-lg text-white group">
                    <i class="fa-solid fa-volcano">
                        <path
                            d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path
                            d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </i>
                    <span class="ms-3" style="color: aqua; font-size: 20px;"><b>MEDI DOMICILIOS</b></span>
                </a>
            </li>

            {{-- admin --}}
            {{-- @canany($buttonAdmin['can']) --}}
            <li>
                <button type="button"
                    class="flex items-center w-full p-2 text-base  transition duration-75 rounded-lg group hover:bg-gray-100 hover:text-gray-900 text-white "
                    aria-controls="dropdown-admin" data-collapse-toggle="dropdown-admin">
                    <i class="fa-solid fa-unlock-keyhole">
                        <path
                            d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                    </i>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Admin</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <ul id="dropdown-admin" class="hidden py-2 space-y-2">
                    @foreach ($superadmin as $admin)
                        {{-- @canany($admin['can'] ?? [null]) --}}
                        <li>
                            <a href="{{ $admin['url'] }}"
                                style="display: flex; align-items: center; padding: 8px; border-radius: 8px; text-decoration: none; color: {{ $admin['active'] ? 'white' : 'black' }}; background-color: {{ $admin['active'] ? 'black' : '' }};"
                                onmouseover="this.style.backgroundColor='black'; this.style.color='white';"
                                onmouseout="this.style.backgroundColor='{{ $admin['active'] ? 'black' : '' }}'; this.style.color='{{ $admin['active'] ? 'white' : 'black' }}';">
                                <span style="margin-left: 12px;"><b>{{ $admin['name'] }}</b></span>
                                <!-- Línea horizontal -->
                            </a>
                        </li>
                        {{-- @endcanany --}}
                    @endforeach
                </ul>
            </li>
            {{-- @endcanany --}}

            {{-- pacientes --}}
            {{-- @canany($buttonPresmy['can']) --}}
            <li>
                <button type="button"
                    class="flex items-center w-full p-2 text-base  transition duration-75 rounded-lg group hover:bg-gray-100 hover:text-gray-900 text-white "
                    aria-controls="dropdown-pacientes" data-collapse-toggle="dropdown-pacientes">
                    <i class="fa-solid fa-hospital-user">
                        <path
                            d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                    </i>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Pacientes</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <ul id="dropdown-pacientes" class="hidden py-2 space-y-2">
                    @foreach ($pacientes as $paciente)
                        {{-- @canany($presmy['can'] ?? [null]) --}}
                        <li>
                            <a href="{{ $paciente['url'] }}"
                                style="display: flex; align-items: center; padding: 8px; border-radius: 8px; text-decoration: none; color: {{ $paciente['active'] ? 'white' : 'black' }}; background-color: {{ $paciente['active'] ? 'black' : '' }};"
                                onmouseover="this.style.backgroundColor='black'; this.style.color='white';"
                                onmouseout="this.style.backgroundColor='{{ $paciente['active'] ? 'black' : '' }}'; this.style.color='{{ $paciente['active'] ? 'white' : 'black' }}';">
                                <span style="margin-left: 12px;"><b>{{ $paciente['name'] }}</b></span>
                                <!-- Línea horizontal -->
                            </a>
                        </li>
                        {{-- @endcanany --}}
                    @endforeach

                </ul>
            </li>
            {{-- @endcanany --}}

            {{-- solicitud --}}
            {{-- @canany($buttonSolicitud['can']) --}}
            <li>
                <button type="button"
                    class="flex items-center w-full p-2 text-base  transition duration-75 rounded-lg group hover:bg-gray-100 hover:text-gray-900 text-white "
                    aria-controls="dropdown-solicitud" data-collapse-toggle="dropdown-solicitud">
                    <i class="fa-regular fa-calendar-days">
                        <path
                            d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                    </i>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Solicitudes</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <ul id="dropdown-solicitud" class="hidden py-2 space-y-2">
                    @foreach ($solicitudes as $solicitud)
                        {{-- @canany($presmy['can'] ?? [null]) --}}
                        <li>
                            <a href="{{ $solicitud['url'] }}"
                                style="display: flex; align-items: center; padding: 8px; border-radius: 8px; text-decoration: none; color: {{ $solicitud['active'] ? 'white' : 'black' }}; background-color: {{ $solicitud['active'] ? 'black' : '' }};"
                                onmouseover="this.style.backgroundColor='black'; this.style.color='white';"
                                onmouseout="this.style.backgroundColor='{{ $solicitud['active'] ? 'black' : '' }}'; this.style.color='{{ $solicitud['active'] ? 'white' : 'black' }}';">
                                <span style="margin-left: 12px;"><b>{{ $solicitud['name'] }}</b></span>
                                <!-- Línea horizontal -->
                            </a>
                        </li>
                        {{-- @endcanany --}}
                    @endforeach

                </ul>
            </li>
            {{-- @endcanany --}}

            {{-- dispensacio --}}
            {{-- @canany($buttonDispensacion['can']) --}}
            <li>
                <button type="button"
                    class="flex items-center w-full p-2 text-base  transition duration-75 rounded-lg group hover:bg-gray-100 hover:text-gray-900 text-white "
                    aria-controls="dropdown-dispensacion" data-collapse-toggle="dropdown-dispensacion">
                    <i class="fa-brands fa-squarespace">
                        <path
                            d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                    </i>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Dispensacion</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <ul id="dropdown-dispensacion" class="hidden py-2 space-y-2">
                    @foreach ($dispensaciones as $dispenseacion)
                        {{-- @canany($presmy['can'] ?? [null]) --}}
                        <li>
                            <a href="{{ $dispenseacion['url'] }}"
                                style="display: flex; align-items: center; padding: 8px; border-radius: 8px; text-decoration: none; color: {{ $dispenseacion['active'] ? 'white' : 'black' }}; background-color: {{ $dispenseacion['active'] ? 'black' : '' }};"
                                onmouseover="this.style.backgroundColor='black'; this.style.color='white';"
                                onmouseout="this.style.backgroundColor='{{ $dispenseacion['active'] ? 'black' : '' }}'; this.style.color='{{ $dispenseacion['active'] ? 'white' : 'black' }}';">
                                <span style="margin-left: 12px;"><b>{{ $dispenseacion['name'] }}</b></span>
                                <!-- Línea horizontal -->
                            </a>
                        </li>
                        {{-- @endcanany --}}
                    @endforeach

                </ul>
            </li>
            {{-- @endcanany --}}

            {{-- domicilio --}}
            {{-- @canany($buttonDomicilio['can']) --}}
            <li>
                <button type="button"
                    class="flex items-center w-full p-2 text-base  transition duration-75 rounded-lg group hover:bg-gray-100 hover:text-gray-900 text-white "
                    aria-controls="dropdown-domicilio" data-collapse-toggle="dropdown-domicilio">
                    <i class="fa-solid fa-truck">
                        <path
                            d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                    </i>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Domicilios</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <ul id="dropdown-domicilio" class="hidden py-2 space-y-2">
                    @foreach ($domicilios as $domicilio)
                        {{-- @canany($presmy['can'] ?? [null]) --}}
                        <li>
                            <a href="{{ $domicilio['url'] }}"
                                style="display: flex; align-items: center; padding: 8px; border-radius: 8px; text-decoration: none; color: {{ $domicilio['active'] ? 'white' : 'black' }}; background-color: {{ $domicilio['active'] ? 'black' : '' }};"
                                onmouseover="this.style.backgroundColor='black'; this.style.color='white';"
                                onmouseout="this.style.backgroundColor='{{ $domicilio['active'] ? 'black' : '' }}'; this.style.color='{{ $domicilio['active'] ? 'white' : 'black' }}';">
                                <span style="margin-left: 12px;"><b>{{ $domicilio['name'] }}</b></span>
                                <!-- Línea horizontal -->
                            </a>
                        </li>
                        {{-- @endcanany --}}
                    @endforeach

                </ul>
            </li>
            {{-- @endcanany --}}

              {{-- domicilio --}}
            {{-- @canany($buttonDomicilioConfirmar['can']) --}}
            <li>
                <button type="button"
                    class="flex items-center w-full p-2 text-base  transition duration-75 rounded-lg group hover:bg-gray-100 hover:text-gray-900 text-white "
                    aria-controls="dropdown-confirmarEntrega" data-collapse-toggle="dropdown-confirmarEntrega">
                    <i class="fa-solid fa-handshake">
                        <path
                            d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                    </i>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Confirmar Entrega</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <ul id="dropdown-confirmarEntrega" class="hidden py-2 space-y-2">
                    @foreach ($domiciliosConfirmar as $domiciliosConfirma)
                        {{-- @canany($presmy['can'] ?? [null]) --}}
                        <li>
                            <a href="{{ $domiciliosConfirma['url'] }}"
                                style="display: flex; align-items: center; padding: 8px; border-radius: 8px; text-decoration: none; color: {{ $domiciliosConfirma['active'] ? 'white' : 'black' }}; background-color: {{ $domiciliosConfirma['active'] ? 'black' : '' }};"
                                onmouseover="this.style.backgroundColor='black'; this.style.color='white';"
                                onmouseout="this.style.backgroundColor='{{ $domiciliosConfirma['active'] ? 'black' : '' }}'; this.style.color='{{ $domiciliosConfirma['active'] ? 'white' : 'black' }}';">
                                <span style="margin-left: 12px;"><b>{{ $domiciliosConfirma['name'] }}</b></span>
                                <!-- Línea horizontal -->
                            </a>
                        </li>
                        {{-- @endcanany --}}
                    @endforeach

                </ul>
            </li>
            {{-- @endcanany --}}














            {{-- link normales --}}
            {{-- @foreach ($links as $link)
                @canany($link['can'] ?? [null])
                    <li id="linkNormales">
                        <a href="{{ $link['url'] }}"
                            class="flex items-center p-2  rounded-lg  group  {{ $link['active'] ? 'bg-red-700' : '' }}">
                            <i class="{{ $link['icon'] }}"></i>
                            <span class="ms-3">{{ $link['name'] }}</span>
                        </a>
                    </li>
                @endcanany
            @endforeach --}}

        </ul>
    </div>
</aside>

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const buttons = document.querySelectorAll('button[data-collapse-toggle]');

            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    const targetId = this.getAttribute('aria-controls');
                    const targetMenu = document.getElementById(targetId);

                    // Alternar visibilidad del menú
                    if (targetMenu.classList.contains('hidden')) {
                        // Mostrar menú
                        targetMenu.classList.remove('hidden');
                        setTimeout(() => {
                            targetMenu.classList.add('show');
                        }, 10); // Pequeño retraso para permitir renderizado
                    } else {
                        // Ocultar menú
                        targetMenu.classList.remove('show');
                        setTimeout(() => {
                            targetMenu.classList.add('hidden');
                        }, 300); // Espera a que termine la transición (debe coincidir con tu CSS)
                    }
                });
            });
        });
    </script>
@endpush
