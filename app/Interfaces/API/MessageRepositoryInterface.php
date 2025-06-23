<?php

namespace App\Interfaces\API;

interface MessageRepositoryInterface{
    public function getMessageHistory();
    public function passUserList($id);
}

