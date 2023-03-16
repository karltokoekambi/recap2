@extends('dashboard.layouts.master')

@section('body')
        <h2 class="text-center">ABONNEMENT TAN</h2>
        <div class="flex flex-col mt-6">
            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                    <table class="min-w-full">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Nom</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Prenom</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Date entree</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Abonnement</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Debut</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Fin</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Montant mensuel</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">à rembourser</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white">
                        @foreach($datas as $data)
                            @if($data->abonnement_TAN == 1 || $data->abonnement_TAN == 2)
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $data->nom }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $data->prenom }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $data->date_entree }}</td>
                                    @if($data->abonnement_TAN==1)
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">mensuel</td>
                                    @else
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">annuel</td>
                                    @endif
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $data->debut_abonnement_TAN }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $data->fin_abonnement_TAN }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $data->montant_abonnement_mensuel_TAN }} €</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $data->montant_abonnement_mensuel_TAN/2 }} €</td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <h2 class="text-center">CARTE MCBOOSTER</h2>
        <div class="flex flex-col mt-6">
            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                    <table class="min-w-full">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Nom</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Prenom</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Carte Mcbooster donnee le</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Papier signe</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white">
                        @foreach($datas as $data)
                            @if($data->date_don_carte_McBooster)
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $data->nom }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $data->prenom }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $data->date_don_carte_McBooster }}</td>
                                    @if($data->papier_McBooster_signe)
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">oui</td>
                                    @else
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">non</td>
                                    @endif
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <h2 class="text-center">CARTE COMMERCANT</h2>
        <div class="flex flex-col mt-6">
            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                    <table class="min-w-full">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Nom</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Prenom</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Date d'entree</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" scope="col">Carte donnee le</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white">
                        @foreach($datas as $data)
                            @if($data->date_don_carte_commerçant)
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $data->nom }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $data->prenom }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $data->date_entree }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $data->date_don_carte_commerçant }}</td>
                                </tr>
                            @endif

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
