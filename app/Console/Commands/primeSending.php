<?php

namespace App\Console\Commands;

use App\Mail\PACmail;
use App\Models\Employe;
use App\Models\TypeAbsence;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class primeSending extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:prime-sending';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envoie par mail le PAC des équipiers';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {

        //$paclive = new Paclive();

        //1an <= durée < 3ans
        $lowerPrime = 178.5;
        //3an <= durée < 5ans
        $mediumLowPrime = 242;
        //5an <= durée < 10ans
        $mediumHighPrime = 326.7;
        //10an <= durée
        $upperPrime = 447.7;

        $dataEmployees = Employe::select('id','nom','prenom','date_entree','date_sortie')
            ->where('date_sortie', null)
            ->where('date_entree', '<', date('Y-m-d', strtotime('-1 year')))
            ->get();
        dd($dataEmployees);
        $typesAbsences = TypeAbsence::all();
        //CP -> id = 4

        $this->info('Envoie du PAC en cours...');
        $data = [
            'title' => 'PAC',
            'content' => 'des primes',
        ];
        Mail::to('hello@exemple.com')->send(new PACmail($data));
    }
}
