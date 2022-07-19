<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guru;
use App\User;

class GuruController extends Controller
{
    public function profile($id)
    {
    	$guru = Guru::find($id);
    	return view('guru.profile',['guru' => $guru]);
    }

    public function index(){
        $data = Guru::all();
        return view("guru.index")->with(["guru" => $data]);
    }

    public function create(Request $req){
        $data["nama"] = $req->nama;
        $data["alamat"] = $req->alamat;
        $data["telepon"] = $req->telepon;
        $data["user_id"] = NULL; 
        $g=Guru::create($data);
        
        $data2["email"] = $req->email;
        $data2["name"] = $req->nama;
        $data2["password"] = bcrypt('87654321');
        $data2["role"] = "admin";
        $u=User::create($data2);
        
        $g->update(["user_id" => $u->id]);

        return redirect()->back();
    }

    public function destroy($id){

        $guru = Guru::find($id);
        $user = User::find($guru->user_id)->delete();
        $guru->delete();

        return redirect()->back();
                
    }
}
