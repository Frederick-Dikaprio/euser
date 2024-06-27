@extends('layouts.component')

@Section('titre')
    Compte
@endsection

@Section('main')
    <div class="mt-20 mx-4">
        <div class="pb-4 px-10 inline-block">
            <a href="{{ url('/profil/user') }}"
                class="w-32 py-2 px-2 rounded-lg shadow-sm text-white bg-gray-500 hover:bg-red-600 font-medium">
                <i class="fas fa-circle-left mr-2"></i>Retour</a>
        </div><br><br>
        <div class="shadow-lg overflow-x-auto relative mx-5 shadow-md sm:rounded-lg">
            <h2 class="py-5 px-12 bg-clip-text text-transparent bg-gradient-to-r from-pink-500 to-violet-500">
                <strong>
                    ETUDIANTS PRESENT DANS LE BOUQUET
                </strong>
            </h2>
            <div class="pb-4 px-10 mb-4 py-1 mt-1 inline-block float-right">
                <a href="{{ url('/search/user') }}"
                    class="w-32 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-green-500 hover:bg-indigo-600 font-medium">
                    <i class="fas fa-plus mr-2"></i>Ajouter apprenant</a>
            </div><br><br>
            <table class="w-full px-12 text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            Langue
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Nom de l'étudiant
                        </th>
                        <th scope="col" class="py-3 px-6">
                            prenom
                        </th>
                        <th scope="col" class="py-3 px-6">
                            numero de téléphone
                        </th>
                        <th scope="col" class="py-3 px-6  text-center">
                            Courriel
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Date de naissance
                        </th>
                        <th scope="col" class="py-3 px-6 text-center">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-gray-100 font-bold">
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            YEMBA
                        </th>
                        <td class="py-4 px-6  text-center">
                            Manick
                        </td>
                        <td class="py-4 px-6  text-center">
                            freez
                        </td>
                        <td class="py-4 px-6  text-center">
                            (+237) 695055384
                        </td>
                        <td class="py-4 px-6  text-center">
                            freedkaprio@gmail.com
                        </td>
                        <td class="py-4 px-6">
                            12-05-1982
                        </td>
                        <td class="py-4 px-6 text-center flex">
                            <button
                                class="w-32 focus:outline-none border border-transparent py-1 px-2 text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg shadow-cyan-500/50"
                                disabled>
                                déjà ajouté</button>
                            <button id="suspendre" type="radio"
                                class="w-32  ml-1 focus:outline-none border border-transparent py-1 px-2 rounded-lg shadow-sm text-center text-white bg-red-500 hover:bg-red-600 font-medium">
                                Suspendre</button>
                        </td>
                    </tr>
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            YEMBA
                        </th>
                        <td class="py-4 px-6  text-center">
                            Manick
                        </td>
                        <td class="py-4 px-6  text-center">
                            freez
                        </td>
                        <td class="py-4 px-6  text-center">
                            (+237) 695055384
                        </td>
                        <td class="py-4 px-6  text-center">
                            freedkaprio@gmail.com
                        </td>
                        <td class="py-4 px-6">
                            12-05-1982
                        </td>
                        <td class="py-4 px-6 text-center flex">
                            <button
                                class="w-32 focus:outline-none border border-transparent py-1 px-2 text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg shadow-cyan-500/50"
                                disabled>
                                déjà ajouté</button>

                            <button
                                class="w-32  ml-1 focus:outline-none border border-transparent py-1 px-2 rounded-lg shadow-sm text-center text-white bg-red-500 hover:bg-red-600 font-medium">
                                Suspendre</button>
                        </td>
                    </tr>
                    <tr class="bg-white dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-200">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            YEMBA
                        </th>
                        <td class="py-4 px-6  text-center">
                            Manick
                        </td>
                        <td class="py-4 px-6  text-center">
                            freez
                        </td>
                        <td class="py-4 px-6  text-center">
                            (+237) 695055384
                        </td>
                        <td class="py-4 px-6  text-center">
                            freedkaprio@gmail.com
                        </td>
                        <td class="py-4 px-6 ">
                            12-05-1982
                        </td>
                        <td class="py-4 px-6 text-center flex">
                            <button
                                class="w-32 focus:outline-none border border-transparent py-1 px-2 text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg shadow-cyan-500/50"
                                disabled>
                                déjà ajouté</button>
                            <button
                                class="w-32  ml-1 focus:outline-none border border-transparent py-1 px-2 rounded-lg shadow-sm text-center text-white bg-red-500 hover:bg-red-600 font-medium">
                                Suspendre</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#suspendre').click(function() {

            if ($('#suspendre').text() == "Rehabilité") {
                $('#suspendre').html('Suspendre');
                $('#suspendre').css("background-color", "red");
                $('#suspendre').css("opacity", "1");
            } else {
                $('#suspendre').html('Rehabilité');
                $('#suspendre').css("background-color", "green");
            }

        });


        $('#manual-ajax').click(function(event) {
            event.preventDefault();
            this.blur(); // Manually remove focus from clicked link.
            $.get(this.href, function(html) {
                $(html).appendTo('body').modal();
            });
        });
    });
</script>
