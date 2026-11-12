
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Editar usuario
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h3 class="text-lg font-semibold mb-6">
                        Datos del usuario:
                        {{ $usuario->username }}
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
                          action="{{ route('usuarios.update', $usuario->id_usuario) }}">

                        @csrf
                        @method('PUT')

                        {{-- Nombre de usuario y rol --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">

                            <div>
                                <label for="username" class="block text-sm font-medium mb-1">
                                    Nombre de usuario
                                </label>

                                <input
                                    type="text"
                                    id="username"
                                    name="username"
                                    value="{{ old('username', $usuario->username) }}"
                                    required
                                    class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('username') border-red-500 @enderror"
                                >
                            </div>

                            <div>
                                <label for="rol" class="block text-sm font-medium mb-1">
                                    Rol
                                </label>

                                <select
                                    id="rol"
                                    name="rol"
                                    required
                                    class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('rol') border-red-500 @enderror"
                                >
                                    <option value="">Seleccione un rol</option>

                                    <option value="admin" {{ old('rol', $usuario->rol) == 'admin' ? 'selected' : '' }}>
                                        Administrador
                                    </option>

                                    <option value="usuario" {{ old('rol', $usuario->rol) == 'usuario' ? 'selected' : '' }}>
                                        Usuario
                                    </option>

                                </select>
                            </div>

                        </div>

                        {{-- Estado y fecha de creación --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">

                            <div>
                                <label for="activo" class="block text-sm font-medium mb-1">
                                    Estado
                                </label>

                                <select
                                    id="activo"
                                    name="activo"
                                    required
                                    class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('activo') border-red-500 @enderror"
                                >
                                    <option value="1" {{ old('activo', $usuario->activo) == '1' ? 'selected' : '' }}>
                                        Activo
                                    </option>

                                    <option value="0" {{ old('activo', $usuario->activo) == '0' ? 'selected' : '' }}>
                                        Inactivo
                                    </option>

                                </select>
                            </div>

                            <div>
                                <label for="fecha_creacion" class="block text-sm font-medium mb-1">
                                    Fecha de creación
                                </label>

                                <input
                                    type="text"
                                    id="fecha_creacion"
                                    value="{{ $usuario->fecha_creacion }}"
                                    readonly
                                    class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm"
                                >
                            </div>

                        </div>

                        {{-- Empresa --}}
                        <div class="mb-6">

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
                                        {{ old('id_empresa', $usuario->id_empresa) == $empresa->id_empresa ? 'selected' : '' }}
                                    >
                                        {{ $empresa->nombre }}
                                    </option>
                                @endforeach

                            </select>

                        </div>

                        {{-- Botones --}}
                        <div class="flex justify-end gap-3">

                            <a href="{{ route('usuarios.index') }}"
                               class="inline-flex items-center px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white text-sm font-medium rounded-md">
                                Cancelar
                            </a>

                            <button
                                type="submit"
                                class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-md">
                                Actualizar usuario
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>
