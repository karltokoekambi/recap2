@extends('dashboard.layouts.master')

@section('body')
    <h2 class="text-center">ETRANGERS</h2>
    <div class="flex flex-col mt-6">
        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                <table class="min-w-full">
                    <thead>
                    <tr>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Nom</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Prenom</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Date entrée</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Début de Validité</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Fin de Validité</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Volume autorisé</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Total effectué en cours</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Reprise </th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Janvier</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Février</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Mars</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Avril</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Mai</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Juin</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Juillet</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Août</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Septembre</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Octobre</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Novembre</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Décembre</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white">
                    @foreach($etrangers as $i => $etranger)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $etranger->nom }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $etranger->prénom }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $etranger->nationalité }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $etranger->debut_validité }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $etranger->fin_validité }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">964h/an</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">ttl avec reprise comprise</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">reprise à calculer ça va être chaud</td>
                            @for($i = 1; $i <= 12; $i++)
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    @foreach($heuresEtrangers as $heureEtranger )
                                        @if($heureEtranger->mois == $i && $heureEtranger->employé_id == $etranger->id && $heureEtranger->année == 2023)
                                            {{ $heureEtranger->nb_heures_effectuées }}
                                        @endif
                                    @endforeach
                                </td>
                            @endfor
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <h2 class="text-center">MINEURS</h2>
    <div class="flex flex-col mt-6">
        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                <table class="min-w-full">
                    <thead>
                    <tr>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Nom</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Prenom</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Date de naissance</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Date d'entrée</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Sera majeur(e) le </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white">
                    @foreach($mineurs as $mineur)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $mineur->nom }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $mineur->prénom }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $mineur->date_de_naissance }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $mineur->date_entree }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                @php
                                    $date = new DateTime($mineur->date_de_naissance);
                                    $date->add(new DateInterval('P18Y'));
                                    echo $date->format('d-m-Y');
                                @endphp
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <h2 class="text-center">TRAVAILLEURS AVEC RQTH</h2>
    <div class="flex flex-col mt-6">
        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                <table class="min-w-full">
                    <thead>
                    <tr>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Nom</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Prenom</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Fin RQTH</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white">
                    @foreach($rqths as $rqth)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $rqth->nom }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $rqth->prénom }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $rqth->date_fin_RQTH }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
