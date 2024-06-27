@extends('layouts.maindo')

@Section('titre')
    Paiements
@endsection

@Section('content')
    <div class="mt-8 mx-4 ">
        <div class="grid grid-cols-1 md:grid-cols-2">
            <div class="ml-10 mx-2">
                <h1 class="text-left mb-7 text-gray-500 text-xl">
                    <strong class="bg-clip-text text-transparent bg-gradient-to-r from-pink-500 to-violet-500">
                        CHOISIR MODE DE PAIEMENT
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

                    <div class="bg-white shadow-lg shadow-cyan-500/50 drop-shadow-2xl rounded px-8 pt-6 pb-8 mb-4"
                        id="mastercard" action="{{ route('payment.stripe') }}">
                        <h1 class="text-center mb-4 text-gray-500 text-xl ">
                            <strong
                                class="bg-clip-text float-right text-transparent bg-gradient-to-r from-pink-500 to-violet-500">
                                <img src="{{ asset('/image/master.png') }}" alt="" class="rounded-lg w-20 h-10">
                            </strong>
                        </h1><br>
                        <div class="mb-4">
                            {{-- <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                Nom sur la carte
                            </label> --}}
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="mascarte" type="text" placeholder="nom sur la carte" name="nom_carte" required
                                value="card" disabled autofocus>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                numero de la carte
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="masnumero" type="text" name="numero_carte" placeholder="0000 0000 0000 0000" required
                                autofocus>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                Mois d'expiration
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="masmois_month" type="number" name="mois_month" placeholder="MM" required autofocus>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                Année d'expiration
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="masannee_year" type="number" name="annee_year" placeholder="YY" required autofocus>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                CVV
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 mx-1/2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="mascvv" type="number" name="cvc" placeholder="code secret à 3 chiffres" required
                                autofocus>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                ville
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 mx-1/2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="masville" type="text" name="ville" placeholder="code secret à 3 chiffres" required
                                autofocus>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                Code postal
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 mx-1/2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="maspost" type="text" name="post" placeholder="code secret à 3 chiffres" required
                                autofocus>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                pays
                            </label>
                            <select name="pays" id="maspays"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Pays</option>
                                <option value="CM">Cameroun</option>
                                <option value="US">USA</option>
                                <option value="GB">England</option>
                            </select>
                        </div>
                        <div class="flex items-center justify-between">
                            <button onclick="payMaster()" id="payer"
                                class="bg-gradient-to-r from-green-400 to-blue-500 hover:from-pink-500 hover:to-yellow-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Payer
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Visa --}}
                <div id="fvisa" class="w-full max-w-xs" style="display: none;">
                    @php
                        $route = route('payment.stripe', [], false);
                        if (env('APP_ENV') === 'production') {
                            $route = env('APP_URL') . $route;
                        }
                    @endphp
                    <form class="bg-white shadow-lg shadow-cyan-500/50 drop-shadow-2xl rounded px-8 pt-6 pb-8 mb-4"
                        id="visacard" action="{{ $route }}">
                        @csrf
                        <h1 class="text-center mb-4 text-gray-500 text-xl ">
                            <strong
                                class="relative bg-clip-text float-right text-transparent bg-gradient-to-r from-pink-500 to-violet-500">
                                <img src="{{ asset('/image/visa.png') }}" alt="" class="rounded-lg w-23 h-10">
                            </strong>
                        </h1><br>
                        <div class="mb-4">
                            {{-- <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                Nom sur la carte
                            </label> --}}
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="visacarte" type="text" placeholder="Mastercard" name="nom_carte" value="card"
                                required disabled autofocus>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                numero de la carte
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="visanumero" type="text" name="numero_carte" placeholder="0000 0000 0000 0000"
                                required autofocus>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                Date d'expiration
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="visadate" type="text" name="date" placeholder="MM/YY" required autofocus>
                        </div>

                        <div class="mb-'">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                CVV
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 mx-1/2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="visacvv" type="text" name="cvv" placeholder="code secret à 3 chiffres"
                                required autofocus>
                        </div>
                        <div class="flex items-center justify-between">
                            <button
                                class="bg-gradient-to-r from-green-400 to-blue-500 hover:from-pink-500 hover:to-yellow-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                type="submit">
                                Payer
                            </button>
                        </div>
                    </form>
                </div>

                {{-- Paypal --}}
                {{-- <div id="fpaypal" class="w-full max-w-xs" style="display: none;">

                    <form class="bg-white shadow-lg shadow-cyan-500/50 drop-shadow-2xl rounded px-8 pt-6 pb-8 mb-4"
                        id="paypal" action="{{ $route }}">
                        @csrf
                        <h1 class="text-center mb-4 text-gray-500 text-xl ">
                            <strong
                                class="bg-clip-text text-transparent float-right bg-gradient-to-r from-pink-500 to-violet-500">
                                <img src="{{ asset('/image/paypale.png') }}" alt=""
                                    class="rounded-lg w-23 h-10">
                            </strong>
                        </h1><br>
                        <div class="mb-4">
                            {{-- <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                Nom sur la carte
                            </label> -}}
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="paycarte" placeholder="nom sur la carte" type="text" name="nom_carte" required
                                value="card" required disabled autofocus>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                numero de la carte
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="paynumero" type="text" name="numero_carte" placeholder="0000 0000 0000 0000"
                                required autofocus>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                Date d'expiration
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="paydate" type="text" name="date" placeholder="MM/YY" required autofocus>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                CVV
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 mx-1/2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="paycvv" type="text" name="cvv" placeholder="code secret à 3 chiffres"
                                required autofocus>
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

                {{-- orange money --}}
                {{-- <div id="fom" class="w-full max-w-xs" style="display: none;">

                    @php
                        $route = route('payment.stripe', [], false);
                        if (env('APP_ENV') === 'production') {
                            $route = env('APP_URL') . $route;
                        }
                    @endphp
                    <form class="bg-white shadow-lg shadow-cyan-500/50 drop-shadow-2xl rounded px-8 pt-6 pb-8 mb-4">
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

                    @php
                        $route = route('payment.stripe', [], false);
                        if (env('APP_ENV') === 'production') {
                            $route = env('APP_URL') . $route;
                        }
                    @endphp
                    <form class="bg-white shadow-lg shadow-cyan-500/50 drop-shadow-2xl rounded px-8 pt-6 pb-8 mb-4">
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
                                Payer
                            </button>
                        </div>
                    </form>
                </div> --}}
            </div>



            {{-- Facture card --}}
            <div
                class="p-6 mx-10 mr-2 bg-gray-100 dark:bg-gray-800 sm:rounded-lg shadow-lg shadow-cyan-500/50 drop-shadow-2xl rounded">
                <h3 class="text-2xl sm:text-2xl text-gray-800 dark:text-white font-extrabold tracking-tight">
                    Récapitulatif Bouquet
                </h3>
                <p class="text-normal text-lg sm:text-2xl mt-4 font-medium text-gray-600 dark:text-gray-400">
                    <input type="hidden" id="name" value="{{ $infos['langue'] }}">
                    Langue : <b>{{ $infos['langue'] }}</b>
                </p><br />
                <div class="mt-6 mx-2 w-full inline-flex justify-between">
                    <div class="text-md tracking-wide font-semibold w-40"><b>Mode de Paiement </b></div>
                    <div class="float-right flex mr-20 text-md tracking-wide font-semibold w-40">
                        <img src="{{ asset('/image/momo.png') }}" alt="" class="rounded-lg w-15 h-10">
                        <img src="{{ asset('/image/orange.png') }}" alt="" class="ml-4 w-13 h-10">

                    </div>
                </div>

                <div class="mt-6 mx-2 w-full inline-flex justify-between">
                    <div class="text-md tracking-wide font-semibold w-40"><b>Bouquet : </b></div>
                    <div class="float-right ml-4 text-md tracking-wide font-semibold w-40"><i>{{ $infos['bouquet'] }}</i>
                        <input type="hidden" value="{{ $infos['bouquet'] }}">
                        <input type="hidden" id="price_id" value="{{ $infos['price_id'] }}">
                    </div>
                </div><br>
                <div class="mt-6 mx-2 w-full inline-flex justify-between">
                    <div class="text-md tracking-wide font-semibold w-40"><b>Nombre de places : </b></div>
                    <div class="float-right ml-4 text-md tracking-wide font-semibold w-40">
                        <i><b>{{ $infos['place'] }}</b></i>
                        <input type="hidden" id="qtity" value="{{ $infos['place'] }}">
                    </div>
                </div><br>
                <div class="mt-6 mx-2 w-full inline-flex justify-between">
                    <div class="text-md tracking-wide font-semibold w-40"><b>Durée de l'abonnement </b></div>
                    <div class="float-right ml-4 text-md tracking-wide font-semibold w-40">
                        <i>
                            <select id="duree"
                                class="bg-gray-50 border text-align-center border-gray-300 text-gray-900 h-8 w-40 text-sm rounded-lg">
                                <option selected>Choix de la période</option>
                                <option value="Annuel">Annuel</option>
                                <option value="Mensuel">Mensuel</option>
                            </select>
                        </i>
                    </div>
                </div><br>
                <div class="mt-6 mx-2 w-full inline-flex justify-between">
                    <div class=" text-md tracking-wide font-semibold w-40"><b>Prix selon la durée </b></div>
                    <div class="float-right ml-4 text-md tracking-wide font-semibold w-40"><b><i id="prix"><input
                                    type="hidden" id="somme" value="{{ $infos['prix'] }}"> </i></b>
                    </div>
                </div><br>
                <div class="mt-6 mx-2 w-full inline-flex justify-between">
                    <div class=" text-md tracking-wide font-semibold w-40"><b>telephone : </b></div>
                    <div class="float-right ml-4 text-md tracking-wide font-semibold w-40"><i>(+237)
                            695055384</i>
                        <input type="hidden" id="phone" value="695055384">
                    </div>
                </div><br />
                <hr class="mt-12">
                <div class="mt-12 mx-2 w-full inline-flex justify-between justify-end">
                    <div class="ml-4 text-md tracking-wide font-semibold w-40"><b>TOTAL :</b></div>
                    <div class="float-right ml-4 text-md tracking-wide font-semibold w-40"><input type="hidden"
                            id="total" value="{{ $infos['place'] }}"><b id="prixtotal"> </b>
                        {{ $infos['monnais'] }}</div>
                </div>

            </div>
            {{-- end facture card --}}
        </div>
    </div>
@endsection

@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            $('#duree').on('change', function() {
                var selectVal = $("#duree option:selected").val();
                var prix = $('#somme').val();
                var total = $('#total').val();
                console.log(selectVal);
                if (selectVal == "Mensuel") {
                    $('#prixtotal')
                    $('#prix').text('52,000 XAF').css("text-color", "blue");
                } else if (selectVal == "Annuel") {
                    var tot = prix * 10
                    $('#prix').text(tot);
                    $('#prixtotal').text(tot * total);
                    console.log(tot);
                } else {
                    $('#prix').text('');
                }
            });

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

            // $('#paypal').click(function() {
            //     $('#fmaster').hide(1000);
            //     $('#fom').hide(1000);
            //     $('#fmomo').hide(1000);
            //     $('#fvisa').hide(1000);
            //     $('#fpaypal').show(1000);
            // });

            // $('#om').click(function() {
            //     $('#fmaster').hide(1000);
            //     $('#fpaypal').hide(1000);
            //     $('#fmomo').hide(1000);
            //     $('#fvisa').hide(1000);
            //     $('#fom').show(1000);
            // });

            // $('#momo').click(function() {
            //     $('#fmaster').hide(1000);
            //     $('#fpaypal').hide(1000);
            //     $('#fom').hide(1000);
            //     $('#fvisa').hide(1000);
            //     $('#fmomo').show(1000);
            // });

        });

        function payMaster() {
            console.log(document.getElementById("masnumero"));
            if (document.getElementById("masnumero") == "") {
                evenement.preventDefault();
                document.getElementById("masnumero").focus();
                return false;
            }
            Swal.fire({
                title: "Valider le paiement ?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "OUI Payer",
                cancelButtonText: "Cancel",
            }).then((result) => {
                console.log(result.isConfirmed);
                if (result.isConfirmed) {

                    let token = $('meta[name="csrf-token"]').attr('content');
                    const urled = $("#mastercard").attr('action');

                    $.ajax({
                        url: urled,
                        type: "POST",
                        data: {
                            number: $('#masnumero').val(),
                            exp_month: $('#masmois_month').val(),
                            exp_year: $('#masannee_year').val(),
                            cvc: $('#mascvv').val(),
                            city: $('#masville').val(),
                            country: $('#maspays').val(),
                            phone: $('#phone').attr('value'),
                            postal_code: $('#maspost').val(),
                            state: $('#maspays').val(),
                            product_name: $('#name').attr('value'),
                            price_id: $('#price_id').attr('value'),
                            quantity: $('#qtity').attr('value'),
                            _token: token,
                        },
                        dataType: 'json',
                        beforeSend: function() {
                            Swal.fire({
                                html: '<b>PAIEMENT EN COURS...</b>',
                                timer: 10000,
                                didOpen: () => {
                                    Swal.showLoading()
                                },
                                willClose: () => {
                                    clearInterval(timerInterval)
                                }
                            })
                        },
                        success: function(response) {
                            console.log(response);
                            if (response["status"] == "success") {
                                Swal.fire({
                                    icon: response["status"],
                                    title: "Paiement éffectué avec succès",
                                    timer: 20000,
                                    timerProgressBar: false
                                })
                                //location.reload(true);
                            }
                            if (response["status"] === 'error') {
                                if (response["reason"] === 'Technical error. Try later') {
                                    Swal.fire({
                                        icon: response["status"],
                                        title: response["exception"]["message"],
                                        timer: 20000,
                                        timerProgressBar: false
                                    })
                                } else {
                                    Swal.fire({
                                        icon: response["status"],
                                        title: response["reason"],
                                        timer: 20000,
                                        timerProgressBar: false
                                    })
                                }

                            }
                        },
                        error: function(error) {
                            console.log(error);
                            Swal.fire({
                                icon: 'error',
                                title: "veillez à bien remplir les champs svp",
                                timer: 3000,
                                timerProgressBar: false
                            })
                        }
                    });
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: "Action annulée",
                        timer: 3000,
                        timerProgressBar: true
                    })
                }
            });
        };
    </script>
@endsection
