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
     * @return mixed|null
     */
    public function loginAndFetchToken($email, $password)
    {
        $user = $this->login($email, $password);
        return $user ? $this->createTokenAndFetchToken($user) : null;
    }

    /**
     * @param $email
     * @param $name
     * @param $password
     * @return mixed
     */
    public function registerAndFetchToken($email, $name, $password)
    {
        $user = $this->register($email, $name, $password);
        return $user ? $this->createTokenAndFetchToken($user) : null;
    }

    /**
     * @param $email
     * @param $password
     * @return mixed
     */
    public function login($email, $password){
        return $this->authCheck($email, $password) ? Auth::user() : null;
    }

    /**
     * @param $email
     * @param $name
     * @param $password
     * @return mixed
     */
    public function register($email, $name, $password){
        return empty($this->authRepository->emailCheck($email)) ? $this->authRepository->register($email, $name, $password) : null;
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
    public function createTokenAndFetchToken($user)
    {
        return $user ? $user->createToken('auth_token')->plainTextToken : null;
    }
}
