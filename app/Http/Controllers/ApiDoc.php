<?php

namespace App\Http\Controllers;

/**
 * @OA\Info (
 *      version="0.0.1",
 *      x={
 *          "logo": {
 *              "url": "https://via.placeholder.com/190x90.png?text=L5-Swagger"
 *          }
 *      },
 *      title="L5 OpenApi",
 *      description="L5 Swagger OpenApi description",
 *      @OA\License (
 *         name="Apache 2.0",
 *         url="https://www.apache.org/licenses/LICENSE-2.0.html"
 *      )
 * )
 * @OA\Tag (
 *     name="Movies",
 *     description="Anything you can do with movies",
 * )
 * @OA\Tag (
 *     name="User",
 *     description="Get your user informations",
 * )
 * @OA\Get (
 *     path="/api/movies",
 *     tags={"Movies"},
 *     summary="Get one random movie",
 *     @OA\Response (response="200", description="One random movie",
 *          @OA\JsonContent(
 *                @OA\Examples(example="result", summary="Result json", value={"en_title": "Out Of The Furnace", "release_date":"2013", "synopsis": "When Rodney Baze mysteriously disappears and law enforcement doesn't follow through fast enough, his older brother, Russell, takes matters into his own hands to find justice.", "fr_title": "Les Brasiers De La Colère",
"de_title": "Auge Um Auge",
"es_title": "Out Of The Furnace",
"it_title": "Il Fuoco Della Vendetta - Out Of The Furnace",
"ja_title": "ファーナス/訣別の朝",
"zh_title": "逃出熔炉",
"ru_title": "Из пекла",
"slug": "out-of-the-furnace", }),
 *          )
 *      )
 * )
 * @OA\Post (
 *      path="/api/movies",
 *      tags={"Movies"},
 *      summary="Create a new movie (Need an api token)",
 *     description="<b>THIS ACTION IS FOR DOCUMENTATION ONLY, PLEASE USE IT FROM WITHIN THE APP OR YOUR OWN ONLY.</b> <br /> Required fields are <b>en_title</b>, <b>synopsis</b> and <b>release_date</b>. Optionnal fields are <b>fr_title</b>, <b>es_title</b>, <b>de_title</b>, <b>it_title</b>, <b>ja_title</b>, <b>ru_title</b>, <b>zh_title</b>",
 *     security={ {"sanctum": {} } },
 *     @OA\RequestBody (
 *          @OA\MediaType (mediaType="application/json",
 *              @OA\Schema (
 *              required={"en_title", "synopsis", "release_date"},
 *                  @OA\Property (
 *                      property="en_title",
 *                      type="string",),
 *                  @OA\Property (
 *                      property="synopsis",
 *                      type="string"),
 *                  @OA\Property (
 *                      property="release_date",
 *                      type="string"),
 *                  @OA\Property (
 *                      property="fr_title",
 *                      type="string"),
 *              ),
 *           example={"en_title": "Out Of The Furnace", "synopsis": "When Rodney Baze mysteriously disappears and law enforcement doesn't follow through fast enough, his older brother, Russell, takes matters into his own hands to find justice.", "release_date": "2013", "fr_title":"Les brasiers de la colère", "de_title": "Auge Um Auge",
"es_title": "Out Of The Furnace",
"it_title": "Il Fuoco Della Vendetta - Out Of The Furnace",
"ja_title": "ファーナス/訣別の朝",
"zh_title": "逃出熔炉",
"ru_title": "Из пекла",}
 *           ),
 *      ),
 *     @OA\Response (response="409",description="Movie already exists", @OA\JsonContent(
 *     @OA\Examples(example="result", summary="Result json", value="A Movie resource already exists with this en_title"),)),
 *     @OA\Response (response="201",description="Movie created", @OA\JsonContent(
 *          @OA\Examples(example="result", summary="Result json", value={"en_title": "Out Of The Furnace", "slug": "out-of-the-furnace", "synopsis": "When Rodney Baze mysteriously disappears and law enforcement doesn't follow through fast enough, his older brother, Russell, takes matters into his own hands to find justice.", "release_date": "2013", "fr_title":"Les brasiers de la colère", "de_title": "Auge Um Auge",
"es_title": "Out Of The Furnace",
"it_title": "Il Fuoco Della Vendetta - Out Of The Furnace",
"ja_title": "ファーナス/訣別の朝",
"zh_title": "逃出熔炉",
"ru_title": "Из пекла",
 *     }),
 *     )),
 * )
 *  * @OA\Get (
 *     path="/api/movies/{movie}",
 *     tags={"Movies"},
 *     summary="Get one movie resource",
 *     @OA\Parameter (
 *     description="Slug of the movie",
 *     in="path",
 *     name="movie",
 *     required=true,
 *     @OA\Schema(type="string"),
 *     @OA\Examples(example="Out Of The Furnace", value="out-of-the-furnace", summary="Out Of The Furnace sluggified"),
 *      ),
 *
 *     @OA\Response (response="200", description="The movie resource",
 *          @OA\JsonContent(
 *                @OA\Examples(example="result", summary="Result json", value={"en_title": "Out Of The Furnace", "release_date":"2013", "synopsis": "When Rodney Baze mysteriously disappears and law enforcement doesn't follow through fast enough, his older brother, Russell, takes matters into his own hands to find justice.", "fr_title": "Les Brasiers De La Colère",
"de_title": "Auge Um Auge",
"es_title": "Out Of The Furnace",
"it_title": "Il Fuoco Della Vendetta - Out Of The Furnace",
"ja_title": "ファーナス/訣別の朝",
"zh_title": "逃出熔炉",
"ru_title": "Из пекла",
"slug": "out-of-the-furnace", }),
 *          )
 *      )
 * )
 * @OA\Patch (
 *      path="/api/movies/{movie}",
 *      tags={"Movies"},
 *      summary="Update a movie title (Need an api token)",
 *     description="<b>THIS ACTION IS FOR DOCUMENTATION ONLY, PLEASE USE IT FROM WITHIN THE APP OR YOUR OWN ONLY.</b> <br /> One or multiple fields from <b>fr_title</b>, <b>es_title</b>, <b>de_title</b>, <b>it_title</b>, <b>ja_title</b>, <b>ru_title</b> or <b>zh_title</b>",
 *     security={ {"sanctum": {} } },
 *     @OA\Parameter (
 *     description="Slug of the movie",
 *     in="path",
 *     name="movie",
 *     required=true,
 *     @OA\Schema(type="string"),
 *     @OA\Examples(example="Out Of The Furnace", value="out-of-the-furnace", summary="Out Of The Furnace sluggified"),
 *      ),
 *     @OA\RequestBody (
 *          @OA\MediaType (mediaType="application/json",
 *              @OA\Schema (),
 *           example={"fr_title":"Les brasiers de la colère"}
 *           ),
 *      ),
 *     @OA\Response (response="200",description="Movie title updated",  @OA\JsonContent(
 *                @OA\Examples(example="result", summary="Result json", value={"en_title": "Out Of The Furnace", "release_date":"2013", "synopsis": "When Rodney Baze mysteriously disappears and law enforcement doesn't follow through fast enough, his older brother, Russell, takes matters into his own hands to find justice.", "fr_title": "Les Brasiers De La Colère",
"de_title": "Auge Um Auge",
"es_title": "Out Of The Furnace",
"it_title": "Il Fuoco Della Vendetta - Out Of The Furnace",
"ja_title": "ファーナス/訣別の朝",
"zh_title": "逃出熔炉",
"ru_title": "Из пекла",
"slug": "out-of-the-furnace", }),
 *          )),
 * )
 *  @OA\Get (
 *      path="/api/user",
 *      tags={"User"},
 *      summary="Get your user information (Need a token api)",
 *     description="Retrieve user object",
 *     security={ {"sanctum": {} } },
 * @OA\Response (response="200",description="user and userToken object"),
 *      ),
 */
class ApiDoc
{
}
