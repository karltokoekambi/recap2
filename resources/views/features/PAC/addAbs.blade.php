@extends('dashboard.layouts.master')

@section('body')
    <div class="p-6 bg-white rounded-md shadow-md">
        <h2 class="text-lg text-gray-700 font-semibold capitalize">Details Absences</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pac.abssave') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
                <div>
                    <label class="text-gray-700" for="type">Type d'absence</label>
                    <select class="form-input w-full mt-2 rounded-md focus:border-indigo-600" name="type">
                        @foreach($typesAbs as $type)
                            <option value="{{ $type->id }}">{{ $type->libelle }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="text-gray-700" for="date">Date</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="date" name="date" required>
                </div>

                <div class="flex flex-col mt-6">
                    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                        <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                            <table class="min-w-full">
                                <thead>
                                <tr>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Prenom</th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Nombres de jours d'absence</th>
                                </tr>
                                </thead>
                                <tbody class="bg-white">
                                @foreach($employes as $emp)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="ml-4">
                                                <div class="text-sm leading-5 font-medium text-gray-900">{{ $emp->nom }}</div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="text-sm leading-5 text-gray-900">{{ $emp->prenom }}</div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="number" name="hours.{{ $emp->id }}">
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <br>

            <div class="flex justify-end mt-4">
                <button type="submit" class="px-4 py-2 bg-gray-800 text-gray-200 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">Ajouter</button>
            </div>
        </form>
    </div>
@endsection
