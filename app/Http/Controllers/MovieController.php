<?php

namespace App\Http\Controllers;

use App\Http\Resources\MovieResource;
use App\Models\Movie;
use Illuminate\Http\JsonResponse;
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
     * @return MovieResource
     */
    public function index(Request $request) {
        return new MovieResource(Movie::inRandomOrder()
                                      ->first());
    }

    /**
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     * @return Movie|\Illuminate\Database\Eloquent\Model|JsonResponse|Response
     */
    public function store(Request $request) {
        // $request = json with 'en_title', 'synopsis' & 'release_date' AND 'fr_title' AND OR 'es_title' AND OR 'it_title'...

        // check if movie already exist (by en_title)
        if (Movie::where('en_title','=', $request['en_title'])->first()) {
            return new JsonResponse('A Movie resource already exists with this en_title', 409);
        }
        $movie = Movie::create(['en_title'     => $request['en_title'],
                                'slug'         => Str::slug($request['en_title']),
                                'synopsis'     => $request['synopsis'],
                                'release_date' => $request['release_date'],
                                'fr_title'     => $request['fr_title'],
                                'de_title'     => $request['de_title'],
                                'es_title'     => $request['es_title'],
                                'it_title'     => $request['it_title'],
                                'ja_title'     => $request['ja_title'],
                                'zh_title'     => $request['zh_title'],
                                'ru_title'     => $request['ru_title']]);
        if ($movie) {
            return $movie;
        } else {
            return new Response('error', 403);
        }
    }

    /**
     * Display the specified resource.
     * @param Movie $movie
     * @return MovieResource $movie
     */
    public function show(Movie $movie) {
        return new MovieResource(Movie::find($movie)
                                      ->first());
    }

    /**
     * Update the specified resource in storage.
     * @param \Illuminate\Http\Request $request
     * @param String
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie) {
        // $request = json with 'fr_title' OR 'es_title' AND OR 'it_title'...

        $movie = Movie::find($movie)
                      ->first();

        foreach ($request->request as $newLanguage => $newTitle) {
            if ($movie->update([$newLanguage => $newTitle])) {
                return new Response('', 200);
            } else {
                return new Response('', 403);
            }
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
