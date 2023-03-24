<div>
    <a href="{{route('pac.create')}}">
        <button class="px-6 py-3 bg-blue-600 rounded-md text-white font-medium tracking-wide hover:bg-blue-500 ml-3">Ajouter un employé</button>
    </a>

    <a href="{{route('pac.contractcreate')}}">
        <button class="px-6 py-3 bg-blue-600 rounded-md text-white font-medium tracking-wide hover:bg-blue-500 ml-3">Ajouter une modification de contrat</button>
    </a>

    <a href="{{route('pac.abscreate')}}">
        <button class="px-6 py-3 bg-blue-600 rounded-md text-white font-medium tracking-wide hover:bg-blue-500 ml-3">Ajouter des absences</button>
    </a>

    <select class="px-6 py-3 rounded-md font-medium tracking-wide ml-3" name="year" wire:model="year">
        @for($i = $yearScope['debut']; $i <= $yearScope['fin']; $i++)
            <option value="{{ $i }}">{{ $i }}</option>
        @endfor
    </select>

    <select class="px-6 py-3 rounded-md font-medium tracking-wide ml-3" name="selection" wire:model="selection">
        <option value="0">Heures Contrat</option>
        @foreach($absences as $abs)
            <option value="{{ $abs->id }}">{{ $abs->libelle }}</option>
        @endforeach
    </select>

    <div class="flex flex-col mt-6">
        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                <table class="min-w-full">
                    <thead>
                    <tr>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Prenom</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Date entree</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Date sortie</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Janvier</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Fevrier</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Mars</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Avril</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Mai</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Juin</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">juillet</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Août</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Septembre</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Octobre</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Novembre</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Decembre</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Total</th>
                    </tr>
                    </thead>

                    <tbody class="bg-white">
                    @foreach($employes as $emp)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="ml-4">
                                    <div class="text-sm leading-5 font-medium text-gray-900">{{ $emp->nom }}</div>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="text-sm leading-5 text-gray-900">{{ $emp->prenom }}</div>
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="text-sm leading-5 text-gray-900">{{ $emp->date_entree->format('d-m-Y') }}</div>
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                @if($emp->date_sortie)
                                    <div class="text-sm leading-5 text-gray-900">{{ $emp->date_sortie->format('d-m-Y') }}</div>
                                @else
                                    <div class="text-sm leading-5 text-gray-900"></div>
                                @endif
                            </td>
                            @for($j = 1; $j <= 12; $j++)
                                <?php $flag = false ?>
                                @foreach($contrats as $i => $con)
                                    @if($emp->id == $i)
                                        @foreach($con as $c)
                                            @if($j<10 && str_contains($c->date, $year.'-0'.$j.'-')!== false || $j>=10 && str_contains($c->date, $year.'-'.$j.'-')!== false)
                                                <?php $flag = true ?>
                                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">{{ $c->nb }}</td>
                                            @endif
                                            @endforeach
                                        @endif
                                @endforeach
                                @if(!$flag)
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500"></td>
                                    @endif
                            @endfor
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500"></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
