<?php

namespace App\Interfaces;

interface LocationRepositoryInterface{
    public function store(array $data);
    public function read();
    public function remove($id);
    public function readById(array $data);
}