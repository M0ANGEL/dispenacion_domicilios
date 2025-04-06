<x-app-layout>

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "{{ session('error') }}",
                confirmButtonText: 'Entendido'
            });
        </script>
    @endif


    <div class="container mx-auto p-4">
        <div class="bg-white  shadow rounded-lg p-6">
            <h1 class="text-xl font-semibold mb-4  ">CREAR MIPRES</h1>
            <p class="text-gray-600  mb-6">Datos del paciente</p>
            <form action="{{ route('Mipres_Activos.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <div>
                        <label for="">Nombre Completo</label>
                        <input type="text" readonly value="{{ $paciente->paciente->name }}"
                            class="border p-2 rounded w-full">
                    </div>
                    <div>
                        <label>Tipo Documento</label>
                        <input type="text" value="{{ $paciente->paciente->tipoDocumento }}" readonly
                            class="border p-2 rounded w-full">
                    </div>
                    <div>
                        <label>Numero Documento</label>
                        <input type="text" readonly class="border p-2 rounded w-full"
                            value="{{ $paciente->paciente->documento }}">
                    </div>
                </div>
                {{-- id --}}
                <input type="text" name="entrega__id" value="{{ $paciente->id }}" hidden>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                    <div>
                        <label>Nro. Prescripción</label>
                        <input type="text" name="pres" readonly class="border p-2 rounded w-full"
                            value="{{ $paciente->prescripcion }}">
                    </div>
                    <div>
                        <label>Ambito</label>
                        <input type="text" class="border p-2 rounded w-full" readonly
                            value="{{ $paciente->ambito }}">
                    </div>
                    <div>
                        <label>Fecha Mipres</label>
                        <input type="date" class="border p-2 rounded w-full" readonly
                            value="{{ $paciente->fecha_mipres }}">
                    </div>
                </div>

                <div class="flex flex-wrap gap-4 mb-6">
                    <div class="flex-1">
                        <label>Medicamento</label>
                        <input type="text" class="border p-2 rounded w-full" readonly
                            value="{{ $paciente->medicamento->descripcion }}">
                    </div>
                    <div class="flex-1">
                        <label style="color: green">Cantidad Total</label>
                        <input type="text" class="border p-2 rounded w-full" readonly name="cantidad_entregada"
                            value="{{ $paciente->cantidad_entregada }}">
                    </div>
                    <div class="flex-1">
                        <label style="color: red;">Cantidad Saldo</label>
                        <input type="text" class="border p-2 rounded w-full" readonly name="cantidad_restante"
                            value="{{ $paciente->cantidad_restante }}">
                    </div>
                    <div class="flex-1">
                        <label>Cantidad a Entregar</label>
                        <input type="text" name="cantidad_entrego" class="border p-2 rounded w-full" pattern="[0-9]*"
                            inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                    </div>
                </div>

                <div class="flex justify-end">
                    <x-button id="defaultModalButton" data-modal-target="defaultModal" data-modal-toggle="defaultModal"
                        style="background: rgb(180, 22, 7); margin-right: 10px;"
                        class="block text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                        type="button">
                        <b>Finalizar Mipres manualmente</b>
                    </x-button>

                    <x-button type="submit" style="background: rgb(0, 128, 38);">
                        <b>Registrar Entrega</b>
                    </x-button>
                </div>
            </form>
        </div>
    </div>

    <!-- Main modal -->
    <div id="defaultModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden bg fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative p-4  rounded-lg shadow  sm:p-5" style="background: rgb(2, 42, 106);">
                <!-- Modal header -->
                <div
                    class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                    <h3 class="text-lg font-semibold  text-white">
                        TERMINACION DEL MIPRES ACTIVO
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover: rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="defaultModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form action="{{ route('cancelacion_mipres.cancelacion') }}" method="POS">
                    @csrf
                    @method('PUT')
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium  text-white">Usario</label>
                            <input type="text" name="usuario_cancela" id="name"
                                class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 text-gray dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ Auth::user()->name }}">
                        </div>
                        <div class="sm:col-span-2">
                            <label for="description"
                                class="block mb-2 text-sm font-medium  text-white">Description</label>
                            <x-textarea id="description" rows="4" name="cancelado"
                                class="block p-2.5 w-full text-sm  bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500  dark:border-gray-600 dark:placeholder-gray-400 text-gray dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Write product description here"></x-textarea>
                        </div>

                        <input type="text" name="cancelado_estado" hidden value="1">
                        <input type="text" hidden name="id_entrega" value="{{ $Mipres_Activo }}">
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" style="background: rgb(180, 22, 7); margin-right: 10px;"
                            class="text-white inline-flex items-center  focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            CONFIRMAR CANCELACION
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
