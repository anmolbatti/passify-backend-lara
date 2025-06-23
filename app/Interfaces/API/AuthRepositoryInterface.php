<?php

namespace App\Interfaces\API;

interface AuthRepositoryInterface{
    public function changeLanguage(array $data);
    public function forgetPassword($data);
    public function delete();
    public function readById(array $data);
    public function updatePassword(array $data);
    public function getUserInfo();
}