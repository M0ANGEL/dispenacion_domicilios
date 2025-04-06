<x-app-layout>
    <div class="container mx-auto p-4">
        <div class="bg-white  shadow rounded-lg p-6">
            <h1 class="text-xl font-semibold mb-4 text-gray-900 ">CREAR MEDICAMENTO MIPRES</h1>
            <p class="text-gray-600  mb-6">Datos del medicamento</p>
            <form action="{{ route('medicamentos_mipres.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                    <div>
                        <label>Medicamento</label>
                        <input type="text" name="descripcion" required placeholder="ejemplo acetaminofen"
                            class="border p-2 rounded w-full">
                    </div>
                    <div>
                        <label>Codigo Sebthi</label>
                        <input type="text" name="codigo_sebthi" placeholder="ejemplo 10124A"
                            class="border p-2 rounded w-full">
                    </div>
                    <div>
                        <label>Codigo Servinte</label>
                        <input type="text" name="codigo_huv" placeholder="ejeplom 5241A"
                            class="border p-2 rounded w-full">
                    </div>
                </div>

                <div class="flex justify-end">
                    <x-button type="submit" style="background: rgb(0, 128, 38);">
                        <b>Registrar Medicamento</b>
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
