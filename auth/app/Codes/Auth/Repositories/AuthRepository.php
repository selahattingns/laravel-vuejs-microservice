<?php
namespace App\Codes\Auth\Repositories;

use App\Codes\Auth\Interfaces\AuthInterface;
use App\Models\User;

class AuthRepository implements AuthInterface {
    /**
     * @var
     */
    private $model;

    /**
     * AuthRepository constructor.
     * @param User $model
     */
    public function __construct(User $model){
        $this->model = $model;
    }

    /**
     * @param $email
     * @param $name
     * @param $password
     * @return mixed
     */
    public function register($email, $name, $password){
        return $this->model->query()->create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
        ]);
    }
}
