<?php

namespace App\Http\Controllers;

use App\Codes\Auth\Services\AuthService;
use App\Helpers\RedirectHelper;
use App\Http\Requests\AuthLoginRequest;
use App\Http\Requests\AuthRegisterRequest;
use Illuminate\Http\Request;

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
        if ($data = $this->authService->loginAndFetchToken($request->email, $request->password))
            return RedirectHelper::success(__('success'), $data);
        return RedirectHelper::unprocessableEntity(__('auth.invalidCredentials'));
    }

    /**
     * @param AuthRegisterRequest $request
     * @return mixed
     */
    public function register(AuthRegisterRequest $request)
    {
        if ($data = $this->authService->registerAndFetchToken($request->email, $request->name, $request->password)){
            return RedirectHelper::token($data);
        }return RedirectHelper::unprocessableEntity(__('auth.registrationAlreadyAvailable'));
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function tokenCheck(Request $request)
    {
        return response()->json($this->authService->tokenCheck($request->header('user_id')));
    }
}
