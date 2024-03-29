<div>
    <a href="{{route('at.create')}}">
        <button class="px-6 py-3 bg-blue-600 rounded-md text-white font-medium tracking-wide hover:bg-blue-500 ml-3">Ajouter un accident</button>
    </a>
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
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $arret->employe_nom }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $arret->employe_prenom }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $arret->date_accident->format('d-m-Y') }}</td>
                            @if($arret->lieu == 0)
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                    </svg>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"></td>
                            @else
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"></td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                    </svg>
                                </td>
                            @endif
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $arret->commentaire }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $arret->lesions }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $arret->date_declaration->format('d-m-Y') }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $arret->date_debut_arret->format('d-m-Y') }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $arret->date_fin_arret->format('d-m-Y') }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                @php
                                    echo abs(round((strtotime($arret->date_fin_arret) - strtotime($arret->date_debut_arret)) / 86400));
                                @endphp
                            </td>
                            @if($arret->prise_en_charge_CPAM)
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                    </svg>
                                </td>
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
</div>
