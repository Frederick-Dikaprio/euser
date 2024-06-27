<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
</head>

<body
    class="antialiased items-top flex justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center px-2 sm:pt-0">
    <div class="">

        <div class="w-full ml-4 max-w-xs">
            <!-- Session Status -->
            @if (session('status'))
                <div class="mb-4 bg-green-100 py-4 border border-green-400 text-green-700 px-4 rounded relative"
                    role="alert">
                    <b>{{ session('status') }}</b>
                </div>
            @endif
            
            <form class="bg-white shadow-lg shadow-cyan-500/50 drop-shadow-2xl rounded px-8 pt-6 pb-8 mb-4"
                method="POST" action="{{ route('password.codevalide') }}">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                        Code de validation
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="code" type="text" placeholder="Entrez le code validation reçu" name="code"
                        :value="old('code')" required autofocus>
                </div>

                <div class=" items-center justify-between">
                    <button
                        class="bg-gradient-to-r from-green-400 to-blue-500 hover:from-pink-500 hover:to-yellow-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        Valider
                    </button>
                </div>
            </form>
            <p class="text-center text-gray-500 text-xs">
                &copy;2022 DJED. All rights reserved.
            </p>
            </form>

        </div>
    </div>
</body>

</html>
