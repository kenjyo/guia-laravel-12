
@extends('layouts.productos')

@section('titulo', 'Lista de productos')

@section('contenido')

    <h2>Lista de productos</h2>

    <a href="{{ route('productos.create') }}" class="boton agregar">
        + Agregar producto
    </a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($productos as $producto)
                <tr>
                    <td>{{ $producto->id }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>S/ {{ number_format($producto->precio, 2) }}</td>
                    <td>{{ $producto->stock }}</td>

                    <td>
                        <div class="acciones">

                            <a href="{{ route('productos.edit', $producto->id) }}"
                               class="boton editar">
                                Editar
                            </a>

                            <form action="{{ route('productos.destroy', $producto->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="boton eliminar">
                                    Eliminar
                                </button>
                            </form>

                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
