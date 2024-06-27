<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>E-USER - DJED</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="bg-gray-100 antialiased dark:bg-gray-900">
    <div class="container mx-auto min-h-screen px-4">
        <div class="flex items-center justify-between py-4">
            <a href="{{ route('login') }}"><img src="{{ asset('images/logo.png') }}" class="h-[4rem]"></a>
            <div class="flex gap-x-4">
                <a href="{{ route('register') }}"
                    class="focus:shadow-outline rounded bg-gradient-to-r from-green-400 to-blue-500 py-2 px-4 font-bold text-white hover:from-pink-500 hover:to-yellow-500 focus:outline-none">
                    S'inscrire
                </a>
                <a href="{{ route('register-with-code') }}"
                    class="focus:shadow-outline rounded bg-gradient-to-r from-green-400 to-blue-500 py-2 px-4 font-bold text-white hover:from-pink-500 hover:to-yellow-500 focus:outline-none">
                    Inscription avec Code
                </a>
            </div>
        </div>
        <div @class([
            'flex',
            'items-center',
            'justify-center',
            'pt-3' => session('error') || session('success'),
            'pt-12' => empty(session('error')) && empty(session('success')),
        ])>
            <div class="flex flex-col items-center gap-y-8 sm:flex-row sm:gap-x-8">
                <div class="h-fit max-w-sm">
                    <div class="overflow-hidden rounded bg-white shadow-lg shadow-gray-500/50">
                        <figure>
                            <img src="/image/little-black-boy.jpg" class="object-cover">
                        </figure>
                        <div class="px-6 py-4">
                            <p class="text-center text-base text-gray-700">
                                Bienvenu dans l'application de paiement.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="max-w-xs">
                    @if (session('error'))
                        <div class="relative mb-4 rounded border border-red-400 bg-red-100 px-4 py-3 text-red-700"
                            role="alert">
                            {{ session('error') }}
                        </div>
                    @elseif (session('success'))
                        <div class="relative mb-4 rounded border border-green-400 bg-green-100 px-4 py-3 text-green-700"
                            role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form class="mb-4 rounded bg-white px-8 pt-6 pb-8 shadow-lg shadow-gray-500/50 drop-shadow-2xl"
                        method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-4">
                            <p>Veuillez vous connecter</p>
                        </div>
                        <div class="mb-4">
                            <label class="mb-2 block text-sm font-bold text-gray-700" for="username">
                                Alias
                            </label>
                            <input
                                class="focus:shadow-outline w-full appearance-none rounded border py-2 px-3 leading-tight text-gray-700 shadow focus:outline-none"
                                id="alias" type="text" placeholder="Entrez votre alias" name="alias"
                                value="{{ old('alias') }}" required autofocus>
                        </div>
                        <div class="mb-6">
                            <label class="mb-2 block text-sm font-bold text-gray-700" for="password">
                                Mot de passe
                            </label>
                            <input
                                class="focus:shadow-outline mb-3 w-full appearance-none rounded border py-2 px-3 leading-tight text-gray-700 shadow focus:outline-none"
                                id="password" type="password" name="password" placeholder="******************" required
                                autocomplete="current-password">
                        </div>
                        <div class="flex items-center justify-between">
                            <button
                                class="focus:shadow-outline rounded bg-gradient-to-r from-green-400 to-blue-500 py-2 px-4 font-bold text-white hover:from-pink-500 hover:to-yellow-500 focus:outline-none"
                                type="submit">
                                Connexion
                            </button>
                            <a href="{{ route('forgot.password') }}"
                                class="ml-2 inline-block align-baseline text-sm font-bold text-blue-500 hover:text-blue-800">
                                Mot de passe oublié?
                            </a>
                        </div>
                    </form>
                    <p class="text-center text-xs text-gray-500">
                        &copy;2022 DJED. All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
