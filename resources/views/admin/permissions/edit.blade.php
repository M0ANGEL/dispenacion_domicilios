<x-app-layout>
    <form action="{{route('permissions.update',$permission)}}" method="POST"
    class="bg-white rounded-lg p-6" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 1); "> {{-- /* Sombra del formulario */ --}}
        @csrf
        @method('PUT')
        <div class="mb-4">
            <x-label>
                Nombre del permiso
            </x-label>
            <x-input 
            name="name"
            class="w-full" 
            placeholder="Escriba el nombre del permiso" value="{{$permission->name}}" required />
        </div>
        <div class="flex justify-end">
            
            <x-danger-button class="mr-2" onclick="deletePermission()">
                Eliminar
            </x-danger-button>

            <x-button>
                Actualizar
            </x-button>
        </div>
    </form>

    {{-- form de delete --}}
    <form action="{{route('permissions.destroy', $permission)}}" 
    method="POST" id="formDelete">
        @csrf
        @method('DELETE')
    </form>

    @push('js')
        <script>
            function deletePermission(){
                form = document.getElementById('formDelete');
                form.submit();
            }
        </script>
    @endpush
</x-app-layout>