<?php
namespace App\Codes\Auth\Services;

use App\Codes\Auth\Interfaces\AuthInterface;
use Illuminate\Support\Facades\Auth;

class AuthService{
    /**
     * @var
     */
    private $authRepository;

    /**
     * AuthService constructor.
     * @param AuthInterface $authRepository
     */
    public function __construct(AuthInterface $authRepository){

        $this->authRepository = $authRepository;
    }

    /**
     * @param $email
     * @param $password
     * @return mixed
     */
    public function login($email, $password){
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $user = Auth::user();
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json(['token' => $token], 200);
        }

        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    /**
     * @param $email
     * @param $name
     * @param $password
     * @return mixed
     */
    public function register($email, $name, $password){
        $user = $this->authRepository->register($email, $name, $password);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['token' => $token], 200);
    }
}
