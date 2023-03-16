<?php

namespace App\Service;

use App\Models\Notebook;
use Illuminate\Database\Eloquent\Collection;

class NotebookService
{
    /**
     * @return array
     */
    public function index(): array
    {
        $notebooks = Notebook::paginate(5);
        return $notebooks->items();
    }
}
