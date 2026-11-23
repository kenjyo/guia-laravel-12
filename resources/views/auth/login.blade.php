
<x-guest-layout>

    <div class="mb-8 text-center">
        <h1 class="text-2xl font-bold tracking-tight text-slate-800">
            Iniciar sesión
        </h1>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />



    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Correo electrónico -->
        <div>
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
                autofocus
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
                autocomplete="current-password"
            />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Recordar sesión -->
        <div class="mt-5 flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center">
                <input
                    id="remember_me"
                    type="checkbox"
                    class="rounded border-slate-300 text-blue-700 shadow-none focus:ring-blue-600"
                    name="remember"
                >

                <span class="ms-2 text-sm text-slate-600">
                    Recordarme
                </span>
            </label>

            @if (Route::has('password.request'))
                <a
                    class="text-sm font-medium text-blue-700 transition hover:text-blue-900"
                    href="{{ route('password.request') }}"
                >
                    ¿Olvidaste tu contraseña?
                </a>
            @endif
        </div>

        <!-- Botón -->
        <div class="mt-7 flex justify-center">
            <x-primary-button class="w-2/3 justify-center !bg-blue-600 hover:!bg-blue-700 py-3 text-sm font-semibold text-white">
                Iniciar sesión
            </x-primary-button>
        </div>

        <!-- Enlace a registro -->
        <div class="mt-5 border-t border-slate-200 pt-5 text-center">
            <span class="text-sm text-slate-600">
                ¿No tienes una cuenta?
            </span>

            <a href="{{ route('register') }}"
            class="text-sm font-semibold text-blue-700 transition hover:text-blue-900">
                Regístrate
            </a>
        </div>
    </form>

</x-guest-layout>
