<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use App\Http\Services\Role\GetService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class RoleController extends Controller
{
    /**
     * @param GetService $service
     * @return JsonResponse
     */
    public function get(GetService $service): JsonResponse
    {
        return new JsonResponse([
            'roles' => $service->get(),
        ], Response::HTTP_OK);
    }
}
