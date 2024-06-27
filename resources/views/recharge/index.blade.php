@extends('layouts.maindo')

@Section('titre')
    Recharge du wallet
@endsection

@Section('content')
    <div class="mt-8 mx-4 justify-center">
        <div class="grid grid-cols-1 md:grid-cols-2">
            <div class="ml-10 mx-2">
                <h1 class="text-left mb-7 text-gray-500 text-xl">
                    <strong class="bg-clip-text text-transparent bg-gradient-to-r from-pink-500 to-violet-500">
                        CHOISIR MODE DE PAIEMENT PAR LEQUEL VOUS SOUHAITEZ RECHARGER VOTRE COMPTE
                    </strong>
                </h1>
                <div class="inline-flex justify-between items-center bg-blu-200 h-12">
                    <button id="master"
                        class="divide-y-4 h-full   border-2  rounded-lg divide-slate-400/25 block bg-white shadow-md hover:shadow-xl">
                        <img src="{{ asset('/image/master.png') }}" alt="" class="rounded-lg w-full h-full">
                    </button>
                    <button id="visa"
                        class="divide-y-4 h-full  border-2 rounded-lg  divide-slate-400/25 block bg-white shadow-md hover:shadow-xl ml-4">
                        <img src="{{ asset('/image/visa.png') }}" alt="" class="rounded-lg w-23 h-10">
                    </button>
                    <button id="paypal"
                        class="ml-2 divide-y-4 h-full mx-4 ml-6 border-2 rounded-lg  divide-slate-400/25 block bg-white shadow-md hover:shadow-xl">
                        <img src="{{ asset('/image/paypale.png') }}" alt="" class="rounded-lg w-23 h-10">
                    </button>
                    <button id="om"
                        class="ml-4 divide-y-4 h-full mx-4 border-2  rounded-lg divide-slate-400/25 block bg-white shadow-md hover:shadow-xl">
                        <img src="{{ asset('/image/orange.png') }}" alt="" class="rounded-lg w-23 h-10">
                    </button>
                    <button id="momo"
                        class="ml-2 divide-y-4 h-full border-2  rounded-lg divide-slate-400/25 block bg-white shadow-md hover:shadow-xl">
                        <img src="{{ asset('/image/momo.png') }}" alt="" class="rounded-lg w-full h-full">
                    </button>
                </div><br><br>

                <div id="fmaster" class="w-full max-w-xs md:justify-center float-center" style="display: none;">

                    <form class="bg-white shadow-lg shadow-cyan-500/50 drop-shadow-2xl rounded px-8 pt-6 pb-8 mb-4"
                        method="GET" action="{{ url('/component') }}">
                        @csrf
                        <h1 class="text-center mb-4 text-gray-500 text-xl ">
                            <strong
                                class="bg-clip-text float-right text-transparent bg-gradient-to-r from-pink-500 to-violet-500">
                                <img src="{{ asset('/image/master.png') }}" alt="" class="rounded-lg w-20 h-10">
                            </strong>
                        </h1><br>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                Nom sur la carte
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="nom_carte" type="text" placeholder="nom sur la carte" name="nom_carte" required
                                autofocus>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                numero de la carte
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="numero" type="text" name="numero_carte" placeholder="0000 0000 0000 0000" required
                                autofocus>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                Date d'expiration
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="date" type="text" name="date" placeholder="MM/YY" required autofocus>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                CVV
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 mx-1/2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="cvv" type="text" name="cvv" placeholder="code secret à 3 chiffres" required
                                autofocus>
                        </div>
                        <div class="flex items-center justify-between">
                            <button
                                class="bg-gradient-to-r from-green-400 to-blue-500 hover:from-pink-500 hover:to-yellow-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                type="submit">
                                Recharger
                            </button>
                        </div>
                    </form>
                </div>

                {{-- Visa --}}
                <div id="fvisa" class="w-full max-w-xs" style="display: none;">

                    <form class="bg-white shadow-lg shadow-cyan-500/50 drop-shadow-2xl rounded px-8 pt-6 pb-8 mb-4"
                        method="GET" action="{{ url('/component') }}">
                        @csrf
                        <h1 class="text-center mb-4 text-gray-500 text-xl ">
                            <strong
                                class="relative bg-clip-text float-right text-transparent bg-gradient-to-r from-pink-500 to-violet-500">
                                <img src="{{ asset('/image/visa.png') }}" alt="" class="rounded-lg w-23 h-10">
                            </strong>
                        </h1><br>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                Nom sur la carte
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="nom_carte" type="text" placeholder="nom sur la carte" name="nom_carte" required
                                autofocus>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                numero de la carte
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="numero" type="text" name="numero_carte" placeholder="0000 0000 0000 0000"
                                required autofocus>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                Date d'expiration
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="date" type="text" name="date" placeholder="MM/YY" required autofocus>
                        </div>

                        <div class="mb-'">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                CVV
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 mx-1/2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="cvv" type="text" name="cvv" placeholder="code secret à 3 chiffres"
                                required autofocus>
                        </div>
                        <div class="flex items-center justify-between">
                            <button
                                class="bg-gradient-to-r from-green-400 to-blue-500 hover:from-pink-500 hover:to-yellow-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                type="submit">
                                Recharger
                            </button>
                        </div>
                    </form>
                </div>

                {{-- Paypal --}}
                {{-- <div id="fpaypal" class="w-full max-w-xs" style="display: none;">

                    <form class="bg-white shadow-lg shadow-cyan-500/50 drop-shadow-2xl rounded px-8 pt-6 pb-8 mb-4"
                        method="GET" action="{{ url('/component') }}">
                        @csrf
                        <h1 class="text-center mb-4 text-gray-500 text-xl ">
                            <strong
                                class="bg-clip-text text-transparent float-right bg-gradient-to-r from-pink-500 to-violet-500">
                                <img src="{{ asset('/image/paypale.png') }}" alt=""
                                    class="rounded-lg w-23 h-10">
                            </strong>
                        </h1><br>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                Nom sur la carte
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="nom_carte" placeholder="nom sur la carte" type="text" name="nom_carte" required
                                autofocus>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                numero de la carte
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="numero" type="text" name="numero_carte" placeholder="0000 0000 0000 0000"
                                required autofocus>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                Date d'expiration
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="date" type="text" name="date" placeholder="MM/YY" required autofocus>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                CVV
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 mx-1/2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="cvv" type="text" name="cvv" placeholder="code secret à 3 chiffres"
                                required autofocus>
                        </div>
                        <div class="flex items-center justify-between">
                            <button
                                class="bg-gradient-to-r from-green-400 to-blue-500 hover:from-pink-500 hover:to-yellow-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                type="submit">
                                Recharger
                            </button>
                        </div>
                    </form>
                </div> --}}

                {{-- orange money --}}
                {{-- <div id="fom" class="w-full max-w-xs" style="display: none;">

                    <form class="bg-white shadow-lg shadow-cyan-500/50 drop-shadow-2xl rounded px-8 pt-6 pb-8 mb-4"
                        method="GET" action="{{ url('/component') }}">
                        @csrf
                        <h1 class="text-center mb-4 text-gray-500 text-xl ">
                            <strong
                                class="bg-clip-text text-transparent float-right bg-gradient-to-r from-pink-500 to-violet-500">
                                <img src="{{ asset('/image/orange.png') }}" alt="" class="rounded-lg w-23 h-10">
                            </strong>
                        </h1><br>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                Montant net à payer
                            </label>
                            <input
                                class="shadow appearance-none border cursor-not-allowed rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="numero" type="text" name="numero_carte" placeholder="15 000 XAF" required
                                autofocus disabled>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                Numero de téléphone
                            </label>
                            <input
                                class="shadow appearance-none border-2 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="numero" type="tel" name="numero_carte"
                                placeholder="Saisir numero de téléphone ici" required autofocus>
                        </div>
                        <div class="flex items-center justify-between">
                            <button
                                class="bg-gradient-to-r from-green-400 to-blue-500 hover:from-pink-500 hover:to-yellow-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                type="submit">
                                Payer
                            </button>
                        </div>
                    </form>
                </div> --}}

                {{-- Mobile money --}}
                {{-- <div id="fmomo" class="w-full max-w-xs" style="display: none;">

                    <form class="bg-white shadow-lg shadow-cyan-500/50 drop-shadow-2xl rounded px-8 pt-6 pb-8 mb-4"
                        method="GET" action="{{ url('/component') }}">
                        @csrf
                        <h1 class="text-center mb-4 text-gray-500 text-xl ">
                            <strong
                                class="bg-clip-text text-transparent float-right bg-gradient-to-r from-pink-500 to-violet-500">
                                <img src="{{ asset('/image/momo.png') }}" alt="" class="rounded-lg w-20 h-10">
                            </strong>
                        </h1><br>
                        <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                Montant net à payer
                            </label>
                            <input
                                class="shadow appearance-none border cursor-not-allowed rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="montant" type="tel" name="montant" placeholder="15 000 XAF" required autofocus
                                disabled>
                        </div>
                        <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                Numero de téléphone
                            </label>
                            <input
                                class="shadow appearance-none border-2 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="numero" type="tel" name="numero"
                                placeholder="Saisir numero de téléphone ici" required autofocus>
                        </div>
                        <div class="flex items-center justify-between">
                            <button
                                class="bg-gradient-to-r from-green-400 to-blue-500 hover:from-pink-500 hover:to-yellow-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                type="submit">
                                Recharger
                            </button>
                        </div>
                    </form>
                </div> --}}
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            $("#fmaster").show(2000);

            $('#master').click(function() {
                $('#fvisa').hide(1000);
                $('#fpaypal').hide(1000);
                $('#fom').hide(1000);
                $('#fmomo').hide(1000);
                $('#fmaster').show(1000);
            });

            $('#visa').click(function() {
                $('#fmaster').hide(1000);
                $('#fpaypal').hide(1000);
                $('#fom').hide(1000);
                $('#fmomo').hide(1000);
                $('#fvisa').show(1000);
            });

            $('#paypal').click(function() {
                $('#fmaster').hide(1000);
                $('#fom').hide(1000);
                $('#fmomo').hide(1000);
                $('#fvisa').hide(1000);
                $('#fpaypal').show(1000);
            });

            $('#om').click(function() {
                $('#fmaster').hide(1000);
                $('#fpaypal').hide(1000);
                $('#fmomo').hide(1000);
                $('#fvisa').hide(1000);
                $('#fom').show(1000);
            });

            $('#momo').click(function() {
                $('#fmaster').hide(1000);
                $('#fpaypal').hide(1000);
                $('#fom').hide(1000);
                $('#fvisa').hide(1000);
                $('#fmomo').show(1000);
            });

        });
    </script>
@endsection
