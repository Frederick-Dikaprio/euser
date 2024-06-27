<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Inscription - DJED</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="bg-gray-100 pb-8 antialiased dark:bg-gray-900">
    <div class="container mx-auto min-h-screen px-4">
        <div class="flex items-center justify-between py-4">
            <a href="{{ route('login') }}"><img src="{{ asset('images/logo.png') }}" class="h-[4rem]"></a>
            <a href="{{ route('register-with-code') }}"
                class="focus:shadow-outline rounded bg-gradient-to-r from-green-400 to-blue-500 px-4 py-2 font-bold text-white hover:from-pink-500 hover:to-yellow-500 focus:outline-none">
                Inscription avec Code
            </a>
        </div>

        <div class="mx-auto mb-4 w-fit">
            @if (session('error'))
                <div class="relative mb-4 w-full rounded border border-red-400 bg-red-100 px-4 py-3 text-red-700"
                    role="alert">
                    {{ session('error') }}
                </div>
            @elseif (session('success'))
                <div class="relative mb-4 w-full rounded border border-green-400 bg-green-100 px-4 py-3 text-green-700"
                    role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <form class="w-full rounded bg-white shadow-lg shadow-gray-500/50" method="POST"
                action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf
                <div class="rounded-t border-b p-4 dark:border-gray-600">
                    <h3 class="text-black-900 text-center text-xl font-semibold dark:text-black">
                        Inscription
                    </h3>
                </div>
                <div class="grid grid-cols-6 gap-6 p-6">
                    <div class="col-span-6 sm:col-span-3">
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-black"
                            for="first_name">Prénom</label>
                        <input id="firstname"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500 sm:text-sm"
                            type="text" name="first_name" value="{{ old('first_name') }}" required autofocus
                            autocomplete="firstname" placeholder="Entrez votre prénom" />
                        @error('first_name')
                            <span class="error text-red-700">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-black"
                            for="last_name">Nom</label>
                        <input id="lastname"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500 sm:text-sm"
                            type="text" name="last_name" value="{{ old('last_name') }}"
                            placeholder="Entrez votre nom" required autofocus autocomplete="lastname" />
                        @error('last_name')
                            <span class="error text-red-700">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="birthday" class="mb-2 block text-sm font-medium text-gray-900 dark:text-black">Date
                            de naissance</label>
                        <input type="date" name="birthday"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500 sm:text-sm"
                            required>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="phone"
                            class="mb-2 block text-sm font-medium text-gray-900 dark:text-black">Téléphone</label>
                        <input id="phone" wire:model="phone"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500 sm:text-sm"
                            type="text" placeholder="Entrez votre numéro de téléphone" name="phone"
                            value="{{ old('phone') }}" autofocus autocomplete="phone" />
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="email"
                            class="mb-2 block text-sm font-medium text-gray-900 dark:text-black">Email</label>
                        <input id="email" wire:model="email"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500 sm:text-sm"
                            type="email" placeholder="Entrez votre e-mail" name="email"
                            value="{{ old('email') }}" />
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="date"
                            class="mb-2 block text-sm font-medium text-gray-900 dark:text-black">Alias</label>
                        <input id="date" wire:model="alias"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500 sm:text-sm"
                            type="text" name="alias" value="{{ old('alias') }}" required autofocus
                            autocomplete="alias" placeholder="Choisissez un alias personnel" />
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="password" class="text-black-900 mb-2 block text-sm font-medium dark:text-black">Mot
                            de
                            passe</label>
                        <input id="password" wire:model="password"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500 sm:text-sm"
                            type="password" name="password" required autocomplete="new-password" />
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="password_confirmation"
                            class="mb-2 block text-sm font-medium text-gray-900 dark:text-black">Confirmez le mot de
                            passe</label>
                        <input id="password_confirmation"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500 sm:text-sm"
                            type="password" name="password_confirmation" required autocomplete="new-password" />
                    </div>
                </div>
                <div
                    class="mt-4 flex items-center justify-end space-x-4 rounded-b border-t border-gray-200 p-6 dark:border-gray-600">
                    <a class="text-sm text-gray-600 hover:text-gray-900" href="{{ url(env('APP_URL')) }}">
                        {{ __('Déjà Inscrit?') }}
                    </a>
                    <button wire.click="register" name="inscription"
                        class="ml-4 inline-flex items-center rounded-md border border-transparent bg-gray-800 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white transition hover:bg-gray-700 focus:border-gray-900 focus:outline-none focus:ring focus:ring-gray-300 active:bg-gray-900 disabled:opacity-25">
                        {{ __("S'inscrire") }}
                    </button>
                </div>
            </form>
        </div>

        <p class="text-center text-xs text-gray-500">
            &copy;2022 DJED. All rights reserved.
        </p>
    </div>
</body>

</html>
