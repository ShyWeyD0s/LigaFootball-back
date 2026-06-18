<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Generar 10 equipos, con 1 presidente y 15 jugadores cada uno
        $teams = \App\Models\Team::factory(10)->create()->each(function ($team) {
            \App\Models\President::factory()->create(['team_id' => $team->id]);
            \App\Models\Player::factory(15)->create(['team_id' => $team->id]);
        });

        // Generar 5 juegos
        $games = \App\Models\Game::factory(5)->create();

        // Para cada juego, asignar 2 equipos y generar algunos goles
        foreach ($games as $game) {
            $gameTeams = $teams->random(2);
            foreach ($gameTeams as $team) {
                \App\Models\TeamGame::factory()->create([
                    'team_id' => $team->id,
                    'game_id' => $game->id,
                ]);
            }

            // Seleccionar algunos jugadores al azar de los 2 equipos para que anoten goles
            $players = \App\Models\Player::whereIn('team_id', $gameTeams->pluck('id'))->get()->random(3);
            
            foreach ($players as $player) {
                \App\Models\Goal::factory()->create([
                    'game_id' => $game->id,
                    'player_id' => $player->id,
                ]);
            }
        }
    }
}
