<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Str;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use App\Siswa;
use Auth;

class SiswaController extends Controller
{
    public function index (Request $request)
    {
        if($request->has('cari')){
            $data_siswa = \App\Siswa::with("kelas")->where('nama_depan','LIKE','%'.$request->cari.'%')->orderBy("NIS", "DESC")->paginate(20);
        }else {
            $data_siswa = \App\Siswa::with("kelas")->orderBy("NIS", "ASC")->get();
            // dd($data_siswa);
        }

        //dd($data_siswa);

    	return view('siswa.index',['data_siswa' => $data_siswa, 'kelas' => \App\Kelas::all()]);
    }
    public function create (Request $request)
    {   

        $this->validate($request,[
            'nama_depan' => 'required|min:5',
            'nama_belakang' => 'required',
            'email' => 'required|email|unique:users',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'avatar' => 'mimes:jpg,png',
        ]);
        //Insert ke table User
    	$user = new \App\User;
        $user->role = 'siswa';
        $user->name = $request->nama_depan;
        $user->email = $request->email;
        $user->password = bcrypt('87654321');
        $user->remember_token = str::random(60);
        $user->save();

        //Insert ke table Siswa
        $request->request->add(['user_id' => $user->id]);
        $siswa = \App\Siswa::create($request->all());
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }else{
            $siswa->avatar = "none";
        }
        return redirect('/siswa')->with('sukses','Data berhasil diinput');
    }

    public function edit($id)
    {
    	$siswa = \App\Siswa::find($id);

    	return view('siswa/edit',['siswa' => $siswa,'kelas'=>\App\Kelas::all()]);
    }

     public function update(Request $request,$id)
    {
    	//dd($request->all());
    	$siswa = \App\Siswa::find($id);
    	$siswa->update($request->all());
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
    	return redirect('/siswa')->with('sukses','data berhasil diupdate');
    }
    public function delete($id)
    {
        $siswa = \App\Siswa::find($id);
        $siswa->delete();
        return redirect('/siswa')->with('sukses','Data berhasil dihapus');
    }

    public function profile($id)
    {
        $siswa = \App\Siswa::find($id);
        $matapelajaran = \App\Mapel::all();
        
        // Menyiapkan Data Untuk Chart
        $categories = [];
        $data = [];

        foreach ($matapelajaran as $mp) {
            if ($siswa->mapel()->wherePivot('mapel_id',$mp->id)->first()){
            $categories[] = $mp->nama;
            $data[] = $siswa->mapel()->wherePivot('mapel_id',$mp->id)->first()->pivot->nilai;
        }
         }
        //dd($data);
       //dd (json_encode($categories));
       if(auth()->user()->role == 'admin'){
        $mapelguru = \App\Mapel::where("guru_id", auth()->user()->guru->id)->get();
        return view('siswa.profile',['siswa' => $siswa,'matapelajaran' => $matapelajaran,'mapelguru' => $mapelguru,'categories' => $categories, 'data' => $data]);
       }
        return view('siswa.profile',['siswa' => $siswa,'matapelajaran' => $matapelajaran,'categories' => $categories, 'data' => $data]);
    }


    public function addnilai(Request $request,$idsiswa)
    {
       $siswa = \App\Siswa::find($idsiswa);
       if($siswa->mapel()->where('mapel_id' ,$request->mapel)->exists()) {
         return redirect('siswa/'.$idsiswa.'/profile')->with('error','Data mata pelajaran sudah ada');
       }
       $siswa->mapel()->attach($request->mapel,['nilai' => $request->nilai]);

       return redirect('siswa/'.$idsiswa.'/profile')->with('sukses','Data nilai berhasil dimasukan');
    }

    public function deletenilai($idsiswa,$idmapel)
    {
       $siswa = \App\Siswa::find($idsiswa);
       $siswa->mapel()->detach($idmapel);
       return redirect()->back()->with('sukses','Data nilai berhasil dihapus');
    }

     public function exportExcel() 
    {
        return Excel::download(new SiswaExport, 'Siswa.xlsx');
    }

    public function exportPdf()
    {
        $siswa = \App\Siswa::orderBy("NIS", "ASC")->get();
        $pdf = PDF::loadView('export.siswapdf',['siswa' => $siswa]);
        return $pdf->download('siswa.pdf');
    }

    public function getdatasiswa()
    {
        $siswa = Siswa::select('siswa.*');

        return \DataTables::eloquent($siswa)
        ->addColumn('rata2_nilai',function($s){
            return $s->rataRataNilai();
        })
        ->addColumn('aksi',function($s){
            return '<a href="/siswa/'.$s->id.'/profile/" class="btn btn-warning">Profil</a>';
        })
        ->rawColumns(['rata2_nilai','aksi'])
        ->toJson();
    }

    public function profilsaya()
    {
        return view('siswa.profilsaya');
    }
}
