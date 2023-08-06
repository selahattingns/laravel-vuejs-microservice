<?php
namespace App\Codes\Auth\Interfaces;

interface AuthInterface {

    /**
     * @param $email
     * @return mixed
     */
    public function emailCheck($email);

    /**
     * @param $email
     * @param $name
     * @param $password
     * @return mixed
     */
    public function register($email, $name, $password);
}
