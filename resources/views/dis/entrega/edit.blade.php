<x-app-layout>
    <div class="container mx-auto p-4">
        <div class="bg-white  shadow rounded-lg p-6">
            <h1 class="text-xl font-semibold mb-4 text-gray-900 ">DISPENSAR SOLICITUD</h1>
            <p class="text-gray-600  mb-6">Datos del paciente</p>
            <form action="{{ route('dispensacion.update', $dispensacion->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label>Numero Documento</label>
                        <input type="text" value="{{ $dispensacion->paciente->documento ?? '' }}"
                            class="border p-2 rounded w-full" readonly>
                    </div>
                    <div>
                        <label>Tipo Documento</label>
                        <input type="text" name="tipo_doc" value="{{ $dispensacion->paciente->tipo_doc ?? '' }}" readonly
                            class="border p-2 rounded w-full">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <div>
                        <label>Primer Nombre</label>
                        <input type="text" name="nombre1" value="{{ $dispensacion->paciente->nombre1 ?? '' }}" class="border p-2 rounded w-full" readonly>
                    </div>
                    <div>
                        <label>Segundo Nombre</label>
                        <input type="text" name="nombre2" value="{{ $dispensacion->paciente->nombre2 ?? '' }}" class="border p-2 rounded w-full" readonly>
                    </div>
                    <div>
                        <label>Primer Apellido</label>
                        <input type="text" name="apellido1" value="{{ $dispensacion->paciente->apellido1 ?? '' }}" class="border p-2 rounded w-full"
                            readonly>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                    <div>
                        <label>Segundo Apellido</label>
                        <input type="text" name="apellido2" value="{{ $dispensacion->paciente->apellido2 ?? '' }}" class="border p-2 rounded w-full"
                            readonly>
                    </div>
                    <div>
                        <label>Numero Telefono</label>
                        <input type="text" name="telfono" value="{{ $dispensacion->paciente->telfono ?? '' }}" class="border p-2 rounded w-full" readonly>
                    </div>
                    <div>
                        <label>Direccion</label>
                        <input type="text" name="direcciones" value="{{ $dispensacion->paciente->direcciones ?? '' }}" class="border p-2 rounded w-full" readonly>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">

                    <div>
                        <label>Observacion de paciente</label>
                        <textarea name="observacion"  class="border p-2 rounded w-full" readonly>
                            {{ $dispensacion->paciente->observacion ?? '' }}
                        </textarea>
                    </div>
                    <div>
                        <label>Observacion de solicitud</label>
                        <textarea name="observacion_solicitud" class="border p-2 rounded w-full" readonly>
                            {{ $dispensacion->observacion_solicitud ?? '' }}
                        </textarea>
                    </div>
                </div>
          

                {{-- id de paciente --}}
                {{-- <input type="text" name="paciente_id" id="paciente_id" hidden readonly> --}}

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <div>
                        <label>Cantidad</label>
                        <input type="text" name="cantida_formula" class="border p-2 rounded w-full" pattern="[0-9]*"
                            inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                    </div>
                    <div>
                        <label>Tipo Producto </label>
                        <x-select class="w-full" name="producto">
                            <option value="">Seleccione Tipo Producto</option>
                            <option value="Pañal">Pañal</option>
                            <option value="Seco">Seco</option>
                            <option value="Frio">Frio</option>
                        </x-select>
                    </div>
                    <div>
                        <label>Copago</label>
                        <input type="text" name="valor" class="border p-2 rounded w-full" pattern="[0-9]*"
                            inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                    </div>
                </div>

                <div>
                    <label>Observacion de dispensacion</label>
                    <textarea name="observacion_dispensacion" class="border p-2 rounded w-full">
                    </textarea>
                </div>



                <div class="flex justify-end">
                    <x-button type="submit" style="background: rgb(0, 128, 38);">
                        <b>Crear Solicitud</b>
                    </x-button>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
