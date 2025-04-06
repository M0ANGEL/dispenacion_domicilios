<x-app-layout>

    @if (session('swal'))
        <script>
            Swal.fire({
                icon: '{{ session('swal.icon') }}',
                title: '{{ session('swal.title') }}',
                text: '{{ session('swal.text') }}',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Aceptar'
            });
        </script>
    @endif

    <form action="{{ route('pacientes.update', $paciente) }}" method="POST" class="bg-white rounded-lg p-6"
        style="box-shadow: 0 4px 6px rgba(0, 0, 0, 1); "> {{-- /* Sombra del formulario */ --}}
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            <div>
                <label>Numero Documento</label>
                <input type="text" name="documento" placeholder="Numero Documento"
                    class="border p-2 rounded w-full" value="{{ $paciente->documento }}" >
            </div>
            <div>
                <label>Tipo Documento</label>
                <x-select class="w-full" name="tipo_doc">
                    <option value="">Seleccione Tipo Documento</option>
                    <option value="CC" @selected($paciente->tipo_doc == 'CC')>CC</option>
                    <option value="TI" @selected($paciente->tipo_doc == 'TI')>TI</option>
                </x-select>
            </div>
           
        </div>
       
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div>
                <label>Primer Nobre</label>
                <input type="text" placeholder="Miguel" value="{{ $paciente->nombre1 }}"  name="nombre1"
                    class="border p-2 rounded w-full">
            </div>
            <div>
                <label>Segundo Nombre</label>
                <input type="text" placeholder="Angel " name="nombre2"
                    class="border p-2 rounded w-full" value="{{ $paciente->nombre2 }}" >
            </div>
            <div>
                <label>Primer Apellido</label>
                <input type="text" placeholder="Miguel" name="apellido1"
                    class="border p-2 rounded w-full" value="{{ $paciente->apellido1 }}" >
            </div>
            <div>
                <label>Segundo Apellido</label>
                <input type="text" placeholder="Angel " name="apellido2"
                    class="border p-2 rounded w-full" value="{{ $paciente->apellido2 }}" >
            </div>
          
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label>Numero Telefono</label>
                <input type="text" name="telfono" 
                    class="border p-2 rounded w-full" value="{{ $paciente->telfono }}" >
            </div>

            <div>
                <label>Direccion</label>
                <input type="text" name="direcciones"
                    class="border p-2 rounded w-full" value="{{ $paciente->direcciones }}" >
            </div>
          
        </div>

        <div>
            <label>Observacion</label>
            <textarea type="text" name="observacion"
                class="border p-2 rounded w-full">{{ $paciente->observacion }} </textarea>
        </div>

        <div class="flex justify-end">
            <x-button>
                Actualizar
            </x-button>
        </div>
    </form>
</x-app-layout>
