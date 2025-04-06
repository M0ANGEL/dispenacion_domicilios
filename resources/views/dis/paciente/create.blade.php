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

    <div class="container mx-auto p-4">
        <div class="bg-white  shadow rounded-lg p-6">
            <h1 class="text-xl font-semibold mb-4 text-gray-900 text-center">CREAR PACIENTE </h1>
            <p class="text-gray-600  mb-6">Datos del paciente</p>
            <form action="{{ route('pacientes.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    <div>
                        <label>Numero Documento</label>
                        <input type="text" name="documento" placeholder="Numero Documento"
                            class="border p-2 rounded w-full">
                    </div>

                    <div>
                        <label>Tipo Documento</label>
                        <x-select class="w-full" name="tipo_doc">
                            <option value="">Seleccione Tipo Documento</option>
                            <option value="CC">CC</option>
                            <option value="TI">TI</option>
                        </x-select>
                    </div>

                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <div>
                        <label>Primer Nobre</label>
                        <input type="text" placeholder="Miguel" name="nombre1" class="border p-2 rounded w-full">
                    </div>
                    <div>
                        <label>Segundo Nombre</label>
                        <input type="text" placeholder="Angel " name="nombre2" class="border p-2 rounded w-full">
                    </div>
                    <div>
                        <label>Primer Apellido</label>
                        <input type="text" placeholder="Miguel" name="apellido1" class="border p-2 rounded w-full">
                    </div>
                    <div>
                        <label>Segundo Apellido</label>
                        <input type="text" placeholder="Angel " name="apellido2" class="border p-2 rounded w-full">
                    </div>

                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label>Numero Telefono</label>
                        <input type="text" name="telfono" class="border p-2 rounded w-full">
                    </div>
                    <div>
                        <label>Numero Direccion</label>
                        <input type="text" name="direcciones" class="border p-2 rounded w-full">
                    </div>

                </div>

                <div>
                    <label>Observacion</label>
                    <textarea type="text" name="observacion" class="border p-2 rounded w-full"></textarea>
                </div>

                <div class="flex justify-end">
                    <x-button type="submit" style="background: rgb(0, 128, 38);">
                        <b>Crear Paciente</b>
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
