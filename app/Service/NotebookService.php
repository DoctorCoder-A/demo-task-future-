<?php

namespace App\Service;

use App\Models\Notebook;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

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
        $this->uploadImage(request()->file('photo'));
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
        $notebook = Notebook::findOrFail($id);
        if(isset($validated['photo'])){
            $this->deleteImage($notebook->photo);
        }
        $this->uploadImage(request()->file('photo'));
        return $notebook->update($validated);
    }

    public function destroyNotebook(mixed $id): bool
    {
        $notebook = Notebook::findOrFail($id);
        $this->deleteImage($notebook->photo);
        return $notebook->delete();
    }

    private function uploadImage(?UploadedFile $file): ?string
    {
        if(is_null($file)){
            return null;
        }

        $filename = time().$file->getClientOriginalName();

        Storage::disk('public')->put('categories-imgs/' . $filename, $file);

        return $filename;

    }
    private function deleteImage($path): void
    {
        Storage::disk(Notebook::FILE_DISK)->delete($path);
    }
}
