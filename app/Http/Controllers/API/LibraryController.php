<?php

namespace App\Http\Controllers\APi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Library;

class LibraryController extends Controller
{
    public function index()
    {
        try{
            $data = Library::all();
            return ['status' => true, 'data' => $data];

        }catch (\Exception $e){
            return ['status' => false, 'error' => $e->getMessage()];
        }
    }

    public function details($id)
    {
        try{
            $data = Library::where('id', $id)->first();
            return ['status' => true, 'data' => $data];
        }catch (\Exception $e){
            return ['status' => false, 'error' => $e->getMessage()];
        }
    }
}
