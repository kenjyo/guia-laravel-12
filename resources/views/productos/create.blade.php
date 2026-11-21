
<x-app-layout>

    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">

        <div class="mx-auto max-w-2xl rounded-xl bg-white p-6 shadow-sm ring-1 ring-slate-200 sm:p-8">

            <!-- Título -->
            <div class="mb-6">
                <h3 class="text-2xl font-bold text-slate-800">
                    Registrar producto
                </h3>

                <p class="mt-1 text-sm text-slate-500">
                    Completa los campos para registrar un nuevo producto.
                </p>
            </div>

            <!-- Formulario -->
            <form action="{{ route('productos.store') }}" method="POST" class="space-y-5">
                @csrf

                <!-- Nombre -->
                <div>
                    <label for="nombre" class="mb-2 block text-sm font-semibold text-slate-700">
                        Nombre:
                    </label>

                    <input
                        type="text"
                        id="nombre"
                        name="nombre"
                        value="{{ old('nombre') }}"
                        placeholder="Nombre del producto"
                        class="block w-full rounded-lg border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-800 shadow-sm transition focus:border-blue-500 focus:bg-white focus:ring-1 focus:ring-blue-500"
                    >

                    @error('nombre')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Precio -->
                <div>
                    <label for="precio" class="mb-2 block text-sm font-semibold text-slate-700">
                        Precio:
                    </label>

                    <input
                        type="number"
                        id="precio"
                        name="precio"
                        step="0.01"
                        value="{{ old('precio') }}"
                        placeholder="Precio del producto"
                        class="block w-full rounded-lg border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-800 shadow-sm transition focus:border-blue-500 focus:bg-white focus:ring-1 focus:ring-blue-500"
                    >

                    @error('precio')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Stock -->
                <div>
                    <label for="stock" class="mb-2 block text-sm font-semibold text-slate-700">
                        Stock:
                    </label>

                    <input
                        type="number"
                        id="stock"
                        name="stock"
                        value="{{ old('stock') }}"
                        placeholder="Cantidad disponible"
                        class="block w-full rounded-lg border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-800 shadow-sm transition focus:border-blue-500 focus:bg-white focus:ring-1 focus:ring-blue-500"
                    >

                    @error('stock')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Botones -->
                <div class="flex flex-wrap items-center gap-3 pt-3">

                    <button type="submit"
                            class="rounded-lg bg-green-600 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                        Guardar producto
                    </button>

                    <a href="{{ route('productos.index') }}"
                       class="rounded-lg bg-slate-500 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-slate-600">
                        Volver
                    </a>

                </div>

            </form>

        </div>

    </div>

</x-app-layout>
