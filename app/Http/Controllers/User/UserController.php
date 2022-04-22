<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Http\Services\User\StoreService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * @param StoreRequest $request
     * @param StoreService $service
     * @return JsonResponse
     */
    public function store(StoreRequest $request, StoreService $service): JsonResponse
    {
        $user = $service->store(
            $request->all()
        );

        return new JsonResponse([
            'user' => $user,
        ], Response::HTTP_OK);
    }
}
