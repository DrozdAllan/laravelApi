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
 * @OA\Get (
 *     path="/api/movies",
 *     tags={"Movies"},
 *     summary="Get one random movie",
 *     @OA\Response (response="200", description="One random movie")
 * )
 * @OA\Post (
 *      path="/api/movies",
 *      tags={"Movies"},
 *      summary="Create a new movie",
 *     description="Required fields are en_title, synopsis and release_date. Optionnal fields are fr_title, es_title, de_title, it_title, ja_title, ru_title, zh_title",
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
 *           example={"en_title": "Out Of The Furnace", "synopsis": "When Rodney Baze mysteriously disappears and law enforcement doesn't follow through fast enough, his older brother, Russell, takes matters into his own hands to find justice.", "release_date": "2013", "fr_title":"Les brasiers de la colère"}
 *           ),
 *      ),
 *     @OA\Response (response="200",description="Movie created", @OA\JsonContent()),
 * )
 */
class ApiDoc
{
    //TODO: https://www.jetbrains.com/help/phpstorm/openapi.html#remote-spec
    //TODO: verify the accent formatting in the api doc like for Lat den ratte komma in
}