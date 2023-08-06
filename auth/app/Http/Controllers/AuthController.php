<?php

namespace App\Http\Controllers;

use App\Codes\Auth\Services\AuthService;
use App\Http\Requests\AuthLoginRequest;
use App\Http\Requests\AuthRegisterRequest;

class AuthController extends Controller
{
    /**
     * @var AuthService
     */
    private $authService;

    /**
     * AuthController constructor.
     * @param AuthService $authService
     */
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * @param AuthLoginRequest $request
     * @return mixed
     */
    public function login(AuthLoginRequest $request)
    {
        return $this->authService->login($request->email, $request->password);
    }

    /**
     * @param AuthRegisterRequest $request
     * @return mixed
     */
    public function register(AuthRegisterRequest $request)
    {
        return $this->authService->register($request->email, $request->name, $request->password);
    }
}
