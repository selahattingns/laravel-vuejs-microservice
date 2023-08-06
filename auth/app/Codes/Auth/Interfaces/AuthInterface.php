<?php
namespace App\Codes\Auth\Interfaces;

interface AuthInterface {

    /**
     * @param $email
     * @param $name
     * @param $password
     * @return mixed
     */
    public function register($email, $name, $password);
}
