<?php

namespace App\Interfaces;

interface UserRepositoryInterface
{
    public function createUser($name, $email, $password, $organization_name, $phone, $language, $organization_phone);
    public function getSubUsersByParentId($parent_id);
    public function getUserById($id);
    public function createUserWithParentId($request, $vendor_id);
    public function updateUser($request, $id);
    public function deleteUser($id);
    public function changeLanguage(array $data);
}
