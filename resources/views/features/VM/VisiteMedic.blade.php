@extends('dashboard.layouts.master')

@section('body')
    <a href="{{route('vm.create')}}">
        <button class="px-6 py-3 bg-blue-600 rounded-md text-white font-medium tracking-wide hover:bg-blue-500 ml-3">Ajouter une visite médicale</button>
    </a>

        <div class="flex flex-col mt-6">
            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                    <table class="min-w-full">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">NOM</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">PRENOM</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">DATE D'ENTREE</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">VIP</th>
                            @for($i = 1; $i <= $count; $i++)
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">VM {{$i}}</th>
                            @endfor
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">PROCHAINE VM</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">OBSERVATION</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">DEMANDE FAITE LE</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">SAISIE WEBPLACE</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">SUIVI INDIVIDUELLE</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white">
                        @foreach($employes as $j => $employe)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="text-sm leading-5 font-medium text-gray-900">{{ $employe->nom }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="text-sm leading-5 text-gray-900">{{ $employe->prenom }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="text-sm leading-5 text-gray-900">{{ $employe->date_entree->format('d-m-Y') }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    @if($employe->visite_medicale_entree)
                                        <div class="text-sm leading-5 text-gray-900">{{ $employe->visite_medicale_entree->format('d-m-Y') }}</div>
                                    @else
                                        <div class="text-sm leading-5 text-gray-900"></div>
                                    @endif

                                </td>
                                <?php $i = 0; ?>
                                @foreach($visites as $visite)
                                    @if($visite->employe_id == $employe->id)
                                        <?php $i++; ?>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="text-sm leading-5 text-gray-900">{{ $visite->date_visite->format('d-m-Y') }}</div>
                                        </td>
                                    @endif
                                @endforeach
                                @for($u = $i; $u < $count; $u++)
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"></td>
                                @endfor
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    @if($employe->prohaine_VM)
                                        <div class="text-sm leading-5 text-gray-900">{{ $employe->prochaine_VM->format('d-m-Y') }}</div>
                                    @else
                                        <div class="text-sm leading-5 text-gray-900"></div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="text-sm leading-5 text-gray-900">{{ $employe->observations }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    @if($employe->date_demande)
                                        <div class="text-sm leading-5 text-gray-900">{{ $employe->date_demande->format('d-m-Y') }}</div>
                                    @else
                                        <div class="text-sm leading-5 text-gray-900"></div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
{{--                                    <div class="text-sm leading-5 text-gray-900">--}}
{{--                                        {{ $employe->saisie_webplace ? 'Oui' : 'Non' }}--}}
{{--                                    </div>--}}
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" value="" class="sr-only peer" @checked($employe->saisie_webplace)>
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                    </label>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="text-sm leading-5 text-gray-900">{{ $employe->suivi_indiv }}</div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
