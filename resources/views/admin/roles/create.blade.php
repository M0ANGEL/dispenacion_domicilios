<x-app-layout>
    <div class="bg-white shadow rounded-lg p-6">
        <form action="{{route('roles.store')}}" method="POST"
        class="bg-white rounded-lg p-6" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 1); "> {{-- /* Sombra del formulario */ --}}
            @csrf
            
            <div class="mb-4">
                <x-label class="mb-1">
                    Nombre del rol
                </x-label>
                <x-input class="w-full" placeholder="nombre rol" name="name" required/>
            </div>
            <div class="flex justify-end">
                <x-button >
                    Creal rol
                </x-button>
            </div>
        </form>
    </div>
</x-app-layout>