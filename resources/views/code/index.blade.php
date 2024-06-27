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
        <!-- Session Status -->
        @if (session('statusok'))
            <div class="mb-4 py-4 justify-center mt-4 bg-green-100 border border-green-400 text-green-700 px-4 rounded relative"
                role="alert">
                {{ session('statusok') }}
            </div>
        @elseif (session('status'))
            <div class="mb-4 py-4 justify-center mt-4 bg-red-100 border border-red-400 text-red-700 px-4 rounded relative"
                role="alert">
                {{ session('status') }}
            </div>
        @endif

        @php
            $route = route('account.active', [], false);
            if (env('APP_ENV') === 'production') {
                $route = env('APP_URL') . $route;
            }
        @endphp
        <form class="bg-white shadow-lg w-full shadow-cyan-500/50 shadow-lg rounded mb-4" method="POST"
            action="{{ $route }}" enctype="multipart/form-data">
            @csrf
            <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                <h3 class="text-xl font-semibold text-black-900 dark:text-black">
                    Entrer le code d'activation
                </h3>
            </div>

            <div class="p-6 space-y-6">
                <div class="grid grid-cols-6 gap-6">

                    <div class="col-span-6 sm:col-span-3">
                        <input id="code"
                            class="shadow-sm  justify-center bg-green-100 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            type="text" placeholder="Activated code" name="code" :value="old('code')" autofocus
                            autocomplete="code" />
                    </div>
                </div>
            </div>

            <div
                class="flex items-center justify-end  p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">

                <button type="submit" name="activeAccount"
                    class="ml-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                    {{ __('Activer le compte') }}
                </button>
            </div>
        </form>
    </div>
</body>

</html>
