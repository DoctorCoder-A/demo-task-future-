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

    /**
     * @param array $validated
     * @return mixed
     */
    public function addNewNotebook(array $validated): Notebook
    {
        return Notebook::create($validated);
    }

    /**
     * @param int $id
     * @return Notebook
     */
    public function showNotebook(int $id): Notebook
    {
        return Notebook::findOrFail($id);
    }

    public function updateNotebook(int $id, $validated)
    {
        Notebook::findOrFail($id)->update($validated);
        return Notebook::findOrFail($id);
    }
}
