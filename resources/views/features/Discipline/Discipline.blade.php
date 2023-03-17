@extends('dashboard.layouts.master')

@section('body')
        <h2 class="text-center">DISCIPLINE</h2>
        <a href="{{route('disc.create')}}">
            <button class="px-6 py-3 bg-blue-600 rounded-md text-white font-medium tracking-wide hover:bg-blue-500 ml-3">Ajouter</button>
        </a>
        <div class="flex flex-col mt-6">
            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                    <table class="min-w-full">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">NOM</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">PRENOM</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">CONVOCATION REMISE</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">DATE CONVOCATION</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">FAITS REPROCHES</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">SANCTION</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">DATE NOTIFICATION</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white">
                        @foreach($discipline as $disc)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $disc->employe_nom }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $disc->employe_prenom }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $disc->remise_convocation }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $disc->date_convocation }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $disc->faits_reproches }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $disc->sanction }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $disc->date_notification }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
