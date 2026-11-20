
@extends('layouts.productos')

@section('titulo', 'Registrar producto')

@section('contenido')

    <h2>Registrar producto</h2>

    <form action="{{ route('productos.store') }}" method="POST" class="formulario">
        @csrf

        <div class="campo">
            <label>Nombre:</label>
            <input type="text" name="nombre" placeholder="Nombre del producto">
        </div>

        <div class="campo">
            <label>Precio:</label>
            <input type="number" name="precio" step="0.01" placeholder="Precio del producto">
        </div>

        <div class="campo">
            <label>Stock:</label>
            <input type="number" name="stock" placeholder="Cantidad disponible">
        </div>

        <button type="submit" class="boton guardar">
            Guardar producto
        </button>

        <a href="{{ route('productos.index') }}" class="boton volver">
            Volver
        </a>

    </form>

@endsection
