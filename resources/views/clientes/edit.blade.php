<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Editar cliente
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h3 class="text-lg font-semibold mb-6">
                        Datos del cliente:
                        {{ $cliente->nombre }} {{ $cliente->apellido }}
                    </h3>

                    {{-- Errores de validación --}}
                    @if ($errors->any())
                        <div class="mb-6 p-4 bg-red-100 text-red-800 rounded-md">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST"
                          action="{{ route('clientes.update', $cliente->id_cliente) }}">

                        @csrf
                        @method('PUT')

                        {{-- Nombre y apellido --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">

                            <div>
                                <label for="nombre" class="block text-sm font-medium mb-1">
                                    Nombre
                                </label>

                                <input
                                    type="text"
                                    id="nombre"
                                    name="nombre"
                                    value="{{ old('nombre', $cliente->nombre) }}"
                                    required
                                    class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('nombre') border-red-500 @enderror"
                                >
                            </div>

                            <div>
                                <label for="apellido" class="block text-sm font-medium mb-1">
                                    Apellido
                                </label>

                                <input
                                    type="text"
                                    id="apellido"
                                    name="apellido"
                                    value="{{ old('apellido', $cliente->apellido) }}"
                                    required
                                    class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('apellido') border-red-500 @enderror"
                                >
                            </div>

                        </div>

                        {{-- Documento y fecha de nacimiento --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">

                            <div>
                                <label for="documento" class="block text-sm font-medium mb-1">
                                    Documento
                                </label>

                                <input
                                    type="text"
                                    id="documento"
                                    name="documento"
                                    value="{{ old('documento', $cliente->documento) }}"
                                    required
                                    class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('documento') border-red-500 @enderror"
                                >
                            </div>

                            <div>
                                <label for="fecha_nacimiento" class="block text-sm font-medium mb-1">
                                    Fecha de nacimiento
                                </label>

                                <input
                                    type="date"
                                    id="fecha_nacimiento"
                                    name="fecha_nacimiento"
                                    value="{{ old('fecha_nacimiento', $cliente->fecha_nacimiento) }}"
                                    class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('fecha_nacimiento') border-red-500 @enderror"
                                >
                            </div>

                        </div>

                        {{-- Correo electrónico --}}
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium mb-1">
                                Correo electrónico
                            </label>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email', $cliente->email) }}"
                                required
                                class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('email') border-red-500 @enderror"
                            >
                        </div>

                        {{-- Dirección y ciudad --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">

                            <div>
                                <label for="direccion" class="block text-sm font-medium mb-1">
                                    Dirección
                                </label>

                                <input
                                    type="text"
                                    id="direccion"
                                    name="direccion"
                                    value="{{ old('direccion', $cliente->direccion) }}"
                                    class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                >
                            </div>

                            <div>
                                <label for="ciudad" class="block text-sm font-medium mb-1">
                                    Ciudad
                                </label>

                                <input
                                    type="text"
                                    id="ciudad"
                                    name="ciudad"
                                    value="{{ old('ciudad', $cliente->ciudad) }}"
                                    class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                >
                            </div>

                        </div>

                        {{-- Teléfono y empresa --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">

                            <div>
                                <label for="telefono" class="block text-sm font-medium mb-1">
                                    Teléfono
                                </label>

                                <input
                                    type="text"
                                    id="telefono"
                                    name="telefono"
                                    value="{{ old('telefono', $cliente->telefono) }}"
                                    class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                >
                            </div>

                            <div>
                                <label for="id_empresa" class="block text-sm font-medium mb-1">
                                    Empresa
                                </label>

                                <select
                                    id="id_empresa"
                                    name="id_empresa"
                                    required
                                    class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('id_empresa') border-red-500 @enderror"
                                >
                                    <option value="">Seleccione una empresa</option>

                                    @foreach ($empresas as $empresa)
                                        <option
                                            value="{{ $empresa->id_empresa }}"
                                            {{ old('id_empresa', $cliente->id_empresa) == $empresa->id_empresa ? 'selected' : '' }}
                                        >
                                            {{ $empresa->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        {{-- Botones --}}
                        <div class="flex justify-end gap-3">

                            <a href="{{ route('clientes.index') }}"
                               class="inline-flex items-center px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white text-sm font-medium rounded-md">
                                Cancelar
                            </a>

                            <button
                                type="submit"
                                class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-md">
                                Actualizar cliente
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>
 