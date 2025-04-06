<x-app-layout>
    <div class="container mx-auto p-4">
        <div class="bg-white  shadow rounded-lg p-6">
            <h1 class="text-xl font-semibold mb-4 text-gray-900 ">CONFIRMACION DE ENTREGA DE DOMICILIO</h1>
            <p class="text-gray-600  mb-6">Datos del paciente</p>
            <form action="{{ route('confirmacion.update', $confirmacion->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                    <div>
                        <label>Numero Documento</label>
                        <input type="text" value="{{ $confirmacion->paciente->documento ?? '' }}"
                            class="border p-2 rounded w-full" readonly>
                    </div>
                    <div>
                        <label>Numero Telefono</label>
                        <input type="text" name="telfono" value="{{ $confirmacion->paciente->telfono ?? '' }}" class="border p-2 rounded w-full" readonly>
                    </div>
                    <div>
                        <label>Direccion</label>
                        <input type="text" name="direcciones" value="{{ $confirmacion->paciente->direcciones ?? '' }}" class="border p-2 rounded w-full" readonly>
                    </div>
                    {{-- <div>
                        <label>Tipo Documento</label>
                        <input type="text" name="tipo_doc" value="{{ $confirmacion->paciente->tipo_doc ?? '' }}" readonly
                            class="border p-2 rounded w-full">
                    </div> --}}
                </div>

                <div class="flex flex-wrap gap-4 mb-6">
                    <div class="flex-1">
                        <label>Primer Nombre</label>
                        <input type="text" name="nombre1" value="{{ $confirmacion->paciente->nombre1 ?? '' }}" class="border p-2 rounded w-full" readonly>
                    </div>
                    <div class="flex-1">
                        <label>Segundo Nombre</label>
                        <input type="text" name="nombre2" value="{{ $confirmacion->paciente->nombre2 ?? '' }}" class="border p-2 rounded w-full" readonly>
                    </div>
                    <div class="flex-1">
                        <label>Primer Apellido</label>
                        <input type="text" name="apellido1" value="{{ $confirmacion->paciente->apellido1 ?? '' }}" class="border p-2 rounded w-full"
                            readonly>
                    </div>
                    <div class="flex-1">
                        <label>Segundo Apellido</label>
                        <input type="text" name="apellido2" value="{{ $confirmacion->paciente->apellido2 ?? '' }}" class="border p-2 rounded w-full"
                            readonly>
                    </div>
                </div>

                {{-- <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                    
                    <div>
                        <label>Numero Telefono</label>
                        <input type="text" name="telfono" value="{{ $confirmacion->paciente->telfono ?? '' }}" class="border p-2 rounded w-full" readonly>
                    </div>
                    <div>
                        <label>Direccion</label>
                        <input type="text" name="direcciones" value="{{ $confirmacion->paciente->direcciones ?? '' }}" class="border p-2 rounded w-full" readonly>
                    </div>
                </div> --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">

                    <div>
                        <label>Observacion de paciente</label>
                        <textarea name="observacion"  class="border p-2 rounded w-full" readonly>
                            {{ $confirmacion->paciente->observacion ?? '' }}
                        </textarea>
                    </div>
                    <div>
                        <label>Observacion de solicitud</label>
                        <textarea name="observacion_solicitud" class="border p-2 rounded w-full" readonly>
                            {{ $confirmacion->observacion_solicitud ?? '' }}
                        </textarea>
                    </div>
                </div>
          

                {{-- id de paciente --}}
                {{-- <input type="text" name="paciente_id" id="paciente_id" hidden readonly> --}}

                <div class="flex flex-wrap gap-4 mb-6">
                    <div class="flex-1">
                        <label>Cantidad</label>
                        <input type="text" name="cantida_formula" class="border p-2 rounded w-full"
                        value="{{ $confirmacion->cantida_formula ?? '' }}" readonly>
                    </div>
                    <div class="flex-1">
                        <label>Tipo Producto</label>
                        <input type="text" name="producto" class="border p-2 rounded w-full"
                        value="{{ $confirmacion->producto ?? '' }}" readonly>
                    </div>
                    
                    <div class="flex-1">
                        <label>Copago</label>
                        <input type="text" name="valor" class="border p-2 rounded w-full" readonly
                        value="{{ $confirmacion->valor ?? '' }}">
                    </div>
                    <div class="flex-1" >
                        <label  style="color: rgb(255, 57, 57);" ><b>Fecha y Hora</b></label>
                        <input type="datetime-local" name="fecha_donfirmacion_entrega" class="border p-2 rounded w-full" required>
                    </div>
                </div>


                    <div >
                        <label >Observación de Confirmación de Domicilio</label>
                        <textarea name="observacion_entrega_domicilio" class="border p-2 rounded w-full" rows="4"></textarea>
                    </div>
                    
                



                <div class="flex justify-end">
                    <x-button type="submit" style="background: rgb(0, 128, 38);">
                        <b>Confirmar Entrega Domcilio</b>
                    </x-button>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
