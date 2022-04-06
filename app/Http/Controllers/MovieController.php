<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class MovieController extends Controller
{
    public function __construct() {
        $this->authorizeResource(Movie::class, 'movie');
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $movies = Movie::inRandomOrder()->first();
        return new Response($movies->toJson(JSON_PRETTY_PRINT));
    }

    /**
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        // TODO: voir comment gérer l'upload d'image si on veut créer un film https://laravel.com/docs/9.x/authorization#creating-policies
        // $request = json with 'en_title', 'synopsis' & 'release_date' AND 'fr_title' AND OR 'es_title' AND OR 'it_title'...
        if (Movie::create(['en_title'       => $request['en_title'],
                           'slug'           => Str::slug($request['en_title']),
                           'synopsis'       => $request['synopsis'],
                           'release_date'   => $request['release_date'],
                           'fr_title' => $request['fr_title'],
                           'de_title' => $request['de_title'],
                           'es_title' => $request['es_title'],
                           'it_title' => $request['it_title'],
                           'ja_title' => $request['ja_title'],
                           'zh_title' => $request['zh_title'],
                           'ru_title' => $request['ru_title']])) {
            return new Response('', 200);
        } else {
            return new Response('', 403);
        }
    }

    /**
     * Display the specified resource.
     * @param Movie $movie
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|Movie|Movie[]|null $movie
     */
    public function show(Movie $movie) {
        return Movie::find($movie)->first();
    }

    /**
     * Update the specified resource in storage.
     * @param \Illuminate\Http\Request $request
     * @param String
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie) {
        dd('can add translations');
        $movie = Movie::where('slug', '=', $movie_slug)->first();

        // $request = json with 'fr_title' AND OR 'es_title' AND OR 'it_title'...
        if ($movie->update(['fr_translation' => $request['fr_title'],
                            'de_translation' => $request['de_title'],
                            'es_translation' => $request['es_title'],
                            'it_translation' => $request['it_title'],
                            'ja_translation' => $request['ja_title'],
                            'zh_translation' => $request['zh_title'],
                            'ru_translation' => $request['ru_title']])) {
            return new Response('', 200);
        } else {
            return new Response('', 403);
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param \App\Models\Movie $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie) {
        // TODO: test if only ADMINISTRATOR can delete
    }
}
