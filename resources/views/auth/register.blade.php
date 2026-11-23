
<x-guest-layout>

    <div class="mb-8 text-center">
        <h1 class="text-2xl font-bold tracking-tight text-slate-800">
            Crear cuenta
        </h1>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Nombre -->
        <div>
            <x-input-label
                for="name"
                value="Nombre"
                class="mb-2 text-sm font-medium text-slate-700"
            />

            <x-text-input
                id="name"
                class="block w-full rounded-lg border-slate-300 bg-slate-50 px-4 py-3 text-sm shadow-none transition focus:border-blue-600 focus:bg-white focus:ring-1 focus:ring-blue-600"
                type="text"
                name="name"
                :value="old('name')"
                required
                autofocus
                autocomplete="name"
            />

            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Correo electrónico -->
        <div class="mt-5">
            <x-input-label
                for="email"
                value="Correo electrónico"
                class="mb-2 text-sm font-medium text-slate-700"
            />

            <x-text-input
                id="email"
                class="block w-full rounded-lg border-slate-300 bg-slate-50 px-4 py-3 text-sm shadow-none transition focus:border-blue-600 focus:bg-white focus:ring-1 focus:ring-blue-600"
                type="email"
                name="email"
                :value="old('email')"
                required
                autocomplete="username"
            />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Contraseña -->
        <div class="mt-5">
            <x-input-label
                for="password"
                value="Contraseña"
                class="mb-2 text-sm font-medium text-slate-700"
            />

            <x-text-input
                id="password"
                class="block w-full rounded-lg border-slate-300 bg-slate-50 px-4 py-3 text-sm shadow-none transition focus:border-blue-600 focus:bg-white focus:ring-1 focus:ring-blue-600"
                type="password"
                name="password"
                required
                autocomplete="new-password"
            />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirmar contraseña -->
        <div class="mt-5">
            <x-input-label
                for="password_confirmation"
                value="Confirmar contraseña"
                class="mb-2 text-sm font-medium text-slate-700"
            />

            <x-text-input
                id="password_confirmation"
                class="block w-full rounded-lg border-slate-300 bg-slate-50 px-4 py-3 text-sm shadow-none transition focus:border-blue-600 focus:bg-white focus:ring-1 focus:ring-blue-600"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password"
            />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Acciones -->
        <div class="mt-7">

            <div class="text-center">
                <a
                    class="text-sm font-medium text-blue-700 transition hover:text-blue-900"
                    href="{{ route('login') }}"
                >
                    ¿Ya tienes una cuenta? Inicia sesión
                </a>
            </div>

            <div class="mt-5 flex justify-center">
                <x-primary-button class="w-2/3 justify-center !bg-blue-600 hover:!bg-blue-700 py-3 text-sm font-semibold text-white">
                    Registrarse
                </x-primary-button>
            </div>

        </div>
    </form>

</x-guest-layout>
