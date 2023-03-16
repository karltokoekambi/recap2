@extends('dashboard.layouts.master')

@section('body')
    Il faut penser à mettre les cases en fond rouge lorsque la date est depasee
        <h2 class="text-center">ENTRETIENS PRO</h2>
        <button>ajouter un entretien</button>
        <div class="flex flex-col mt-6">
            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                    <table class="min-w-full">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" colspan="3">Tous les 2 ans ou : retour de conge mater, parental, adoption,
                                sabbatique, proche aidant, mobilite volontaire, AM + 6 mois</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" colspan="{{ $countEntretien+1 }}">ENTRETIENS PROFESSIONELS</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" colspan="{{ $countBilan+1 }}">BILAN PROFESSIONNEL</th>
                        </tr>
                        <tr>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">NOM</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">PRENOM</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">DATE D'ENTREE</th>
                            @for($i = 1; $i <= $countEntretien; $i++)
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Entretien {{$i}}</th>
                            @endfor
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">PROCHAINE DATE</th>
                            @for($i = 1; $i <= $countBilan; $i++)
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Bilan {{$i}}</th>
                            @endfor
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">PROCHAINE DATE</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white">
                        @foreach($employes as $j => $employe)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $employe->nom }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $employe->prenom }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $employe->date_entree }}</td>
                                <?php $i = 0; ?>
                                @foreach($entretiens as $entretien)
                                    @if($entretien->employe_id == $employe->id && !$entretien->bilan)
                                        <?php $i++; ?>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $entretien->dateEntretien }}</td>
                                    @endif
                                @endforeach
                                @for($u = $i; $u < $countEntretien; $u++)
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"></td>
                                @endfor
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $employe->prochainedateEntretien }}</td>
                                <?php $i = 0; ?>
                                @foreach($entretiens as $entretien)
                                    @if($entretien->employe_id == $employe->id && $entretien->bilan)
                                        <?php $i++; ?>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $entretien->dateEntretien }}</td>
                                    @endif
                                @endforeach
                                @for($u = $i; $u < $countBilan; $u++)
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"></td>
                                @endfor
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $employe->prochainedateBilan }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
