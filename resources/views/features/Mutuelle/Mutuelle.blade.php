@extends('dashboard.layouts.master')

@section('body')
        <h2 class="text-center">MUTUELLE</h2>
        <button>ajouter une mutuelle</button>
        <input type="checkbox">
        <label for="checkbox">Afficher les mecs avec date de sortie</label>
        <div class="flex flex-col mt-6">
            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                    <table class="min-w-full">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">NOM</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">PRENOM</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">DATE D'ENTREE</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">REGIME</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">CADRE</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">CONJOINT</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">ENFANTS</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white">
                        @foreach($mutuelles as $mutu)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $mutu->nom }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $mutu->prénom }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $mutu->date_entree }}</td>
                                <?php $flag = false; ?>
                            @foreach($listeRegimes as $regime)
                                @if($regime->employé_id == $mutu->id)
                                    @foreach($typesMutuelle as $type)
                                        @if($type->id == $regime->mutuelle_id)
                                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $type->intitulé }}</td>
                                            <?php $flag = true; ?>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            @if(!$mutu->cadre || !$flag)
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"></td>
                                @endif
                                @if($mutu->cadre)
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">OUI</td>
                                @endif
                            <?php $flag = false; ?>
                                @foreach($listeRegimes as $regime)
                                    @if($regime->employé_id == $mutu->id)
                                        @foreach($typesMutuelle as $type)
                                            @if($type->id == $regime->mutuelle_id)
                                                @if($regime->conjoint)
                                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">CJT</td>
                                                @else
                                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"></td>
                                                @endif
                                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $regime->nb_enfants }}</td>
                                                <?php $flag = true; ?>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                                @if(!$flag)
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"></td>
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
