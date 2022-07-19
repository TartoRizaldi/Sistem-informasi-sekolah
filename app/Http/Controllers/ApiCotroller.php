<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiCotroller extends Controller
{
    public function editnilai(Request $request, $id)
    {
    	return $request->all();
    }
}
