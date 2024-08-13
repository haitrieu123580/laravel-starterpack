<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\Auth\AuthServiceInterface;

class AuthController extends Controller
{
    public function __construct(
        private readonly AuthServiceInterface $authService,
    ) {
        $this->middleware(['jwt.auth'], ['except' => ['login', 'register']]);
    }
    /**
     * @OA\Post(
     *     path="/api/v1/auth/login",
     *     tags={"auth"},
     *     summary="Logs user into system",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"email", "password"},
     *             @OA\Property(property="email", type="string", example="admin@admin.vn"),
     *             @OA\Property(property="password", type="string", example="password")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid username/password supplied"
     *     )
     * )
     */

    public function login(LoginRequest $request)
    {
        return $this->authService->login($request);
    }

    public function logout()
    {
        return $this->authService->logout();
    }

    public function refresh()
    {
        return $this->authService->refreshToken();
    }

    public function me()
    {
        return $this->authService->getCurrentUser();
    }

    public function register(RegisterRequest $request)
    {
        return $this->authService->register($request);
    }
}
