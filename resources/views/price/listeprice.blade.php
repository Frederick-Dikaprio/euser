@extends('layouts.maindo')

@Section('titre')
    Price
@endsection

@Section('content')
    <button id="btn_cr"
        class="bg-green-500 shadow-md hover:bg-green-600 text-white font-bold py-2 px-4 rounded flex float-right items-center fixed right-4 bottom-4">

        <svg class="h-5 w-5 mr-1" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd"
                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                clip-rule="evenodd" />
        </svg>

        Create price
    </button><br><br><br><br>

    <!-- Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal content -->
                <div
                    class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">

                    <form class="bg-white p-6 rounded-lg shadow-md" method="POST" action="{{ route('create.price') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <h2 class="font-bold text-center items-align-center">CREER UN PRIX</h2>
                        <br>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="select">
                                language
                            </label>

                            <select class="form-select w-full border border-gray-300 rounded p-2" name="language"
                                id="language">
                                <option>Yemba</option>
                                <option>Yogan</option>
                                <option>BULU</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="select">
                                currency
                            </label>
                            <select class="form-select w-full border border-gray-300 rounded p-2" name="currency"
                                id="currency">
                                <option>Euro</option>
                                <option>Dollars</option>
                                <option>XAF</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="input1">
                                unit_amount
                            </label>
                            <input class="border border-gray-300 rounded p-2 w-full" name="unit_amount" id="unit_amount"
                                type="text">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="input3">
                                recurring_interval
                            </label>
                            <input class="border border-gray-300 rounded p-2 w-full" name="recurring_interval"
                                id="recurring_interval" type="text">
                        </div>

                        <button
                            class="bg-green-500 text-white px-4 py-2 rounded font-medium hover:bg-green-600">Creer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="relative overflow-x-auto p-4  shadow-md sm:rounded-lg">
        <table class="w-full table table-stripe text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr class="text-center items-align-center">
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Langue
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Device
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Prix unitaire
                    </th>
                    <th scope="col" class="px-6 py-3">
                        recurring_interval
                    </th>
                    <th scope="col" class="px-3 py-1">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($data as $item) --}}
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-center items-align-center">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        1
                    </th>
                    <td class="px-6 py-4">
                        Martir
                    </td>
                    <td class="px-6 py-4">
                        XAF
                    </td>
                    <td class="px-6 py-4">
                        2000
                    </td>
                    <td class="px-6 py-4">
                        2.10
                    </td>

                    <td class="px-6 py-4">
                        <div class="d-flex ml-4">
                            <button id="mod"
                                class="bg-blue-500 text-white px-4 py-2 rounded font-medium hover:bg-blue-600"
                                data-toggle="modal" data-target="#modifP">Modifier</button><br>
                            <button id="sup"
                                class="bg-red-500 text-white px-4 py-2 ml-2 rounded font-medium hover:bg-red-600"
                                data-toggle="modal" data-target="#sup">Supprimer</button>
                        </div>
                    </td>
                </tr>

                <div class="modal fade" id="sup">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal content -->
                            <div
                                class="inline-block align-bottom p-4 bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                <h2 class="font-bold text-center items-align-center">SUPPRIMER UN PRIX</h2><br>
                                <form class="bg-white rounded-lg shadow-md" method="POST"
                                    action="{{ route('delete.price') }}" enctype="multipart/form-data">
                                    @csrf
                                    Je veux supprimer le prix de la langue Yemba 1000$ <br><br>
                                    <button
                                        class="bg-red-500 text-white px-4 py-2 rounded font-medium hover:bg-red-600">Supprimer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="modifP">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal content -->
                            <div
                                class="inline-block align-bottom p-4 bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                <h2 class="font-bold text-center items-align-center">MODIFIER UN PRIX</h2><br>
                                <form class="bg-white rounded-lg shadow-md" method="POST"
                                    action="{{ route('update.price') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-4">
                                        <label class="block text-gray-700 font-bold mb-2" for="select">
                                            language
                                        </label>

                                        <select class="form-select w-full border border-gray-300 rounded p-2"
                                            name="language" id="language">
                                            <option>Yemba</option>
                                            <option>Yogan</option>
                                            <option>BULU</option>
                                        </select>
                                    </div>

                                    <div class="mb-4">
                                        <label class="block text-gray-700 font-bold mb-2" for="select">
                                            currency
                                        </label>
                                        <select class="form-select w-full border border-gray-300 rounded p-2"
                                            name="currency" id="currency">
                                            <option>Euro</option>
                                            <option>Dollars</option>
                                            <option>XAF</option>
                                        </select>
                                    </div>

                                    <div class="mb-4">
                                        <label class="block text-gray-700 font-bold mb-2" for="input1">
                                            unit_amount
                                        </label>
                                        <input class="border border-gray-300 rounded p-2 w-full" name="unit_amount"
                                            id="unit_amount" type="text">
                                    </div>

                                    <div class="mb-4">
                                        <label class="block text-gray-700 font-bold mb-2" for="input3">
                                            recurring_interval
                                        </label>
                                        <input class="border border-gray-300 rounded p-2 w-full" name="recurring_interval"
                                            id="recurring_interval" type="text">
                                    </div>

                                    <button
                                        class="bg-blue-500 text-white px-4 py-2 rounded font-medium hover:bg-blue-600">Modifier</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- @endforeach --}}
            </tbody>
        </table>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('table').DataTable();

            $('#btn_cr').on('click', function() {
                $('#myModal').modal('show');
            });
        });
    </script>
@endsection
