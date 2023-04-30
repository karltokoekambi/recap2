<x-mail::message>
# Primes annuelles conventionnelles

Les primes annuelles conventionnelles sont calculées en fonction des heures et des absences du salarié.

<x-mail::panel>
Primes annuelles conventionnelles relatives à l'année {{ $annee }}.
</x-mail::panel>

<x-mail::table>
    | Employé      | Date d'entrée         | montant Prime  |
    | :------------ |:------------- | :------- |
    @foreach($primes as $prime)
        | {{ $prime['name'] }}      | {{ $prime['date'] }}      | {{ $prime['prime'] }} €     |
    @endforeach
</x-mail::table>
Merci,<br>
</x-mail::message>
