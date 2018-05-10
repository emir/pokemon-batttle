<?php

namespace App\Console\Commands;

use App\Character;
use Illuminate\Console\Command;

class PokemonExperienceUpdateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pokemon:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update character experience';

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
        $characters = Character::all();
        
        foreach ($characters as $character) {
            $character->experience = random_int(1, 100);
            $character->save();
        }
        
        $this->line('done!');
    }
}
