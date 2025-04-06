<x-app-layout>
    <div class="container mx-auto p-6 bg-white rounded shadow">
        <h1 class="text-2xl font-bold mb-4 text-gray-700">Exportar Dispensaciones</h1>

        <form method="POST" action="{{ route('exportar.exportar') }}">
            @csrf
            <div class="mb-4">
                <label for="cantidad" class="block mb-2 text-sm font-medium text-gray-700">Cantidad de registros (máx. 50)</label>
                <input type="number" name="cantidad" id="cantidad" max="50" min="1" value="10"
                    class="border border-gray-300 rounded px-3 py-2 w-32" required>
            </div>

            <div class="flex gap-4">
                <button name="tipo" value="excel" class="bg-green-600  px-4 py-2 rounded hover:bg-green-700">
                    Generar Excel
                </button>
                <button name="tipo" value="txt" class="bg-blue-600  px-4 py-2 rounded hover:bg-blue-700">
                    Generar TXT
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
