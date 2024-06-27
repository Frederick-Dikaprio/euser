@extends('layouts.component')

@Section('titre')
    Find User
@endsection

@Section('main')
    <!-- component -->
    <style>
        .top-100 {
            top: 100%
        }

        .bottom-100 {
            bottom: 100%
        }

        .max-h-select {
            max-height: 300px;
        }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet" />
    <div class="mt-20 mx-4">
        <div class="pb-4 px-10 inline-block">
            <a href="{{ url('student/compte') }}"
                class="w-32 py-2 px-2 rounded-lg shadow-sm text-white bg-gray-500 hover:bg-red-600 font-medium">
                <i class="fas fa-circle-left mr-2"></i>Retour</a>
        </div>
        <div class="flex flex-col items-center">
            <div class="w-full md:w-1/2 flex flex-col items-center h-64">
                <div class="w-full">
                    <div class="flex flex-col items-center relative">
                        <div class="w-full">
                            <label class="inline-block text-sm text-gray-600 bg-clip-text text-transparent bg-gradient-to-r from-pink-500 to-violet-500" for="Multiselect"><b>Choisir les étudiants à ajouter à ce bouquet</b></label><br><br>
                            <form method="POST" class="w-full" enctype="multipart/form-data">
                                @csrf
                                <div class="block w-full rounded-sm cursor-pointer focus:outline-none">
                                    <select id="select-role" name="roles[]" multiple placeholder="Rechercher l'apprenant..."
                                        autocomplete="off" class="block w-full rounded-sm cursor-pointer focus:outline-none"
                                        >
                                        <option value="1">super admin</option>
                                        <option value="2">admin</option>
                                        <option value="3">writer</option>
                                        <option value="4">user</option>
                                        <option value="5">BOLO Frederic</option>
                                        <option value="6">Christian CHUENTE</option>
                                        <option value="7">Tony NGOY</option>
                                    </select>
                                </div>
                                <div class="mt-2">
                                    <button type="submit"
                                        class="w-32 float-right focus:outline-none border border-transparent py-1 px-2 text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg shadow-cyan-500/50">
                                        Ajouter</button>
                                </div>
                            </form>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
    <script>
        new TomSelect('#select-role', {
            maxItems: 100,
        });
    </script>
@endsection
