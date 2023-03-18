<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *   description="Notebook model",
 *   title="Notebook",
 *   required={},
 *   @OA\Property(type="integer",description="id of Notebook",title="id",property="id",example="1",readOnly="true"),
 *   @OA\Property(type="string",description="full_name of Notebook",title="full_name",property="full_name",example="Notebook"),
 *   @OA\Property(type="string",description="company of Notebook",title="company",property="company",example="Compay"),
 *   @OA\Property(type="string",description="email of Notebook",title="email",property="email",example="email@email.email"),
 *   @OA\Property(type="date",description="brithday of Notebook",title="birthday",property="birthday",example="12.12.12"),
 *   @OA\Property(type="string",description="photo of Notebook",title="photo",property="photo",example="/dir/1.jpg"),
 *   @OA\Property(type="string",description="phone of Notebook",title="phone",property="phone",example="9999999999"),
 *   @OA\Property(type="dateTime",title="created_at",property="created_at",example="2022-07-04T02:41:42.336Z",readOnly="true"),
 *   @OA\Property(type="dateTime",title="updated_at",property="updated_at",example="2022-07-04T02:41:42.336Z",readOnly="true"),
 * )
 *
 * @OA\Schema(
 *   schema="Notebooks",
 *   title="Notebooks",
 *   @OA\Property(title="data",property="data",type="array",
 *     @OA\Items(type="object",ref="#/components/schemas/Notebook"),
 *   )
 * )
 *
 * @OA\Parameter(
 *      parameter="Notebook--id",
 *      in="path",
 *      name="id",
 *      required=true,
 *      description="Id of Notebook",
 *      @OA\Schema(
 *          type="integer",
 *          example="1",
 *      )
 * ),
 */

class Notebook extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'company',
        'email',
        'birthday',
        'photo',
        'phone',
    ];

    const FILE_DISK = 'local';
    const IMAGE_DIR = 'public';
}
