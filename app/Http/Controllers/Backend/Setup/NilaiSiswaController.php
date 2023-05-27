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
    //siswa prestasi
    public function ViewSiswaPrestasi()
    {
        return view('backend.setup.siswa_prestasi.view_siswa_prestasi');
    }

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
        return view('backend.setup.nilai_siswa.details_nilai', $data);
    }

    public function EditNilai($siswa_id)
    {
        return view('backend.setup.nilai_siswa.edit_nilai');
    }
}
