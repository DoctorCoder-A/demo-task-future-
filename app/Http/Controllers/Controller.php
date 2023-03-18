<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *     title="Demo Task Notebooks",
 *     version="3.0.0",
 * )
 * @OA\Tag(
 *     name="Notebooks",
 *     description="Crud notebook",
 * )
 * @OA\Server(
 *     description="Main",
 *     url="http://localhost/api/v1/notebook/"
 * )
 */


class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
