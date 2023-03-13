@extends('dashboard.layouts.master')

@section('body')

        <h2 class="text-center">TRAVAIL DE NUIT</h2>
        <button>modifier</button>
        <input type="checkbox">
        <label for="checkbox">Afficher les mecs avec date de sortie</label>
        <select name="years" id="year-select">
            <option value="">choix de l'année</option>
            @foreach($listeAnnées as $année)
                <option value="{{$année}}">{{$année->annee}}</option>
            @endforeach
        </select>

        <div class="flex flex-col mt-6">
            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                    <table class="min-w-full">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" colspan="4"></th>
                            @foreach($listeAnnées as $année)
                                @foreach($listeMois as $mois)
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" colspan="2">{{ $mois }}-{{ $année->annee }}</th>
                                @endforeach
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" colspan="2">TOTAUX</th>
                            @endforeach
                        </tr>
                        <tr>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">NOM</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">PRENOM</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">DATE D'ENTREE</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">DATE DE SORTIE</th>
                            @foreach($listeAnnées as $année)
                                @foreach($listeMois as $i => $mois)
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">HEURES NUIT</th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">NB NUITS PENIBLES</th>
                                @endforeach
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">HEURES NUIT</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">NB NUIT PENIBLES</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody class="bg-white">
                        @foreach($employes as $emp)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $emp->nom }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $emp->prénom }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $emp->date_entree }}</td>
                                @if($emp->date_sortie)
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $emp->date_sortie }}</td>
                                @else
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"></td>
                                @endif
                                @foreach($listeAnnées as $année)
                                    @foreach($listeMois as $i => $mois)
                                        <?php $flag = false; ?>
                                        @foreach($travauxNuit as $trav)
                                            @if($trav->employé_id == $emp->id && $trav->mois == $i && $trav->annee == $année->annee)
                                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $trav->nb_heures }}</td>
                                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $trav->nb_nuits_penibles }}</td>
                                                <?php $flag = true; ?>
                                            @endif
                                        @endforeach
                                        @if(!$flag)
                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"></td>
                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"></td>
                                        @endif
                                    @endforeach
                                    @foreach($ttlheures as $ttl)
                                        <?php $flag = false; ?>
                                        @if($ttl->employé_id == $emp->id && $ttl->annee == $année->annee)
                                            @if($ttl->ttlheures>359)
                                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 table-danger">{{ $ttl->ttlheures }}</td>
                                            @else()
                                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $ttl->ttlheures }}</td>
                                            @endif
                                            @if($ttl->ttlnuits>119)
                                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 table-danger">{{ $ttl->ttlnuits }}</td>
                                            @else()
                                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $ttl->ttlnuits }}</td>
                                            @endif
                                            <?php $flag = true; ?>
                                            @break($flag)
                                        @endif
                                    @endforeach
                                    @if(!$flag)
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"></td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"></td>
                                    @endif
                                @endforeach
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
