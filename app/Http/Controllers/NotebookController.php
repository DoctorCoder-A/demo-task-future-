<?php

namespace App\Http\Controllers;

use App\Models\Notebook;
use App\Service\NotebookService;
use Illuminate\Http\JsonResponse;

class NotebookController extends Controller
{
    private NotebookService $service;

    public function __construct(NotebookService $service)
    {
        $this->service = $service;
    }

    public function index(): JsonResponse
    {
        return response()->json($this->service->index(), 200);
    }

}
