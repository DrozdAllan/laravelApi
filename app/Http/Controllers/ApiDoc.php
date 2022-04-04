<?php

namespace App\Http\Controllers;

/**
 * @OA\Info(
 *      version="0.0.1",
 *      x={
 *          "logo": {
 *              "url": "https://via.placeholder.com/190x90.png?text=L5-Swagger"
 *          }
 *      },
 *      title="L5 OpenApi",
 *      description="L5 Swagger OpenApi description",
 *      @OA\Contact(
 *          email="darius@matulionis.lt"
 *      ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="https://www.apache.org/licenses/LICENSE-2.0.html"
 *     )
 * )
 *  * @OA\Tag(
 *     name="Movies",
 *     description="Anything you can do with movies",
 * )
 * @OA\Get (
 *     path="/api/movies",
 *     tags={"Movies"},
 *     description="Get all movies",
 *     @OA\Parameter (name="number",description="movies to retrieve (min: 1, max: 5)",required=true,in="query"),
 *     @OA\Schema (type="integer"),
 *     @OA\Response(response="200", description="Movies collection")
 * )
 */
class ApiDoc
{
    //TODO: https://www.jetbrains.com/help/phpstorm/openapi.html#remote-spec
    //TODO: verify the accent formatting in the api doc like for Lat den ratte komma in
}