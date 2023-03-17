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

        <form action="{{ route('disc.save') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
                <div>
                    <label class="text-gray-700" for="employee">Employé</label>
                    <select class="form-input w-full mt-2 rounded-md focus:border-indigo-600" name="employee">
                        @foreach($employes as $emp)
                            <option value="{{ $emp->id }}">{{ $emp->nom }} {{ $emp->prenom }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                </div>

                <div>
                    <label class="text-gray-700" for="convigven">Convocation remise</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="date" name="convgiven">
                </div>

                <div>
                    <label class="text-gray-700" for="convdate">Date convocation</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="date" name="convdate">
                </div>

                <div>
                    <label class="text-gray-700" for="allegedfacts">Faits reprochés</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="text" name="allegedfacts">
                </div>

                <div>
                    <label class="text-gray-700" for="sanction">Sanction</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="text" name="sanction">
                </div>

                <div>
                    <label class="text-gray-700" for="notifdate">Date notification</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="date" name="notifdate">
                </div>

            </div>
            <br>

            <div class="flex justify-end mt-4">
                <button type="submit" class="px-4 py-2 bg-gray-800 text-gray-200 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">Ajouter</button>
            </div>
        </form>
    </div>
@endsection
