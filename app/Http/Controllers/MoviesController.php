<?php

namespace App\Http\Controllers;

use App\Http\Resources\MovieResource;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $movies = Movie::all();
        $movies->load('genres');

        return MovieResource::collection($movies);

        // $page = request('page', 1); // Get the requested page from the request, default to 1
        // $perPage = 2; // Number of items per page

        // // Calculate the offset for the slice
        // $offset = ($page - 1) * $perPage;

        // // Get a slice of the collection based on the offset and items per page
        // $paginatedMovies = $movies->slice($offset, $perPage);

        // // Return the paginated response
        // return MovieResource::collection($paginatedMovies);

        // $query = $request->input('search');

        // // Ako postoji query parametar za pretragu
        // if ($query) {
        //     $movies = Movie::where('title', 'LIKE', "%$query%")->get();
        //     return MovieResource::collection($movies);
        // }
    
        // // Ako nema query parametra, vrati sve filmove
        // $movies = Movie::with('genres')->get();
        
        // $page = $request->input('page', 1);
        // $perPage = 2;
    
        // $offset = ($page - 1) * $perPage;
        // $paginatedMovies = $movies->slice($offset, $perPage);
    
        // return MovieResource::collection($paginatedMovies);

        // $query = $request->input('search');
        // $genre = $request->input('genre');
    
        // // Ako postoji query parametar za pretragu po imenu filma
        // if ($query) {
        //     $movies = Movie::where('title', 'LIKE', "%$query%")->get();
        //     $genres = Genre::where('name', 'LIKE', "%$query%")->get();
    
        //     return [
        //         'movies' => MovieResource::collection($movies),
        //     ];
        // }
    
        // // Ako postoji query parametar za pretragu po žanru
        // if ($genre) {
        //     $genre = Genre::where('name', $genre)->with('movies')->first();
    
        //     if ($genre) {
        //         $movies = $genre->movies;
        //         return [
        //             'movies' => MovieResource::collection($movies),
        //         ];
        //     }
        // }
    
        // // Ako nema query parametra, vrati sve filmove
        // $movies = Movie::with('genres')->get();
        
        // $page = $request->input('page', 1);
        // $perPage = 2;
    
        // $offset = ($page - 1) * $perPage;
        // $paginatedMovies = $movies->slice($offset, $perPage);
    
        // return [
        //     'movies' => MovieResource::collection($paginatedMovies),
        // ];
        // $query = $request->input('search');
        // $genre = $request->input('genre');
    
        // $moviesQuery = Movie::query();
    
        // // Ako postoji query parametar za pretragu po imenu filma
        // if ($query) {
        //     $moviesQuery->where('title', 'LIKE', "%$query%");
        // }
    
        // // Ako postoji query parametar za pretragu po žanru
        // if ($genre) {
        //     $moviesQuery->whereHas('genres', function ($query) use ($genre) {
        //         $query->where('name', $genre);
        //     });
        // }
    
        // // Dobijanje paginiranih rezultata
        // $perPage = $request->input('per_page', 2);
        // $filteredMovies = $moviesQuery->paginate($perPage);
    
        // // Vraćanje paginiranih rezultata
        // return [
        //     'movies' => MovieResource::collection($filteredMovies),
        // ];
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $movie = Movie::with('genres')->find($id);

        return new MovieResource($movie);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
