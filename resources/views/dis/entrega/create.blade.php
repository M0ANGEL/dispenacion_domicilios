<x-app-layout>
    <div class="container mx-auto p-4">
        <div class="bg-white  shadow rounded-lg p-6">
            <h1 class="text-xl font-semibold mb-4 text-gray-900 ">CREAR MIPRES</h1>
            <p class="text-gray-600  mb-6">Datos del paciente</p>
            <form action="{{ route('EntregaMedicamentos.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <div>
                        <label for="">Nombre Completo</label>
                        <input type="text" readonly value="{{ $paciente->name }}" class="border p-2 rounded w-full">
                    </div>
                    <input type="text" name="mipres_paciente_id" hidden value="{{ $paciente->id }}">
                    <div>
                        <label>Tipo Documento</label>
                        <input type="text" readonly value="{{ $paciente->tipoDocumento }}"
                            class="border p-2 rounded w-full">
                    </div>
                    <div>
                        <label>Numero Documento</label>
                        <input type="text" readonly value="{{ $paciente->documento }}"
                            class="border p-2 rounded w-full">
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label>Nro. Prescripcion</label>
                        <input type="text" name="prescripcion" required placeholder="Nro. Prescripcion"
                            class="border p-2 rounded w-full">
                    </div>
                    <div>
                        <label>Ambito</label>
                        <x-select class="w-full" name="ambito">
                            <option value="">Seleccione un ambito</option>
                            <option value="Ambulatorio - no priorizado">Ambulatorio - no priorizado</option>
                            <option value="Ambulatorio - priorizado">Ambulatorio - priorizado</option>
                            <option value="Hospitalario - domiciliario ">Hospitalario - domiciliario</option>
                            <option value="Hospitalario - internacion">Hospitalario - internacion</option>
                            <option value="Urgencias">Urgencias</option>
                        </x-select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <div>
                        <label>Fecha Mipres</label>
                        <input type="date" name="fecha_mipres" class="border p-2 rounded w-full" required>
                    </div>
                    <div>
                        <label>Medicamento</label>
                        <select class="border p-2 rounded w-full" name="medicamento_id">
                            <option value="">Seleccione un medicamento</option>
                            @foreach ($medicamentos as $medicamento)
                                <option value="{{ $medicamento->id }}">{{ $medicamento->descripcion }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label>Canitdad medicamento</label>
                        <input type="text" required placeholder="Cantidad medicamento" name="cantidad_entregada"
                            class="border p-2 rounded w-full" pattern="[0-9]*" inputmode="numeric"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '')">

                    </div>
                </div>

                <div class="flex justify-end">
                    <x-button type="submit" style="background: rgb(0, 128, 38);">
                        <b>Registrar Entrega</b>
                    </x-button>
                </div>
            </form>
        </div>
    </div>

    <!-- Initialize Select2 -->
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "Seleccione un medicamento",
                allowClear: true
            });
        });
    </script>
</x-app-layout>
