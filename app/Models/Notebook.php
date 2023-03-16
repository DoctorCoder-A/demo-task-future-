<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notebook extends Model
{
    use HasFactory;

    protected $guarded = false;

    const FILE_DISK = 'local';
    const IMAGE_DIR = 'public';
}
