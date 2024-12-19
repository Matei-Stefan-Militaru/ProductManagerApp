@extends('layouts.app')

@section('title', 'Editar Producto')

@section('content')
    <h2>Editar Producto</h2>
    <form action="{{ route('productos.update', $producto) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="{{ $producto->nombre }}" required><br>

        <label for="precio">Precio:</label>
        <input type="number" name="precio" value="{{ $producto->precio }}" step="0.01" required><br>

        <label for="categoria">Categoría:</label>
        <input type="text" name="categoria" value="{{ $producto->categoria }}" required><br>

        <button type="submit">Actualizar Producto</button>
    </form>
@endsection
