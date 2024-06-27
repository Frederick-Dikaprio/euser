<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Inscription d'apprenant - DJED</title>

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
            <a href="{{ route('register') }}"
                class="focus:shadow-outline rounded bg-gradient-to-r from-green-400 to-blue-500 py-2 px-4 font-bold text-white hover:from-pink-500 hover:to-yellow-500 focus:outline-none">
                S'inscrire
            </a>
        </div>

        @if (session('error'))
            <div class="relative mb-4 rounded border border-red-400 bg-red-100 px-4 py-3 text-red-700" role="alert">
                {{ session('error') }}
            </div>
        @elseif (session('success'))
            <div class="relative mb-4 rounded border border-green-400 bg-green-100 px-4 py-3 text-green-700"
                role="alert">
                {{ session('success') }}
            </div>
        @endif

        <form class="mx-auto mb-4 w-fit rounded bg-white shadow-lg shadow-gray-500/50" method="POST"
            action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
            <div class="rounded-t border-b p-4 dark:border-gray-600">
                <h3 class="text-black-900 text-center text-xl font-semibold dark:text-black">
                    Inscrivez un apprenant
                </h3>
            </div>
            <div class="grid grid-cols-6 gap-6 p-6">
                <div class="col-span-6 sm:col-span-3">
                    <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-black"
                        for="name">Nom</label>
                    <input id="name"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500 sm:text-sm"
                        type="text" name="name" value="{{ old('name') }}" placeholder="Entrez votre nom"
                        required autofocus autocomplete="name" />
                    @error('name')
                        <span class="error text-red-700">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-black" for="username"
                        value="{{ __('Prénom') }}">Prenom</label>
                    <input id="username"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500 sm:text-sm"
                        type="text" name="username" value="{{ old('username') }}" required autofocus
                        autocomplete="username" placeholder="Entrez votre prénom" />
                    @error('username')
                        <span class="error text-red-700">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="phone" class="mb-2 block text-sm font-medium text-gray-900 dark:text-black"
                        value="{{ __('N° Téléphone') }}">Téléphone</label>
                    <input id="phone" wire:model="phone"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500 sm:text-sm"
                        type="text" placeholder="numéro de téléphone" name="phone" value="{{ old('phone') }}"
                        autofocus autocomplete="phone" />
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="email"
                        class="mb-2 block text-sm font-medium text-gray-900 dark:text-black">Email</label>
                    <input id="email" wire:model="email"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500 sm:text-sm"
                        type="email" placeholder="Entrez votre Email" name="email" value="{{ old('email') }}" />
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
                    <label for="password" class="text-black-900 mb-2 block text-sm font-medium dark:text-black">Mot de
                        passe</label>
                    <input id="password" wire:model="password"
                        class="border-black-300 focus:ring-black-600 block w-full rounded-lg border bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500 sm:text-sm"
                        type="password" name="password" required autocomplete="new-password" />
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="password_confirmation"
                        class="mb-2 block text-sm font-medium text-gray-900 dark:text-black"
                        value="{{ __('Confirm Password') }}">Confirmez le mot de passe</label>
                    <input id="password_confirmation"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500 sm:text-sm"
                        type="passworda" name="password_confirmation" required autocomplete="new-password" />
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="password_confirmation"
                        class="mb-2 block text-sm font-medium text-gray-900 dark:text-black"><b>Code de
                            validation</b></label>
                    <input id="code"
                        class="block w-full justify-center rounded-lg border border-gray-300 bg-green-100 p-2.5 text-gray-900 shadow-sm focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500 sm:text-sm"
                        type="text" placeholder="Entrez le code reçu de votre
                            parrain"
                        name="code" value="{{ old('code') }}" autofocus autocomplete="code" />
                </div>

            </div>
            <div
                class="mt-4 flex items-center justify-end space-x-2 rounded-b border-t border-gray-200 p-6 dark:border-gray-600">

                <button wire.click="register" name="inscription"
                    class="ml-4 inline-flex items-center rounded-md border border-transparent bg-gray-800 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white transition hover:bg-gray-700 focus:border-gray-900 focus:outline-none focus:ring focus:ring-gray-300 active:bg-gray-900 disabled:opacity-25">
                    {{ __("S'inscrire") }}
                </button>
            </div>
        </form>

        <p class="text-center text-xs text-gray-500">
            &copy;2022 DJED. All rights reserved.
        </p>
    </div>
</body>

</html>
