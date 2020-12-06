<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pagination;
use App\Http\Requests\User\Create;
use App\Http\Requests\User\Update;
use App\Http\Resources\V1\User\Resource;
use App\Http\Resources\V1\User\Resources;
use App\Services\User\Eloquent\CrudService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class CrudController extends Controller
{
    protected CrudService $crudService;

    public function __construct(CrudService $crudService)
    {
        $this->crudService = $crudService;
    }

    public function index(Pagination $paginationRequest): JsonResponse
    {
        ['limit' => $limit, 'offset' => $offset] = $paginationRequest->validated();
        $users = $this->crudService->findAll($limit, $offset);
        $resources = new Resources($users);
        return new JsonResponse($resources, Response::HTTP_OK);
    }

    public function store(Create $request): JsonResponse
    {
        $data = $request->validated();
        $user = $this->crudService->create($data);
        return new JsonResponse(new Resource($user), Response::HTTP_OK);
    }

    public function show(int $id): JsonResponse
    {
        $user = $this->crudService->find($id);
        return new JsonResponse(new Resource($user), Response::HTTP_OK);
    }

    public function update(Update $request, int $id): JsonResponse
    {
        $data = $request->validated();
        $user = $this->crudService->update($id, $data);
        return new JsonResponse(new Resource($user), Response::HTTP_OK);
    }

    public function destroy(int $id): JsonResponse
    {
        $result = $this->crudService->delete($id);
        return new JsonResponse(['success' => $result], Response::HTTP_OK);
    }
}
