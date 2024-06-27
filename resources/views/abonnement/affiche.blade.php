@extends('layouts.maindo')

@Section('titre')
    Bouquets
@endsection


@section('content')
    <div class="mt-10 ml-10 mx-4 ">
        <!--<a href="class="w-32 focus:outline-none mt-4 border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-green-500 hover:bg-indigo-600 font-medium"><i
                                                    class="fas fa-plus mr-2"></i>Nouveau Bouquet</a>-->
        <div class="antialiased bg-gray-200 text-gray-900 font-sans p-6">
            <div class="container mx-auto">
                <div class="flex flex-wrap -mx-4">

                    <div class="w-full sm:w-1/2 md:w-1/2 xl:w-1/3 p-4">
                        <div class="c-card block bg-white shadow-md hover:shadow-xl rounded-lg overflow-hidden">
                            <b class="p-4">CHOISIR UNE LANGUE</b>
                            @foreach ($package as $langue)
                                <div class="p-2">
                                    <div class="yem border-t ">
                                        <button id="yemba" type="submit"
                                            class="divide-y-4  border-2   divide-slate-400/25 block bg-white shadow-md hover:shadow-xl rounded-lg overflow-hiddenborder-4">
                                            <span
                                                class="inline-block px-4 py-2 mt-4 mb-2 leading-none bg-orange-200 text-orange-800 rounded-full font-semibold uppercase tracking-wide text-xl">
                                                {{ $langue['product_name'] }}
                                            </span>
                                            <p class="inline-block text-sm font-bold">
                                                <i>
                                                    {{ $langue['product_description'] }}
                                                </i>
                                            </p>
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div id="form" class="w-full sm:w-1/2 md:w-1/4 xl:w-1/3 p-4" style="display: none;">
                        <!--plan de langue-->
                        
                        <form method="POST" action="{{ route('user_pay') }}"
                            class="w-full border-4 border-slate-500  max-w-sm bg-white rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 divide-y-4 divide-slate-400/25">
                            <div class="p-2 font-bold border-b text-xl">
                                Plan de la langue YEMBA
                            </div>
                            <input type="hidden" name="id" value="{{ $packages->id }}">
                            <div class="px-5 p-4 border-b">
                                <div class="border-radus-3 mb-4">
                                    <div class="flex justify-between items-center">
                                        <img src="{{ asset('/image/individual.jpg') }}" alt=""
                                            class="rounded-lg w-41 h-20">
                                        <p class="mr-16 font-bold"><i>Individuel</i></p>
                                        <p
                                            class="text-black focus:ring-4 focus:outline-none  font-medium rounded-lg text-xl px-5 py-2.5 text-center">
                                            <u>Effectif</u>
                                        </p>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <p
                                            class="text-black focus:ring-4 px-0 focus:outline-none  font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                            Prix : <b><i class="text-xl h-6">15000 </i></b>/Personne</p>
                                        <p
                                            class="text-black focus:ring-4 focus:outline-none  font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                            Minimum : <b>1</b></p>
                                    </div>
                                    <div class="flex mb-4 justify-between items-center">
                                        <p
                                            class="text-black focus:ring-4 focus:outline-none  font-medium rounded-lg text-sm px-à py-à text-center">
                                            Monnaie:
                                            <select id="money"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg">
                                                <option selected>Money</option>
                                                <option value="US">Euro </option>
                                                <option value="CA">Dollars $</option>
                                                <option value="FR">XAF</option>
                                                <option value="DE">Livre</option>
                                            </select>
                                        </p>
                                        <p
                                            class="text-black focus:ring-4 ml-4 focus:outline-none  font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                            Maximum : <b>1</b></p>
                                    </div>
                                    <div class="justify-between items-center">
                                        <input type="checkbox" id="check" class="w-6 h-6" name="choix" />
                                        <label class="mr-30">Choisir Bouquet</label>
                                    </div>
                                </div>
                            </div>

                            <div class="px-5 p-4 pb-6 border-b">
                                <div class="border-radus-3 mb-4">
                                    <div class="flex justify-between items-center">
                                        <img src="{{ asset('/image/famille.jpg') }}" alt=""
                                            class="rounded-lg w-41 h-20">
                                        <p class="mr-16 font-bold"><i>Famillial</i></p>
                                        <p
                                            class="text-black focus:ring-4 focus:outline-none  font-medium rounded-lg text-xl px-5 py-2.5 text-center">
                                            <u>Effectif</u>
                                        </p>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <p
                                            class="text-black focus:ring-4 focus:outline-none  font-medium rounded-lg text-sm px-0 py-0 text-center">
                                            Prix : <b><i class="text-xl h-6">10000</i></b>/Personne</p>
                                        <p
                                            class="text-black focus:ring-4 focus:outline-none  font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                            Minimum : <b>2</b></p>
                                    </div>
                                    <div class="flex mb-4 justify-between items-center">
                                        <p
                                            class="text-black focus:ring-4 focus:outline-none  font-medium rounded-lg text-sm px-0 py-0 text-center">
                                            Monnaie:
                                            <select id="money"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg">
                                                <option selected>Money</option>
                                                <option value="US">Euro </option>
                                                <option value="CA">Dollars $</option>
                                                <option value="FR">XAF</option>
                                                <option value="DE">Livre</option>
                                            </select>
                                        </p>
                                        <p
                                            class="text-black focus:ring-4 ml-4 focus:outline-none  font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                            Maximum : <b>4</b></p>
                                    </div>
                                    <div class="justify-between items-center">
                                        <input type="checkbox" id="check" class="w-6 h-6" name="choix" />
                                        <label class="mr-30">Choisir Bouquet</label>
                                    </div>
                                </div>
                            </div>

                            <div class="px-5 p-4 pb-6">
                                <div class="border-radus-3 mb-4">
                                    <div class="flex justify-between items-center">
                                        <img src="{{ asset('/image/assos.jpg') }}" alt=""
                                            class="rounded-lg mr-4 w-40 h-20">
                                        <p class="mr-16 font-bold"><i>Association</i></p>
                                        <p
                                            class="text-black focus:ring-4 focus:outline-none  font-medium rounded-lg text-xl px-5 py-2.5 text-center">
                                            <u>Effectif</u>
                                        </p>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <p
                                            class="text-black focus:ring-4focus:outline-none  font-medium rounded-lg text-sm px-0 py-0 text-center">
                                            Prix : <b><i class="text-xl h-6">8500</i></b>/Personne</p>
                                        <p
                                            class="text-black focus:ring-4 focus:outline-none  font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                            Minimum : <b>10</b></p>
                                    </div>
                                    <div class="flex mb-4 justify-between items-center">
                                        <p
                                            class="text-black focus:ring-4 focus:outline-none  font-medium rounded-lg text-sm px-0 py-0 text-center">
                                            Monnaie:
                                            <select id="money"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg">
                                                <option selected>Money</option>
                                                <option value="US">Euro </option>
                                                <option value="CA">Dollars $</option>
                                                <option value="FR">XAF</option>
                                                <option value="DE">Livre</option>
                                            </select>
                                        </p>
                                        <p
                                            class="text-black focus:ring-4 ml-4 focus:outline-none  font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                            Maximum : <b>20</b></p>
                                    </div>
                                    <div class="justify-between items-center">
                                        <input type="checkbox" id="check" class="w-6 h-6" name="choix" />
                                        <label class="mr-30">Choisir Bouquet</label>
                                    </div>
                                </div>
                            </div>
                            <div class="px-5 p-4 pb-6">
                                <div class="flex justify-between items-center">
                                    <input class=" hidden w-6 h-6" name="choix" />
                                    <p class="mr-16"></p>
                                    <button type="submit" id="button"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none  font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                        Continuer<i class="fas fa-circle-right ml-2"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#form').show();
        $('#button').attr("disabled", true);
        $('#button').css("opacity", "0.5");

        $('#yogan').click(function() {
            $('#form').hide();
            $('#formyog').show();
            $('div, a.yog').css("borde-color", "gray");
        });

        $('#yemba').click(function() {
            $('#formyog').hide();
            $('#form').show();
            $('a.yem').css("border-color", "red");
        });

        $("input[type=checkbox][name=choix]").change(function() {
            if (this.checked) {
                $('#button').attr("disabled", false);
                $('#button').css("opacity", "1");
            } else {
                $('#button').attr("disabled", true);
                $('#button').css("opacity", "0.5");
            }
            console.log(this.checked);
        });
    });
</script>
