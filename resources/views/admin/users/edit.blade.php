<x-app-layout>
    <form action="{{route('users.update',$user)}}" method="POST"
    class="bg-white rounded-lg p-6" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 1); ">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <x-label>
                Nombre
            </x-label>
            <x-input 
            name="name"
            class="w-full" 
            placeholder="Escriba el nombre de la bodega" value="{{ old('name', $user->name) }}" required />
        </div>
        
        <div class="mb-4">
            <x-label>
                Email
            </x-label>
            <x-input 
            name="email"
            class="w-full" 
            placeholder="Escriba el email" value="{{ old('email', $user->email) }}" required />
        </div>


        {{-- <div class="mb-4">
            <x-label>
                Perfil
            </x-label>
            <x-select class="w-full" name="perfil">
                <option value=""></option>
                <option value="aux_farmacia" {{ old('perfil', $user->perfil) == 'aux_farmacia' ? 'selected' : '' }}>
                    Aux_farmacia
                </option>
                <option value="regente" {{ old('perfil', $user->perfil) == 'regente' ? 'selected' : '' }}>
                    Regente
                </option>
                <option value="quimico" {{ old('perfil', $user->perfil) == 'quimico' ? 'selected' : '' }}>
                    Quimico
                </option>
                <option value="huv" {{ old('perfil', $user->perfil) == 'huv' ? 'selected' : '' }}>
                    huv
                </option>
                <option value="calidad" {{ old('perfil', $user->perfil) == 'calidad' ? 'selected' : '' }}>
                    calidad
                </option>
                <option value="admin" {{ old('perfil', $user->perfil) == 'admin' ? 'selected' : '' }}>
                    admin
                </option>
            </x-select>
        </div> --}}
        
        
        <div class="mb-4">
            <x-label>
                Password
            </x-label>
            <x-input 
            name="password"
            type="password"
            class="w-full" 
            placeholder="Escriba password" />
        </div>
       
        <div class="mb-4">
            <ul>
                @foreach ($roles as $role)
                    <li>
                        <label>
                            <x-checkbox
                            name="roles[]"
                            value="{{$role->id}}"
                            :checked="in_array($role->id, old('roles', $user->roles->pluck('id')->toArray()))"
                            />
                            {{$role->name}}
                        </label>
                    </li>
                @endforeach
            </ul>
        </div>
       
        <div class="flex justify-end">
            <x-danger-button class="mr-2" onclick="deleteCategory()">
                Eliminar
            </x-danger-button>

            <x-button>
                Actualizar
            </x-button>
        </div>
    </form>

    <form action="{{route('users.destroy', $user)}}" method="POST" id="formDelete">
        @csrf
        @method('DELETE')
    </form>

    @push('js')
        <script>
            function deleteCategory(){
                form = document.getElementById('formDelete');
                form.submit();
            }
        </script>
    @endpush
</x-app-layout>