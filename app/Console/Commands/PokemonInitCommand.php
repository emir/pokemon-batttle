<?php

namespace App\Console\Commands;

use App\Character;
use Illuminate\Console\Command;

class PokemonInitCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pokemon:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initialize command for pokemon characters';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $characters = 'http://pokeapi.co/api/v2/pokemon';
        
        $charactersArr = json_decode(file_get_contents($characters), true);
        
        foreach ($charactersArr['results'] as $character) {
            $explodedUrl = explode('/', $character['url']);
            
            Character::create([
                'pokeapi_id' => $explodedUrl[6],
                'name' => $character['name'],
                'experience' => random_int(1, 100)
            ]);
        }

        $this->line('done!');
    }
}
