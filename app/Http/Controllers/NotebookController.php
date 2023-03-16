<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotebookStoreRequest;
use App\Http\Requests\NotebookUpdateRequest;
use App\Service\NotebookService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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

    public function store(NotebookStoreRequest $request): JsonResponse
    {
        return response()->json($this->service->addNewNotebook($request->validationData()));
    }

    public function show(Request $request): JsonResponse
    {
        return response()->json($this->service->showNotebook($request->id));
    }
    public function update(NotebookUpdateRequest $request): JsonResponse
    {
        return response()->json($this->service->updateNotebook($request->id, $request->validationData()));
    }
    public function destroy(Request $request): JsonResponse
    {
        return response()->json($this->service->destroyNotebook($request->id));
    }

}
