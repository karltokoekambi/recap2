@extends('dashboard.layouts.master')

@section('body')
        <h2 class="text-center">ACCIDENTS DE TRAVAIL</h2>
        <div class="flex flex-col mt-6">
            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                    <table class="min-w-full">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">NOM</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">PRENOM</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">DATE ACCIDENT</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">TRAJET</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">TRAVAIL</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">COM</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">LESIONS</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">DATE DECLARATION</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">AM DEBUT</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">AM FIN</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">NB JOURS ARRET</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">PRISE EN CHARGE CPAM</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white">
                        @foreach($at as $arret)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $arret->employé_nom }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $arret->employé_prénom }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $arret->date_accident }}</td>
                                @if($arret->lieu == 0)
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">X</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"></td>
                                @else
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"></td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">X</td>
                                @endif
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $arret->commentaire }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $arret->lesions }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $arret->date_declaration }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $arret->date_debut_arret }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $arret->date_fin_arret }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    @php
                                        echo abs(round((strtotime($arret->date_fin_arret) - strtotime($arret->date_debut_arret)) / 86400));
                                    @endphp
                                </td>
                                @if($arret->prise_en_charge_CPAM)
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">OUI</td>
                                @else
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"></td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
