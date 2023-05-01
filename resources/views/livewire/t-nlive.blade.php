<div>
    <h2 class="text-center">TRAVAIL DE NUIT</h2>
    <select class="px-6 py-3 rounded-md font-medium tracking-wide ml-3" name="year" wire:model="year">
        @for($i = $yearScope['debut']; $i <= $yearScope['fin']; $i++)
            <option value="{{ $i }}">{{ $i }}</option>
        @endfor
    </select>

    <div class="flex flex-col mt-6">
        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                <table class="min-w-full">
                    <thead>
                    <tr>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" colspan="4"></th>
                        @foreach($listeMois as $mois)
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider text-center" colspan="2">{{ $mois }}</th>
                        @endforeach
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" colspan="2">TOTAUX</th>
                    </tr>
                    <tr>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">NOM</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">PRENOM</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">DATE D'ENTREE</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">DATE DE SORTIE</th>
                        @foreach($listeMois as $mois)
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">HEURES NUIT</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">NB NUITS PENIBLES</th>
                        @endforeach
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">HEURES NUIT</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">NB NUIT PENIBLES</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white">
                    @foreach($datas as $data)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $data['nom'] }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $data['prenom'] }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $data['date_entree'] }}</td>
                            @if($data['date_sortie'])
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $data['date_sortie'] }}</td>
                            @else
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"></td>
                            @endif
                            @foreach($listeMois as $m => $mois)
                                @if(isset($data['heures'][$m]['hrs']))
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $data['heures'][$m]['hrs'] }}</td>
                                @else
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"></td>
                                @endif
                                @if(isset($data['heures'][$m]['nts']))
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $data['heures'][$m]['nts'] }}</td>
                                    @else
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"></td>
                                    @endif
                            @endforeach
                            @if($data['ttlHrs'])
                                @if($data['ttlHrs']>359)
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 table-danger">{{ $data['ttlHrs'] }}</td>
                                @else
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $data['ttlHrs'] }}</td>
                                @endif
                            @else
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"></td>
                            @endif
                            @if($data['ttlNts'])
                                @if($data['ttlNts']>119)
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 table-danger">{{ $data['ttlNts'] }}</td>
                                @else()
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $data['ttlNts'] }}</td>
                                @endif
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
