@extends('dashboard.layouts.master')

@section('body')
    <div class="p-6 bg-white rounded-md shadow-md">
        <h2 class="text-lg text-gray-700 font-semibold capitalize">Details accident travail</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('at.save') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
                <div>
                    <label class="text-gray-700" for="employee">Employé</label>
                    <select class="form-input w-full mt-2 rounded-md focus:border-indigo-600" name="employee">
                        @foreach($employes as $employe)
                            <option value="{{ $employe->id }}">{{ $employe->nom }} {{ $employe->prenom }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="text-gray-700" for="accdate">Date accident</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="date" name="accdate">
                </div>

                <div>
                    <label class="text-gray-700" for="decdate">Date déclaration</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="date" name="decdate">
                </div>

                <div>
                    <label class="text-gray-700" for="place">Lieu</label>
                    <select class="form-input w-full mt-2 rounded-md focus:border-indigo-600" name="place">
                        <option value="1" selected>Restaurant</option>
                        <option value="0">Trajet</option>
                    </select>
                </div>

                <div>
                    <label class="text-gray-700" for="commentary">Commentaire</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="text" name="commentary">
                </div>

                <div>
                    <label class="text-gray-700" for="lesion">Lesions</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="text" name="lesion">
                </div>

                <div>
                    <label class="text-gray-700" for="begdate">Date début arret</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="date" name="begdate">
                </div>

                <div>
                    <label class="text-gray-700" for="enddate">Date fin arret</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="date" name="enddate">
                </div>

                <div>
                    <label class="text-gray-700" for="CPAM">
                        <input type="hidden" name="CPAM" value="0">
                        <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" value="1" name="CPAM"><span class="ml-2 text-gray-700">Prise en charge CPAM</span>
                    </label>
                </div>

            </div>

            <div class="flex justify-end mt-4">
                <button type="submit" class="px-4 py-2 bg-gray-800 text-gray-200 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">Ajouter</button>
            </div>
        </form>
    </div>

@endsection
