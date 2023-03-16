<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotebookRequest;
use App\Models\Notebook;
use App\Models\User;
use App\Service\NotebookService;
use http\Client\Request;
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

    public function store(NotebookRequest $request): JsonResponse
    {
        return response()->json($this->service->addNewNotebook($request->validationData()));
    }

}
