@extends('dashboard.layouts.master')

@section('body')
{{--    <h2 class="text-center">ETRANGERS</h2>--}}
{{--    <div class="flex flex-col mt-6">--}}
{{--        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">--}}
{{--            <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">--}}
{{--                <table class="min-w-full">--}}
{{--                    <thead>--}}
{{--                    <tr>--}}
{{--                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Nom</th>--}}
{{--                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Prenom</th>--}}
{{--                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Date entree</th>--}}
{{--                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Debut de Validite</th>--}}
{{--                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Fin de Validite</th>--}}
{{--                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Volume autorise</th>--}}
{{--                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Total effectue en cours</th>--}}
{{--                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Reprise </th>--}}
{{--                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Janvier</th>--}}
{{--                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Fevrier</th>--}}
{{--                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Mars</th>--}}
{{--                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Avril</th>--}}
{{--                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Mai</th>--}}
{{--                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Juin</th>--}}
{{--                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Juillet</th>--}}
{{--                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Août</th>--}}
{{--                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Septembre</th>--}}
{{--                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Octobre</th>--}}
{{--                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Novembre</th>--}}
{{--                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Decembre</th>--}}
{{--                    </tr>--}}
{{--                    </thead>--}}
{{--                    <tbody class="bg-white">--}}
{{--                    @foreach($equipiers as $i => $etranger)--}}
{{--                        @if(isset($etranger->nationalite))--}}
{{--                            <tr>--}}
{{--                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $etranger->nom }}</td>--}}
{{--                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $etranger->prenom }}</td>--}}
{{--                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $etranger->nationalite }}</td>--}}
{{--                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $etranger->debut_validite->format('d-m-Y') }}</td>--}}
{{--                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $etranger->fin_validite->format('d-m-Y') }}</td>--}}
{{--                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">964h/an</td>--}}
{{--                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">ttl avec reprise comprise</td>--}}
{{--                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">reprise à calculer ça va être chaud</td>--}}
{{--                                @for($i = 1; $i <= 12; $i++)--}}
{{--                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">--}}
{{--                                        @foreach($heuresEtrangers as $heureEtranger )--}}
{{--                                            @if($heureEtranger->mois == $i && $heureEtranger->employe_id == $etranger->id && $heureEtranger->annee == 2023)--}}
{{--                                                {{ $heureEtranger->nb_heures_effectuees }}--}}
{{--                                            @endif--}}
{{--                                        @endforeach--}}
{{--                                    </td>--}}
{{--                                @endfor--}}
{{--                            </tr>--}}
{{--                        @endif--}}
{{--                    @endforeach--}}
{{--                    </tbody>--}}
{{--                </table>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
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
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Date d'entree</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Sera majeur(e) le </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white">
                    @foreach($equipiers as $mineur)
                        @if($mineur->date_naissance->diffInYears(Carbon\Carbon::now()) < 18)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $mineur->nom }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $mineur->prenom }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $mineur->date_naissance->format('d-m-Y') }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $mineur->date_entree->format('d-m-Y') }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    @php
                                        $date = new DateTime($mineur->date_naissance);
                                        $date->add(new DateInterval('P18Y'));
                                        echo $date->format('d-m-Y');
                                    @endphp
                                </td>
                            </tr>
                        @endif
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
                    @foreach($equipiers as $rqth)
                        @if(isset($rqth->date_fin_RQTH))
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $rqth->nom }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $rqth->prenom }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $rqth->date_fin_RQTH->format('d-m-Y') }}</td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
