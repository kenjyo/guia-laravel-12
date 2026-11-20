<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Sistema de productos
        </h2>
    </x-slot>

    <style>
        .productos-contenedor {
            max-width: 1000px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .productos-contenido {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.08);
        }

        .productos-contenido h2 {
            margin-bottom: 25px;
            color: #1f2937;
            font-size: 22px;
            font-weight: bold;
        }

        .mensaje {
            padding: 12px 16px;
            margin-bottom: 20px;
            border-radius: 6px;
        }

        .success {
            background: #dcfce7;
            color: #166534;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
        }

        .boton {
            display: inline-block;
            padding: 10px 16px;
            border: none;
            border-radius: 6px;
            color: white;
            text-decoration: none;
            font-size: 14px;
            cursor: pointer;
        }

        .agregar, .guardar {
            background: #16a34a;
        }

        .editar {
            background: #2563eb;
        }

        .eliminar {
            background: #dc2626;
        }

        .volver {
            background: #6b7280;
            margin-left: 5px;
        }

        .boton:hover {
            opacity: 0.85;
        }

        .productos-contenido table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .productos-contenido thead {
            background: #eff6ff;
        }

        .productos-contenido th,
        .productos-contenido td {
            padding: 14px;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }

        .productos-contenido th {
            color: #1e40af;
            font-size: 14px;
        }

        .productos-contenido tbody tr:hover {
            background: #f9fafb;
        }

        .acciones {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .acciones form {
            display: inline;
        }

        .formulario {
            max-width: 550px;
        }

        .campo {
            margin-bottom: 20px;
        }

        .campo label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #374151;
        }

        .campo input {
            width: 100%;
            padding: 11px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 15px;
            outline: none;
        }

        .campo input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.12);
        }

        @media (max-width: 650px) {
            .productos-contenedor {
                padding: 0 10px;
            }

            .productos-contenido {
                padding: 18px;
                overflow-x: auto;
            }

            .productos-contenido table {
                min-width: 600px;
            }

            .acciones {
                flex-wrap: wrap;
            }
        }
    </style>

    <div class="productos-contenedor">

        <main class="productos-contenido">

            @if (session('success'))
                <div class="mensaje success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mensaje error">
                    {{ session('error') }}
                </div>
            @endif

            @yield('contenido')

        </main>

    </div>

</x-app-layout>
