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

        $this->validate($request, [
            'penghasilan_wali' => 'numeric',
        ], $message = [
            'penghasilan_wali.numeric' => 'Masukan Angka!',
        ]);

        if($request->pekerjaan_ayah>$request->pekerjaan_ibu)
        {
            $pekerjaan=$request->pekerjaan_ibu;
        }
        elseif($request->pekerjaan_ayah==$request->pekerjaan_ibu)
        {
            $pekerjaan=$request->pekerjaan_ayah;
        }
        else
        {
            $pekerjaan=$request->pekerjaan_ayah;
        }


        if($pekerjaan==20){
            $kerja_wali="PNS";
        }
        if($pekerjaan==50){
            $kerja_wali="Karyawan";
        }
        if($pekerjaan==70){
            $kerja_wali="Petani";
        }
        if($pekerjaan==79){
            $kerja_wali="Nelayan";
        }
        if($pekerjaan==100){
            $kerja_wali="Buruh";
        }
        if($pekerjaan==30){
            $kerja_wali="Penambak Ikan";
        }
        if($pekerjaan==60){
            $kerja_wali="Pedagang";
        }
        if($pekerjaan==0){
            $kerja_wali="Tidak Bekerja";
        }
        $data = new Siswa();
        $data->nama = $request->nama;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->kelas = $request->kelas;
        $data->jurusan = $request->jurusan;
        $data->nama_ayah = $request->nama_ayah;
        $data->nama_ibu = $request->nama_ibu;
        $data->pekerjaan_wali = $kerja_wali;

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
        $this->validate($request, [
            'penghasilan_wali' => 'numeric',
        ], $message = [
            'penghasilan_wali' => 'Masukan Angka!',
        ]);

        if($request->pekerjaan_ayah>$request->pekerjaan_ibu)
        {
            $pekerjaan=$request->pekerjaan_ibu;
        }
        elseif($request->pekerjaan_ayah==$request->pekerjaan_ibu)
        {
            $pekerjaan=$request->pekerjaan_ayah;
        }
        else
        {
            $pekerjaan=$request->pekerjaan_ayah;
        }


        if($pekerjaan==20){
            $kerja_wali="PNS";
        }
        if($pekerjaan==50){
            $kerja_wali="Karyawan";
        }
        if($pekerjaan==70){
            $kerja_wali="Petani";
        }
        if($pekerjaan==79){
            $kerja_wali="Nelayan";
        }
        if($pekerjaan==100){
            $kerja_wali="Buruh";
        }
        if($pekerjaan==30){
            $kerja_wali="Penambak Ikan";
        }
        if($pekerjaan==60){
            $kerja_wali="Pedagang";
        }
        if($pekerjaan==0){
            $kerja_wali="Tidak Bekerja";
        }

        $data = Siswa::find($id);

        $data->nama = $request->nama;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->kelas = $request->kelas;
        $data->jurusan = $request->jurusan;
        $data->nama_ayah = $request->nama_ayah;
        $data->nama_ibu = $request->nama_ibu;
        $data->pekerjaan_wali = $kerja_wali;
        
        
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
