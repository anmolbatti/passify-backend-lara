<?php

namespace App\Interfaces\API;

interface PassRepositoryInterface{
    public function storeDesign($data);
    public function storeDetails($data);
    public function storeFields($data);
    public function updatePassLocation($data);
    // public function storeLocation($data);
    public function readById($id);
    public function storeNewLocation(array $data);
    public function publish(array $data);
    public function readByUser($offset,$limit);
    public function updateDesignById($data);
    public function detailById($id);
    public function deleteById($id);
    public function deleteLocation($id);
    public function getCards();
    // public function deletePassLocation($data);
    public function readLocationsOfUser($pass_id);
}
