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
        return $this->authCheck($email, $password) ? ['token' => $this->createAndFetchToken(Auth::user())] : null;
    }

    /**
     * @param $email
     * @param $name
     * @param $password
     * @return mixed
     */
    public function register($email, $name, $password){
        $user = $this->authRepository->register($email, $name, $password);
        return ['token' => $this->createAndFetchToken($user)];
    }

    /**
     * @param $email
     * @param $password
     * @return bool
     */
    public function authCheck($email, $password)
    {
        return Auth::attempt(['email' => $email, 'password' => $password]);
    }

    /**
     * @param $user
     * @return mixed
     */
    public function createAndFetchToken($user)
    {
        return $user->createToken('auth_token')->plainTextToken;
    }
}
