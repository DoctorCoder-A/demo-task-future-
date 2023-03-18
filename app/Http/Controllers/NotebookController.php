<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotebookStoreRequest;
use App\Http\Requests\NotebookUpdateRequest;
use App\Service\NotebookService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class NotebookControllerController
 * @package  App\Http\Controllers
 */
class NotebookController extends Controller
{
    private NotebookService $service;

    public function __construct(NotebookService $service)
    {
        $this->service = $service;
    }

    /**
     * @OA\Get(
     *  path="/",
     *  operationId="indexNotebook",
     *  tags={"Notebooks"},
     *  summary="Get list of Notebook",
     *  description="Returns list of Notebook",
     * @OA\Parameter(
     *     name="page",
     *     in="query",
     *     description="The page number",
     *     required=false,
     *     @OA\Schema(
     *         type="integer",
     *     )
     * ),
     *  @OA\Response(response=200, description="Successful operation",
     *    @OA\JsonContent(ref="#/components/schemas/Notebooks"),
     *  ),
     * )
     *
     * Display a listing of Notebook.
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json($this->service->index(), 200);
    }

    /**
     * @OA\Post(
     *  operationId="storeNotebook",
     *  summary="Insert a new Notebook",
     *  description="Insert a new Notebook",
     *  tags={"Notebooks"},
     *  path="/",
     *  @OA\RequestBody(
     *    description="Notebook to create",
     *    required=true,
     *    @OA\MediaType(
     *      mediaType="application/json",
     *      @OA\Schema(
     *      @OA\Property(
     *      title="data",
     *      property="data",
     *      type="object",
     *      ref="#/components/schemas/Notebook")
     *     )
     *    )
     *  ),
     *  @OA\Response(response="201",description="Notebook created",
     *     @OA\JsonContent(
     *      @OA\Property(
     *       title="data",
     *       property="data",
     *       type="object",
     *       ref="#/components/schemas/Notebook"
     *      ),
     *    ),
     *  ),
     *  @OA\Response(response=422,description="Validation exception"),
     *  @OA\Response(response=401,description="Unauthorized"),
     * )
     *
     * @param NotebookStoreRequest $request
     * @return JsonResponse
     */
    public function store(NotebookStoreRequest $request): JsonResponse
    {
        return response()->json($this->service->addNewNotebook($request->validationData()), 201);
    }

    /**
     * @OA\Get(
     *   path="/{id}",
     *   summary="Show a Notebook from his Id",
     *   description="Show a Notebook from his Id",
     *   operationId="showNotebook",
     *   tags={"Notebooks"},
     *   @OA\Parameter(ref="#/components/parameters/Notebook--id"),
     *   @OA\Response(
     *     response=200,
     *     description="Successful operation",
     *       @OA\JsonContent(
     *       @OA\Property(
     *       title="data",
     *       property="data",
     *       type="object",
     *       ref="#/components/schemas/Notebook"
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response="404",description="Notebook not found"),
     * )
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function show(Request $request): JsonResponse
    {
        return response()->json($this->service->showNotebook($request->id));
    }

    /**
     * @OA\Patch(
     *   operationId="updateNotebook",
     *   summary="Update an existing Notebook",
     *   description="Update an existing Notebook",
     *   tags={"Notebooks"},
     *   path="/{id}",
     *   @OA\Parameter(ref="#/components/parameters/Notebook--id"),
     *   @OA\Response(response="204",description="No content"),
     *   @OA\RequestBody(
     *     description="Notebook to update",
     *     required=true,
     *     @OA\MediaType(
     *       mediaType="application/json",
     *       @OA\Schema(
     *        @OA\Property(
     *        title="data",
     *        property="data",
     *        type="object",
     *        ref="#/components/schemas/Notebook")
     *      )
     *     )
     *   )
     * )
     *
     * @param NotebookUpdateRequest $request
     * @return JsonResponse
     */
    public function update(NotebookUpdateRequest $request): JsonResponse
    {
        return response()->json($this->service->updateNotebook($request->id, $request->validationData()));
    }

    /**
     * @OA\Delete(
     *  path="/{id}",
     *  summary="Delete a Notebook",
     *  description="Delete a Notebook",
     *  operationId="destroyNotebook",
     *  tags={"Notebooks"},
     *  @OA\Parameter(ref="#/components/parameters/Notebook--id"),
     *  @OA\Response(response=204,description="No content"),
     *  @OA\Response(response=404,description="Notebook not found"),
     * )
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function destroy(Request $request): JsonResponse
    {
        return response()->json($this->service->destroyNotebook($request->id));
    }

}
