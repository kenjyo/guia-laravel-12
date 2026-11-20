
@extends('layouts.productos')

@section('titulo', 'Editar producto')

@section('contenido')

    <h2>Editar producto</h2>

    <form action="{{ route('productos.update', $producto->id) }}" method="POST" class="formulario">
        @csrf
        @method('PUT')

        <div class="campo">
            <label>Nombre:</label>
            <input type="text" name="nombre" value="{{ $producto->nombre }}">
        </div>

        <div class="campo">
            <label>Precio:</label>
            <input type="number" name="precio" step="0.01" value="{{ $producto->precio }}">
        </div>

        <div class="campo">
            <label>Stock:</label>
            <input type="number" name="stock" value="{{ $producto->stock }}">
        </div>

        <button type="submit" class="boton guardar">
            Actualizar producto
        </button>

        <a href="{{ route('productos.index') }}" class="boton volver">
            Volver
        </a>

    </form>

@endsection
