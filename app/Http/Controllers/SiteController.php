<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class SiteController extends Controller
{
	public function home()
	{
		$posts  = Post::all();
		return view('sites.home',compact(['posts'])); 
	}

	public function about()
	{
		return view('sites.about');
	}

	public function register()
	{
		return view('sites.register');
	}

	public function postregister(Request $request)
	{
		//Input pendaftaran sebagai user
		$user = new \App\User;
        $user->role = 'siswa';
        $user->name = $request->nama_depan;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        $request->request->add(['user_id' => $user->id ]);
        $siswa = \App\Siswa::create($request->all());

        return redirect('/')->with('sukses','Data registrasi berhasil dibuat');
	}

	public function singlepost($slug)
	{
		$post = Post::where('slug','=',$slug)->first();
		return view('sites.singlepost',compact(['post']));
	}
}

    