@extends('dashboard.layouts.master')

@section('body')
    <h3>reste à ajouter modification/suppression des disciplines</h3>
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
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"></th>
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
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <a href="{{route('disc.edit',$disc->id)}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                    </a>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $disc->employe_nom }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $disc->employe_prenom }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $disc->remise_convocation }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $disc->date_convocation->format('d-m-Y') }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $disc->faits_reproches }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $disc->sanction }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $disc->date_notification->format('d-m-Y') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
