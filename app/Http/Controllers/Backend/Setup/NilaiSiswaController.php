<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\AssignSubject;
use App\Models\NilaiSiswa;
use App\Models\SchoolSubject;
use App\Models\Siswa;
use Illuminate\Http\Request;

class NilaiSiswaController extends Controller
{
    
    public function ViewNilai()
    {
        //$data['Alldata'] = NilaiSiswa::all();
        $data['Alldata'] = NilaiSiswa::select('siswa_id')->groupBy('siswa_id')->get();
        return view('backend.setup.nilai_siswa.view_nilai', $data);
    }

    public function AddNilai()
    {
        $data['siswa'] = Siswa::all();
        $data['mapel'] = SchoolSubject::all();
        //$data['mapel'] = AssignSubject::all();
        //dd($data);
        return view('backend.setup.nilai_siswa.add_nilai', $data);
    }

    public function StoreNilai(Request $request)
    {
        
        //dd($request);
        $Jmlmapel = count($request->subject_id);
        if ($Jmlmapel != Null)
        {
            for ($i = 0; $i < $Jmlmapel; $i++ )
            {
                $data = new NilaiSiswa();
                $data->siswa_id = $request->siswa_id;
                $data->subject_id = $request->subject_id[$i];
                $data->nilai_mapel = $request->nilai_mapel[$i];
                $data->nilai_keaktifan = $request->nilai_keaktifan[$i];
                $data->save();
            }  //end for

                // $nilaiMapel = NilaiSiswa::select('nilai_mapel');
                // $nilaiAktif = NilaiSiswa::select('nilai_keaktifan')->where('siswa_id', $request->siswa_id)->sum('nilai_keaktifan');
                // //$rataMpl = $nilaiMapel/$Jmlmapel;
                // //$rataAktif = $nilaiAktif/$Jmlmapel;
                // dd($nilaiMapel);

        }  // end if

        $notification = array(
            'message' => 'Data Nilai Siswa Inserted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('nilai.siswa.view')->with($notification);
    }

    public function DetailsNilai($siswa_id)
    {
        $data['details'] = NilaiSiswa::where('siswa_id', $siswa_id)->first();
        $data['details'] = NilaiSiswa::where('siswa_id', $siswa_id)->orderBy('subject_id', 'asc')->get();
        //dd($data);
         return view('backend.setup.nilai_siswa.details_nilai', $data);
    }

    public function EditNilai($siswa_id)
    {
        $data['editData'] = NilaiSiswa::where('siswa_id', $siswa_id)->orderBy('subject_id', 'asc')->get();
        //dd($data);
        $data['siswa'] = Siswa::all();
        $data['mapel'] = SchoolSubject::all();
        return view('backend.setup.nilai_siswa.edit_nilai', $data);
    }

    public function UpdateNilai(Request $request, $siswa_id)
    {
        if ($request->subject_id == null) {
            $notification = array(
                'message' => 'Maaf, Tidak Ada Mata Pelajaran Yang Dipilih',
                'alert-type' => 'error',
            );

            return redirect()->route('nilai.siswa.edit', $siswa_id)->with($notification);
        }
        else {

            $Jmlmapel = count($request->subject_id);
            NilaiSiswa::where('siswa_id', $siswa_id)->delete();

            for ($i = 0; $i < $Jmlmapel; $i++) {
                $data = new NilaiSiswa();
                $data->siswa_id = $request->siswa_id;
                $data->subject_id = $request->subject_id[$i];
                $data->nilai_mapel = $request->nilai_mapel[$i];
                $data->nilai_keaktifan = $request->nilai_keaktifan[$i];
                $data->save();
                //dd($data);
            } // end for loop

        }  //end else

        $notification = array(
            'message' => 'Data Nilai Updated Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('nilai.siswa.view')->with($notification);
    }

    public function DeleteNilai($siswa_id)
    {

        NilaiSiswa::where('siswa_id', $siswa_id)->delete();
        //dd($data);

        $notification = array(
            'message' => 'Data Nilai Deleted Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('nilai.siswa.view')->with($notification);
    }
}
