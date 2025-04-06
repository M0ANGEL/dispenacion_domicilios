<x-app-layout>
    <div class="container mx-auto p-4">
        <div class="bg-white  shadow rounded-lg p-6">
            <h1 class="text-xl font-semibold mb-4 text-gray-900 ">CREAR SOLICITUD</h1>
            <p class="text-gray-600  mb-6">Datos del paciente</p>
            <form action="{{ route('solicitud.store') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label>Numero Documento</label>
                        <input type="text" name="documento" id="documento" placeholder="Numero Documento"
                            class="border p-2 rounded w-full">
                    </div>
                    <div>
                        <label>Tipo Documento</label>
                        <input type="text" name="tipo_doc" id="tipo_doc" readonly
                            class="border p-2 rounded w-full">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <div>
                        <label>Primer Nombre</label>
                        <input type="text" name="nombre1" id="nombre1" class="border p-2 rounded w-full" readonly>
                    </div>
                    <div>
                        <label>Segundo Nombre</label>
                        <input type="text" name="nombre2" id="nombre2" class="border p-2 rounded w-full" readonly>
                    </div>
                    <div>
                        <label>Primer Apellido</label>
                        <input type="text" name="apellido1" id="apellido1" class="border p-2 rounded w-full"
                            readonly>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                    <div>
                        <label>Segundo Apellido</label>
                        <input type="text" name="apellido2" id="apellido2" class="border p-2 rounded w-full"
                            readonly>
                    </div>
                    <div>
                        <label>Numero Telefono</label>
                        <input type="text" name="telfono" id="telfono" class="border p-2 rounded w-full" readonly>
                    </div>
                    <div>
                        <label>Direccion</label>
                        <input type="text" name="direcciones" id="direcciones" class="border p-2 rounded w-full" readonly>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">

                    <div>
                        <label>Observacion de paciente</label>
                        <textarea name="observacion" id="observacion" class="border p-2 rounded w-full" readonly></textarea>
                    </div>
                    <div>
                        <label>Observacion de solicitud</label>
                        <textarea name="observacion_solicitud" class="border p-2 rounded w-full"></textarea>
                    </div>
                </div>

                {{-- id de paciente --}}
                <input type="text" name="paciente_id" id="paciente_id" hidden readonly>




                <div class="flex justify-end">
                    <x-button type="submit" style="background: rgb(0, 128, 38);">
                        <b>Crear Solicitud</b>
                    </x-button>
                </div>
            </form>
        </div>
    </div>


    <script>
        // document.getElementById('documento').addEventListener('keydown', function(event) {
        //     if (event.key === 'Enter') {
        //         event.preventDefault();
        //         let cedula = this.value;

        //         fetch(`/paciente/${cedula}`)
        //             .then(response => response.json())
        //             .then(data => {
        //                 if (data.success) {
        //                     const p = data.paciente;
        //                     document.getElementById('paciente_id').value = p.id ?? '';
        //                     document.getElementById('nombre1').value = p.nombre1 ?? '';
        //                     document.getElementById('nombre2').value = p.nombre2 ?? '';
        //                     document.getElementById('apellido1').value = p.apellido1 ?? '';
        //                     document.getElementById('apellido2').value = p.apellido2 ?? '';
        //                     document.getElementById('telfono').value = p.telfono ?? '';
        //                     document.getElementById('tipo_doc').value = p.tipo_doc ?? '';
        //                     document.getElementById('direcciones').value = p.direcciones ?? '';
        //                     document.getElementById('observacion').value = p.observacion ?? '';
        //                 } else {
        //                     alert('Paciente no encontrado');
        //                 }
        //             });
        //     }
        // });

        document.getElementById('documento').addEventListener('keydown', function(event) {
    if (event.key === 'Enter') {
        event.preventDefault();
        let cedula = this.value;

        fetch(`/paciente/${cedula}`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const p = data.paciente;
                    document.getElementById('paciente_id').value = p.id ?? '';
                    document.getElementById('nombre1').value = p.nombre1 ?? '';
                    document.getElementById('nombre2').value = p.nombre2 ?? '';
                    document.getElementById('apellido1').value = p.apellido1 ?? '';
                    document.getElementById('apellido2').value = p.apellido2 ?? '';
                    document.getElementById('telfono').value = p.telfono ?? '';
                    document.getElementById('tipo_doc').value = p.tipo_doc ?? '';
                    document.getElementById('direcciones').value = p.direcciones ?? '';
                    document.getElementById('observacion').value = p.observacion ?? '';
                } else {
                    Swal.fire({
                        title: 'Paciente no encontrado',
                        text: "¿Deseas crear un nuevo paciente?",
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Sí, crear',
                        cancelButtonText: 'No'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "{{ route('pacientes.create') }}";
                        }
                    });
                }
            });
    }
});

    </script>



</x-app-layout>
