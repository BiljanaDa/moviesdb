<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        $movies = Movie::factory(10)->create();

        // Get all genres
        $genres = Genre::all();
        
        foreach ($movies as $movie) {
            
            $movie->genres()->sync($genres->random(rand(1, $genres->count()))->pluck('id')->toArray());
        }
        
        
    }
}
