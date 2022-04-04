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
        $movies = Movie::all();
        //        $movies = Movie::orderBy('title')->take(3)->get();
        return new Response($movies->toJson(JSON_PRETTY_PRINT));
    }

    /**
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        // TODO: voir comment gérer l'upload d'image si on veut créer un film https://laravel.com/docs/9.x/authorization#creating-policies
        // $request = json with 'original_title', 'synopsis' & 'release_date', 'en_title' AND 'fr_title' AND OR 'es_title' AND OR 'it_title'...
        if (Movie::create(['original_title' => $request['original_title'],
                           'slug'           => Str::slug($request['en_title']),
                           'synopsis'       => $request['synopsis'],
                           'release_date'   => $request['release_date'],
                           'en_translation' => $request['en_title'],
                           'fr_translation' => $request['fr_title'],
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
     * Display the specified resource.
     * @param String
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|Movie|object $movie
     */
    public function show(string $movie_slug) {
        // TODO: if primary key becomes slug, change where to find
        return Movie::where('slug', '=', $movie_slug)->first();
    }

    /**
     * Update the specified resource in storage.
     * @param \Illuminate\Http\Request $request
     * @param String
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie) {
        //TODO: tester si on peut changer la primary key de movies de id à slug sans casser un truc
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
