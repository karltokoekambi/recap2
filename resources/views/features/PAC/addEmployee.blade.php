@extends('dashboard.layouts.master')

@section('body')
    <div class="p-6 bg-white rounded-md shadow-md">
        <h2 class="text-lg text-gray-700 font-semibold capitalize">Details employe</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pac.save') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
                <div>
                    <label class="text-gray-700" for="name">Nom</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="text" name="name">
                </div>

                <div>
                    <label class="text-gray-700" for="firstname">Prenom</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="text" name="firstname">
                </div>

                <div>
                    <label class="text-gray-700" for="birthdate">Date de naissance</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="date" name="birthdate">
                </div>

                <div>
                    <label class="text-gray-700" for="indate">Date d'entree</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="date" name="indate">
                </div>

                <div>
                    <label class="text-gray-700" for="poste">Poste</label>
                    <select class="form-input w-full mt-2 rounded-md focus:border-indigo-600" name="poste">
                    @foreach($postes as $poste)
                        <option value="{{ $poste->id }}">{{ $poste->intitule }}</option>
                    @endforeach
                    </select>
                </div>

                <div>
                    <label class="text-gray-700" for="rqth">Date de fin RQTH</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="date" name="rqth">
                </div>

            </div>
            <br>

            <h4 class="text-gray-600">Si etranger</h4>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
                <div>
                    <label class="text-gray-700" for="nationality">Nationalite</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="text" name="nationality">
                </div>

                <div>
                    <label class="text-gray-700" for="startvisa">Debut de validite visa</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="date" name="startvisa">
                </div>

                <div>
                    <label class="text-gray-700" for="endvisa">Fin de validite visa</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="date" name="endvisa">
                </div>

                <div>
                    <label class="text-gray-700" for="numSec">Numero de Securite sociale provisoire</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="number" name="numSec">
                </div>

            </div>

            <div class="flex justify-end mt-4">
                <button type="submit" class="px-4 py-2 bg-gray-800 text-gray-200 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">Ajouter</button>
            </div>
        </form>
    </div>
@endsection
