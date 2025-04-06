<x-app-layout>
    <form action="{{ route('users.store') }}" method="POST" class="bg-white rounded-lg p-6"
        style="box-shadow: 0 4px 6px rgba(0, 0, 0, 1); "> {{-- /* Sombra del formulario */ --}}
        @csrf
        <div class="mb-4">
            <x-label>
                Nombre
            </x-label>
            <x-input name="name" class="w-full" placeholder="Nombre completo" required />
        </div>
        <div class="mb-4">
            <x-label>
                Correo
            </x-label>
            <x-input name="email" class="w-full" placeholder="Correo" required />
        </div>

        <div class="mb-4">
            <x-label>
                Bodega
            </x-label>
            <x-select class="w-full" name="bodega">
                @foreach ($bodegas as $bodega)
                    <option value={{ $bodega->name }}>{{ $bodega->name }}</option>
                @endforeach

            </x-select>
        </div>

        <div class="mb-4">
            <x-label>
                Perfil
            </x-label>
            <x-select class="w-full" name="perfil">
                <option value=""></option>
                <option value="aux_farmacia">Aux_farmacia</option>
                <option value="regente">Regente</option>
                <option value="quimico">Quimico</option>
                <option value="huv">huv</option>
                <option value="calidad">calidad</option>
                <option value="admin">admin</option>
                <option value="Externo">Externo</option>
            </x-select>
        </div>

        <div class="mb-4">
            <x-label>
                Password
            </x-label>
            <x-input name="password" type="password" class="w-full" placeholder="Password" required />
        </div>
        <div class="flex justify-end">
            <x-button>
                Crear
            </x-button>
        </div>
    </form>
</x-app-layout>