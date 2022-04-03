<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $movies = Movie::all();
        //        $movies = Movie::orderBy('title')->take(3)->get();
        return new Response($movies->toJson());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // TODO: Create CONTRIBUTOR rights to create a movie (à voir comment tu vas gérer les images) https://laravel.com/docs/9.x/authorization#creating-policies
        // $request = json with 'original_title', 'synopsis' & 'release_date', 'en_title' AND 'fr_title' AND OR 'es_title' AND OR 'it_title'...
        if (Movie::create(['original_title' => $request['original_title'], 'slug' => Str::slug($request['en_title']),
                           'synopsis' => $request['synopsis'], 'release_date' => $request['release_date'],
                           'en_translation' => $request['en_title'], 'fr_translation' => $request['fr_title'],
                           'de_translation' => $request['de_title'], 'es_translation' => $request['es_title'],
                           'it_translation' => $request['it_title'], 'ja_translation' => $request['ja_title'],
                           'zh_translation' => $request['zh_title'], 'ru_translation' => $request['ru_title']])) {
            return new Response('', 200);
        } else {
            return new Response('', 403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param String
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|Movie|object $movie
     */
    public function show(string $movie_slug)
    {
        return Movie::where('slug', '=', $movie_slug)->first();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Movie $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        // TODO: Create CONTRIBUTOR rights to add translation to a movie https://laravel.com/docs/9.x/authorization#creating-policies
        // $request = json with 'fr_title' AND OR 'es_title' AND OR 'it_title'...
        // $movie = movies.id
        if ($movie->update(['fr_translation' => $request['fr_title'], 'de_translation' => $request['de_title'],
                            'es_translation' => $request['es_title'], 'it_translation' => $request['it_title'],
                            'ja_translation' => $request['ja_title'], 'zh_translation' => $request['zh_title'],
                            'ru_translation' => $request['ru_title']])) {
            return new Response('', 200);
        } else {
            return new Response('', 403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Movie $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        // TODO: Create ADMIN rights to delete a movie https://laravel.com/docs/9.x/authorization#creating-policies
    }
}
