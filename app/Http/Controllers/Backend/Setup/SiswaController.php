<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function ViewSiswa()
    {
        $data['alldata'] = Siswa::all();
        return view('backend.setup.siswa.view_siswa', $data);
    }

    public function AddSiswa()
    {
        return view('backend.setup.siswa.add_siswa');
    }

    public function StoreSiswa(Request $request)
    {
        $data = new Siswa();
        $data->nama = $request->nama;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->kelas = $request->kelas;
        $data->jurusan = $request->jurusan;
        $data->nama_wali = $request->nama_wali;
        $data->penghasilan_wali = $request->penghasilan_wali;
        $data->save();

        $notification = array(
            'message' => 'Data Siswa Inserted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('siswa')->with($notification);
    }

    public function EditSiswa($id)
    {
        $data['alldata'] = Siswa::find($id);
        return view('backend.setup.siswa.edit_siswa', $data);

    }

    public function UpdateSiswa(Request $request, $id)
    {
        $data = Siswa::find($id);

        $data->nama = $request->nama;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->kelas = $request->kelas;
        $data->jurusan = $request->jurusan;
        $data->nama_wali = $request->nama_wali;
        $data->penghasilan_wali = $request->penghasilan_wali;
        
        $data->save();

        $notification = array(
            'message' => 'Data Siswa Updated Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('siswa')->with($notification);
    }

    public function DeleteSiswa($id)
    {
        $data = Siswa::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Data Siswa Deleted Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('siswa')->with($notification);
    }
}
