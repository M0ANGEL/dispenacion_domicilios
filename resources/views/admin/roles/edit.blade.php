<x-app-layout>
    <style>
        .permissions-list {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            /* 4 columnas */
            gap: 1rem;
            /* Espacio entre columnas */
            list-style: none;
            padding: 0;
        }

        .check {
            margin-bottom: 5px;

        }

        .lista {
            border: 2px solid blueviolet;
            border-radius: 8px;
        }

        .permissions-list li {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
    </style>
    <form action="{{ route('roles.update', $role) }}" method="POST" class="bg-white rounded-lg p-6"
        style="box-shadow: 0 4px 6px rgba(0, 0, 0, 1); "> {{-- /* Sombra del formulario */ --}}
        @csrf
        @method('PUT')
        <h1 style="text-align:center; font-size: 20px; margin: 5px;"><b>Permisos De Perfil</b></h1>
        <div class="mb-4">
            <x-input name="name" class="w-full" placeholder="Escriba el nombre del roll" value="{{ $role->name }}"
                readonly />
        </div>
        <ul class="permissions-list">
            @foreach ($permissions as $permission)
                <li class="lista">
                    <label>{{ $permission->name }}</label>
                    <x-checkbox class="check" name="permissions[]" value="{{ $permission->id }}" :checked="in_array($permission->id, $role->permissions->pluck('id')->toArray())" />
                </li>
            @endforeach
        </ul>

        <div class="flex justify-end">

            <x-danger-button class="mr-2" onclick="deleteRol()">
                Eliminar
            </x-danger-button>

            <x-button>
                Actualizar
            </x-button>
        </div>
    </form>

    {{-- form de delete --}}
    <form action="{{ route('roles.destroy', $role) }}" method="POST" id="formDelete">
        @csrf
        @method('DELETE')
    </form>

    @push('js')
        <script>
            function deleteRol() {
                form = document.getElementById('formDelete');
                form.submit();
            }
        </script>
    @endpush
</x-app-layout>