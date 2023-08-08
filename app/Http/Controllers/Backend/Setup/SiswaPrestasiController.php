<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\BobotMetode;
use App\Models\Hasil;
use App\Models\NilaiSiswa;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use niklasravnsborg\LaravelPdf\Facades\Pdf;

class SiswaPrestasiController extends Controller
{
   public function SiswaPrestasiIpa()
   {
      DB::table('hasils')->truncate();
        
        $nilai_siswa= DB::table('nilai_siswas')
        ->leftJoin('siswas', 'siswas.id', '=', 'nilai_siswas.siswa_id')
        ->where('siswas.jurusan','IPA')
        ->select('siswas.nama',DB::raw('AVG(nilai_siswas.nilai_mapel) AS rata_rata_mapel'),'siswas.pekerjaan_wali', 'siswas.jurusan',DB::raw('AVG(nilai_siswas.nilai_keaktifan) AS rata_rata_aktif'))
        ->groupBy('siswas.nama','siswas.pekerjaan_wali', 'siswas.jurusan')
        ->get();
        // $data = NilaiSiswa::with(['siswa'])->get(   );
        $bobot_mapel=BobotMetode::where('kriteria','Rata - rata pelajaran')->get();
        $bobot_aktif=BobotMetode::where('kriteria','Rata - rata keaktifan')->get();
        $bobot_kerja=BobotMetode::where('kriteria','Pekerjaan wali')->get();
        //dd($nilai_siswa);
        foreach($nilai_siswa as $nilai){
            foreach($bobot_kerja as $bt){
                    if($nilai->pekerjaan_wali=="PNS"){
                        $hasil_pekerjaan=20*$bt->bobot;
                     } 
                     if($nilai->pekerjaan_wali=="Karyawan"){
                         $hasil_pekerjaan=50*$bt->bobot;
                      }  
                      if($nilai->pekerjaan_wali=="Petani"){
                         $hasil_pekerjaan=70*$bt->bobot;
                      }  
                      if($nilai->pekerjaan_wali=="Nelayan"){
                         $hasil_pekerjaan=79*$bt->bobot;
                      }  
                      if($nilai->pekerjaan_wali=="Buruh"){
                         $hasil_pekerjaan=100*$bt->bobot;
                      }    
                      if($nilai->pekerjaan_wali=="Penambak ikan"){
                         $hasil_pekerjaan=30*$bt->bobot;
                      }    
                      if($nilai->pekerjaan_wali=="Pedagang"){
                         $hasil_pekerjaan=60*$bt->bobot;
                      } }
                // untuk menentukan nilai
                foreach($bobot_mapel as $bt){

                    if($nilai->rata_rata_mapel>=90){
                        $hasil_mapel=100*$bt->bobot;
                     } 
                     if($nilai->rata_rata_mapel<90 && $nilai->rata_rata_mapel>=80){
                         $hasil_mapel=80*$bt->bobot;
                      }  
                      if($nilai->rata_rata_mapel<80 && $nilai->rata_rata_mapel>=70){
                         $hasil_mapel=50*$bt->bobot;
                      }  
                      if($nilai->rata_rata_mapel<70){
                         $hasil_mapel=40*$bt->bobot;
                      } 
                }
                // untuk rata keaktifan
                foreach($bobot_aktif as $bt){
                    if($nilai->rata_rata_aktif>=90){
                        $hasil_keaktifan =80*$bt->bobot;
                     } 
                     if($nilai->rata_rata_aktif<=89 && $nilai->rata_rata_aktif>79){
                         $hasil_keaktifan=60*$bt->bobot;
                      }  
                      if($nilai->rata_rata_aktif<=79 && $nilai->rata_rata_aktif>=70){
                         $hasil_keaktifan=40*$bt->bobot;
                      }  
                      if($nilai->rata_rata_aktif<70){
                         $hasil_keaktifan=20*$bt->bobot;
                      } 
                    }
                // dd($bt->kriteria);
                // if($nilai->nama=="Yunus audi"){
                //     dd($hasil_keaktifan,$hasil_mapel,$hasil_pekerjaan);
                // }
                $total = $hasil_pekerjaan+$hasil_mapel+$hasil_keaktifan;
                $data = new Hasil();
                $data->nama = $nilai->nama;
                $data->jurusan = $nilai->jurusan;
                $data->hasil_hitung = $total;
                $data->status = 'Belum Terpilih Menjadi Sisiwa Berprestasi';
                $data->save();
            }
            // dd('sukses');
        $data=Hasil::orderBy("hasil_hitung",'desc')->limit(3);
        
        $data->update([
            'status'=>'Terpilih Menjadi Siswa Berprestasi'
        ]);
        $data=Hasil::orderBy("hasil_hitung",'desc')->get();
        // dd();
         return view('backend.siswa_prestasi.prestasi_ipa', compact('data'));

      }

      public function IpaPrint($id)
      {
         $data['details'] = Hasil::where('id', $id)->get();
         //dd($data);
         $pdf = Pdf::loadView('backend.siswa_prestasi.ipa_pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('siswa_prestasi_IPA.pdf');
      }

   public function SiswaPrestasiIps()
   {
      DB::table('hasils')->truncate();
        
        $nilai_siswa= DB::table('nilai_siswas')
        ->leftJoin('siswas', 'siswas.id', '=', 'nilai_siswas.siswa_id')
        ->where('siswas.jurusan','IPS')
        ->select('siswas.nama',DB::raw('AVG(nilai_siswas.nilai_mapel) AS rata_rata_mapel'),'siswas.pekerjaan_wali', 'siswas.jurusan',DB::raw('AVG(nilai_siswas.nilai_keaktifan) AS rata_rata_aktif'))
        ->groupBy('siswas.nama','siswas.pekerjaan_wali', 'siswas.jurusan')
        ->get();
        // $data = NilaiSiswa::with(['siswa'])->get(   );
        $bobot_mapel=BobotMetode::where('kriteria','Rata - rata pelajaran')->get();
        $bobot_aktif=BobotMetode::where('kriteria','Rata - rata keaktifan')->get();
        $bobot_kerja=BobotMetode::where('kriteria','Pekerjaan wali')->get();
        //dd($nilai_siswa);
        foreach($nilai_siswa as $nilai){
            foreach($bobot_kerja as $bt){
                    if($nilai->pekerjaan_wali=="PNS"){
                        $hasil_pekerjaan=20*$bt->bobot;
                     } 
                     if($nilai->pekerjaan_wali=="Karyawan"){
                         $hasil_pekerjaan=50*$bt->bobot;
                      }  
                      if($nilai->pekerjaan_wali=="Petani"){
                         $hasil_pekerjaan=70*$bt->bobot;
                      }  
                      if($nilai->pekerjaan_wali=="Nelayan"){
                         $hasil_pekerjaan=79*$bt->bobot;
                      }  
                      if($nilai->pekerjaan_wali=="Buruh"){
                         $hasil_pekerjaan=100*$bt->bobot;
                      }    
                      if($nilai->pekerjaan_wali=="Penambak ikan"){
                         $hasil_pekerjaan=30*$bt->bobot;
                      }    
                      if($nilai->pekerjaan_wali=="Pedagang"){
                         $hasil_pekerjaan=60*$bt->bobot;
                      } }
                // untuk menentukan nilai
                foreach($bobot_mapel as $bt){

                    if($nilai->rata_rata_mapel>=90){
                        $hasil_mapel=100*$bt->bobot;
                     } 
                     if($nilai->rata_rata_mapel<90 && $nilai->rata_rata_mapel>=80){
                         $hasil_mapel=80*$bt->bobot;
                      }  
                      if($nilai->rata_rata_mapel<80 && $nilai->rata_rata_mapel>=70){
                         $hasil_mapel=50*$bt->bobot;
                      }  
                      if($nilai->rata_rata_mapel<70){
                         $hasil_mapel=40*$bt->bobot;
                      } 
                }
                // untuk rata keaktifan
                foreach($bobot_aktif as $bt){
                    if($nilai->rata_rata_aktif>=90){
                        $hasil_keaktifan =80*$bt->bobot;
                     } 
                     if($nilai->rata_rata_aktif<=89 && $nilai->rata_rata_aktif>79){
                         $hasil_keaktifan=60*$bt->bobot;
                      }  
                      if($nilai->rata_rata_aktif<=79 && $nilai->rata_rata_aktif>=70){
                         $hasil_keaktifan=40*$bt->bobot;
                      }  
                      if($nilai->rata_rata_aktif<70){
                         $hasil_keaktifan=20*$bt->bobot;
                      } 
                    }
                // dd($bt->kriteria);
                // if($nilai->nama=="Yunus audi"){
                //     dd($hasil_keaktifan,$hasil_mapel,$hasil_pekerjaan);
                // }
                $total = $hasil_pekerjaan+$hasil_mapel+$hasil_keaktifan;
                $data = new Hasil();
                $data->nama = $nilai->nama;
                $data->jurusan = $nilai->jurusan;
                $data->hasil_hitung = $total;
                $data->status = 'Belum Terpilih Menjadi Sisiwa Berprestasi';
                $data->save();
            }
            // dd('sukses');
        $data=Hasil::orderBy("hasil_hitung",'desc')->limit(3);
        
        $data->update([
            'status'=>'Terpilih Menjadi Siswa Berprestasi'
        ]);
        $data=Hasil::orderBy("hasil_hitung",'desc')->get();
        // dd();
         return view('backend.siswa_prestasi.prestasi_ips', compact('data'));  
   }

   public function IpsPrint($id)
   {
      $data['details'] = Hasil::where('id', $id)->get();

      $pdf = Pdf::loadView('backend.siswa_prestasi.ips_pdf', $data);
      $pdf->SetProtection(['copy', 'print'], '', 'pass');
      return $pdf->stream('siswa_prestasi_IPS.pdf');

   }
    
   
   //SISWA PRESTASI SET UP MANAGEMENT
    public function ViewSiswaPrestasi()
    {
        DB::table('hasils')->truncate();
        // $siswa = NilaiSiswa::select('siswa_id')->groupBy('siswa_id')->orderBy('siswa_id', 'asc')->get();
        // //$data = NilaiSiswa::select('nilai_mapel')->where('siswa_id', $siswa);
        // dd($siswa);
        $nilai_siswa= DB::table('nilai_siswas')
        ->leftJoin('siswas', 'siswas.id', '=', 'nilai_siswas.siswa_id')
        //->where('siswas.jurusan','IPS')
        ->select('siswas.nama',DB::raw('AVG(nilai_siswas.nilai_mapel) AS rata_rata_mapel'),'siswas.pekerjaan_wali', 'siswas.jurusan',DB::raw('AVG(nilai_siswas.nilai_keaktifan) AS rata_rata_aktif'))
        ->groupBy('siswas.nama','siswas.pekerjaan_wali', 'siswas.jurusan')
        ->get();
        // $data = NilaiSiswa::with(['siswa'])->get(   );
        $bobot_mapel=BobotMetode::where('kriteria','Rata - rata pelajaran')->get();
        $bobot_aktif=BobotMetode::where('kriteria','Rata - rata keaktifan')->get();
        $bobot_kerja=BobotMetode::where('kriteria','Pekerjaan wali')->get();
        //dd($nilai_siswa);
        foreach($nilai_siswa as $nilai){
            foreach($bobot_kerja as $bt){
                    if($nilai->pekerjaan_wali=="PNS"){
                        $hasil_pekerjaan=20*$bt->bobot;
                     } 
                     if($nilai->pekerjaan_wali=="Karyawan"){
                         $hasil_pekerjaan=50*$bt->bobot;
                      }  
                      if($nilai->pekerjaan_wali=="Petani"){
                         $hasil_pekerjaan=70*$bt->bobot;
                      }  
                      if($nilai->pekerjaan_wali=="Nelayan"){
                         $hasil_pekerjaan=70*$bt->bobot;
                      }  
                      if($nilai->pekerjaan_wali=="Buruh"){
                         $hasil_pekerjaan=100*$bt->bobot;
                      }    
                      if($nilai->pekerjaan_wali=="Penambak ikan"){
                         $hasil_pekerjaan=30*$bt->bobot;
                      }    
                      if($nilai->pekerjaan_wali=="Pedagang"){
                         $hasil_pekerjaan=60*$bt->bobot;
                      } }
                // untuk menentukan nilai
                foreach($bobot_mapel as $bt){

                    if($nilai->rata_rata_mapel>=90){
                        $hasil_mapel=100*$bt->bobot;
                     } 
                     if($nilai->rata_rata_mapel<90 && $nilai->rata_rata_mapel>=80){
                         $hasil_mapel=80*$bt->bobot;
                      }  
                      if($nilai->rata_rata_mapel<80 && $nilai->rata_rata_mapel>=70){
                         $hasil_mapel=50*$bt->bobot;
                      }  
                      if($nilai->rata_rata_mapel<70){
                         $hasil_mapel=40*$bt->bobot;
                      } 
                }
                // untuk rata keaktifan
                foreach($bobot_aktif as $bt){
                    if($nilai->rata_rata_aktif>=90){
                        $hasil_keaktifan =80*$bt->bobot;
                     } 
                     if($nilai->rata_rata_aktif<=89 && $nilai->rata_rata_aktif>79){
                         $hasil_keaktifan=60*$bt->bobot;
                      }  
                      if($nilai->rata_rata_aktif<=79 && $nilai->rata_rata_aktif>=70){
                         $hasil_keaktifan=40*$bt->bobot;
                      }  
                      if($nilai->rata_rata_aktif<70){
                         $hasil_keaktifan=20*$bt->bobot;
                      } 
                    }
                // dd($bt->kriteria);
                // if($nilai->nama=="Yunus audi"){
                //     dd($hasil_keaktifan,$hasil_mapel,$hasil_pekerjaan);
                // }
                $total = $hasil_pekerjaan+$hasil_mapel+$hasil_keaktifan;
                $data = new Hasil();
                $data->nama = $nilai->nama;
                $data->jurusan = $nilai->jurusan;
                $data->hasil_hitung = $total;
                $data->status = 'Belum Terpilih Menjadi Sisiwa Berprestasi';
                $data->save();
            }
            // dd('sukses');
        $data=Hasil::orderBy("hasil_hitung",'desc')->limit(6);
        
        $data->update([
            'status'=>'Terpilih Menjadi Siswa Berprestasi'
        ]);
        $data=Hasil::orderBy("hasil_hitung",'desc')->get();
        // dd();
         return view('backend.setup.siswa_prestasi.view_siswa_prestasi', compact('data'));
    }

    public function cariSiswa(Request $request)
    {
        $data=Hasil::where('jurusan', $request->cari)->orderBy("hasil_hitung",'desc')->get();
        // dd();
         return view('backend.setup.siswa_prestasi.view_siswa_prestasi', compact('data'));

    }
    
}
