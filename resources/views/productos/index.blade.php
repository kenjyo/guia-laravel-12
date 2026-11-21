
<x-app-layout>

    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8"
         x-data="{
            modalCrear: false,
            modalEditar: false,
            modalEliminar: false,

            producto: {
                id: '',
                nombre: '',
                precio: '',
                stock: ''
            },

            editarProducto(id, nombre, precio, stock) {
                this.producto = { id, nombre, precio, stock };
                this.modalEditar = true;
            },

            eliminarProducto(id, nombre) {
                this.producto.id = id;
                this.producto.nombre = nombre;
                this.modalEliminar = true;
            }
         }">

        <div class="overflow-hidden rounded-xl bg-white p-6 shadow-sm ring-1 ring-slate-200">

            <!-- Mensajes -->
            @if (session('success'))
                <div class="mb-5 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-5 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Título y botón -->
            <div class="mb-6 flex flex-col justify-between gap-4 sm:flex-row sm:items-center">
                <div>
                    <h3 class="text-2xl font-bold text-slate-800">
                        Lista de productos
                    </h3>

                    <p class="mt-1 text-sm text-slate-500">
                        Administra los productos registrados.
                    </p>
                </div>

                <button type="button"
                        @click="modalCrear = true"
                        class="inline-flex items-center justify-center rounded-lg bg-green-600 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                    + Agregar producto
                </button>
            </div>

            <!-- Tabla -->
            <div class="overflow-x-auto rounded-lg border border-slate-200">

                <table class="w-full min-w-[750px] table-fixed divide-y divide-slate-200">

                    <thead class="bg-blue-50">
                        <tr>
                            <th class="w-[8%] px-4 py-3 text-center text-sm font-semibold text-blue-900">
                                ID
                            </th>

                            <th class="w-[32%] px-4 py-3 text-left text-sm font-semibold text-blue-900">
                                Nombre
                            </th>

                            <th class="w-[18%] px-4 py-3 text-center text-sm font-semibold text-blue-900">
                                Precio
                            </th>

                            <th class="w-[14%] px-4 py-3 text-center text-sm font-semibold text-blue-900">
                                Stock
                            </th>

                            <th class="w-[28%] px-4 py-3 text-center text-sm font-semibold text-blue-900">
                                Acciones
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-200 bg-white">

                        @forelse ($productos as $producto)
                            <tr class="transition hover:bg-slate-50">

                                <td class="px-4 py-4 text-center text-sm text-slate-600">
                                    {{ $producto->id }}
                                </td>

                                <td class="break-words px-4 py-4 text-sm font-medium text-slate-800">
                                    {{ $producto->nombre }}
                                </td>

                                <td class="px-4 py-4 text-center text-sm text-slate-600">
                                    S/ {{ number_format($producto->precio, 2) }}
                                </td>

                                <td class="px-4 py-4 text-center text-sm text-slate-600">
                                    {{ $producto->stock }}
                                </td>

                                <td class="px-4 py-4">
                                    <div class="flex items-center justify-center gap-2">

                                        <button type="button"
                                                @click="editarProducto(
                                                    {{ $producto->id }},
                                                    {{ Js::from($producto->nombre) }},
                                                    {{ Js::from($producto->precio) }},
                                                    {{ $producto->stock }}
                                                )"
                                                class="rounded-lg bg-blue-600 px-3 py-2 text-xs font-semibold text-white transition hover:bg-blue-700">
                                            Editar
                                        </button>

                                        <button type="button"
                                                @click="eliminarProducto(
                                                    {{ $producto->id }},
                                                    {{ Js::from($producto->nombre) }}
                                                )"
                                                class="rounded-lg bg-red-600 px-3 py-2 text-xs font-semibold text-white transition hover:bg-red-700">
                                            Eliminar
                                        </button>

                                    </div>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-8 text-center text-sm text-slate-500">
                                    No hay productos registrados.
                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        <!-- Modal: Registrar producto -->
        <div x-show="modalCrear"
             x-cloak
             @keydown.escape.window="modalCrear = false"
             @click.self="modalCrear = false"
             class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto bg-slate-900/60 px-4 py-6">

            <div x-show="modalCrear"
                 x-transition
                 class="w-full max-w-lg rounded-xl bg-white shadow-xl">

                <!-- Encabezado -->
                <div class="flex items-center justify-between border-b border-slate-200 px-6 py-4">
                    <h3 class="text-lg font-bold text-slate-800">
                        Registrar producto
                    </h3>

                    <button type="button"
                            @click="modalCrear = false"
                            class="rounded-lg p-1 text-slate-400 transition hover:bg-slate-100 hover:text-slate-700">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                <!-- Formulario -->
                <form action="{{ route('productos.store') }}" method="POST" class="p-6">
                    @csrf

                    <div class="mb-5">
                        <label for="crear_nombre" class="mb-2 block text-sm font-semibold text-slate-700">
                            Nombre
                        </label>

                        <input type="text"
                               id="crear_nombre"
                               name="nombre"
                               value="{{ old('nombre') }}"
                               placeholder="Nombre del producto"
                               required
                               class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm text-slate-800 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                        @if ($errors->has('nombre'))
                            <p class="mt-1 text-sm text-red-600">{{ $errors->first('nombre') }}</p>
                        @endif
                    </div>

                    <div class="mb-5">
                        <label for="crear_precio" class="mb-2 block text-sm font-semibold text-slate-700">
                            Precio
                        </label>

                        <input type="number"
                               id="crear_precio"
                               name="precio"
                               value="{{ old('precio') }}"
                               step="0.01"
                               min="0"
                               placeholder="Precio del producto"
                               required
                               class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm text-slate-800 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                        @if ($errors->has('precio'))
                            <p class="mt-1 text-sm text-red-600">{{ $errors->first('precio') }}</p>
                        @endif
                    </div>

                    <div class="mb-6">
                        <label for="crear_stock" class="mb-2 block text-sm font-semibold text-slate-700">
                            Stock
                        </label>

                        <input type="number"
                               id="crear_stock"
                               name="stock"
                               value="{{ old('stock') }}"
                               min="0"
                               placeholder="Cantidad disponible"
                               required
                               class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm text-slate-800 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                        @if ($errors->has('stock'))
                            <p class="mt-1 text-sm text-red-600">{{ $errors->first('stock') }}</p>
                        @endif
                    </div>

                    <!-- Botones -->
                    <div class="flex justify-end gap-3 border-t border-slate-200 pt-4">
                        <button type="button"
                                @click="modalCrear = false"
                                class="rounded-lg border border-slate-300 px-4 py-2.5 text-sm font-semibold text-slate-700 transition hover:bg-slate-100">
                            Cancelar
                        </button>

                        <button type="submit"
                                class="rounded-lg bg-green-600 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-green-700">
                            Guardar producto
                        </button>
                    </div>

                </form>

            </div>
        </div>

        <!-- Modal: Editar producto -->
        <div x-show="modalEditar"
             x-cloak
             @keydown.escape.window="modalEditar = false"
             @click.self="modalEditar = false"
             class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto bg-slate-900/60 px-4 py-6">

            <div x-show="modalEditar"
                 x-transition
                 class="w-full max-w-lg rounded-xl bg-white shadow-xl">

                <!-- Encabezado -->
                <div class="flex items-center justify-between border-b border-slate-200 px-6 py-4">
                    <h3 class="text-lg font-bold text-slate-800">
                        Actualizar producto
                    </h3>

                    <button type="button"
                            @click="modalEditar = false"
                            class="rounded-lg p-1 text-slate-400 transition hover:bg-slate-100 hover:text-slate-700">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                <!-- Formulario -->
                <form :action="'/productos/' + producto.id" method="POST" class="p-6">
                    @csrf
                    @method('PUT')

                    <div class="mb-5">
                        <label for="editar_nombre" class="mb-2 block text-sm font-semibold text-slate-700">
                            Nombre
                        </label>

                        <input type="text"
                               id="editar_nombre"
                               name="nombre"
                               x-model="producto.nombre"
                               required
                               class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm text-slate-800 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                    </div>

                    <div class="mb-5">
                        <label for="editar_precio" class="mb-2 block text-sm font-semibold text-slate-700">
                            Precio
                        </label>

                        <input type="number"
                               id="editar_precio"
                               name="precio"
                               x-model="producto.precio"
                               step="0.01"
                               min="0"
                               required
                               class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm text-slate-800 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                    </div>

                    <div class="mb-6">
                        <label for="editar_stock" class="mb-2 block text-sm font-semibold text-slate-700">
                            Stock
                        </label>

                        <input type="number"
                               id="editar_stock"
                               name="stock"
                               x-model="producto.stock"
                               min="0"
                               required
                               class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm text-slate-800 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                    </div>

                    <!-- Botones -->
                    <div class="flex justify-end gap-3 border-t border-slate-200 pt-4">
                        <button type="button"
                                @click="modalEditar = false"
                                class="rounded-lg border border-slate-300 px-4 py-2.5 text-sm font-semibold text-slate-700 transition hover:bg-slate-100">
                            Cancelar
                        </button>

                        <button type="submit"
                                class="rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-blue-700">
                            Actualizar producto
                        </button>
                    </div>

                </form>

            </div>
        </div>

        <!-- Modal: Confirmar eliminación -->
        <div x-show="modalEliminar"
             x-cloak
             @keydown.escape.window="modalEliminar = false"
             @click.self="modalEliminar = false"
             class="fixed inset-0 z-50 flex items-center justify-center bg-slate-900/60 px-4 py-6">

            <div x-show="modalEliminar"
                 x-transition
                 class="w-full max-w-md rounded-xl bg-white shadow-xl">

                <!-- Encabezado -->
                <div class="border-b border-slate-200 px-6 py-4">
                    <h3 class="text-lg font-bold text-slate-800">
                        Confirmar eliminación
                    </h3>
                </div>

                <!-- Contenido -->
                <div class="p-6">

                    <div class="mb-5 flex items-center gap-3">
                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-red-100">
                            <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v4m0 4h.01M10.29 3.86l-8.1 14.02A2 2 0 003.93 21h16.14a2 2 0 001.74-3.12l-8.1-14.02a2 2 0 00-3.42 0z"/>
                            </svg>
                        </div>

                        <p class="text-sm text-slate-600">
                            ¿Estás seguro de que deseas eliminar el producto
                            <span class="font-semibold text-slate-800" x-text="producto.nombre"></span>?
                            Esta acción no se puede deshacer.
                        </p>
                    </div>

                    <!-- Formulario de eliminación -->
                    <form :action="'/productos/' + producto.id" method="POST">
                        @csrf
                        @method('DELETE')

                        <div class="flex justify-end gap-3 border-t border-slate-200 pt-4">
                            <button type="button"
                                    @click="modalEliminar = false"
                                    class="rounded-lg border border-slate-300 px-4 py-2.5 text-sm font-semibold text-slate-700 transition hover:bg-slate-100">
                                Cancelar
                            </button>

                            <button type="submit"
                                    class="rounded-lg bg-red-600 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-red-700">
                                Sí, eliminar
                            </button>
                        </div>

                    </form>

                </div>

            </div>
        </div>

    </div>

</x-app-layout>
