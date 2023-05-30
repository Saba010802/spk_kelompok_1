<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\BobotMetode;
use Illuminate\Http\Request;

class BobotMetodeController extends Controller
{
    public function ViewBobot()
    {
        $data['alldata'] = BobotMetode::all();
        return view('backend.setup.bobot_metode.view_bobot', $data);
    }

    public function AddBobot()
    {
        return view('backend.setup.bobot_metode.add_bobot');
    }

    public function StoreBobot(Request $request)
    {
        $this->validate($request, [
            'bobot' => 'numeric',
        ], $message = [
            'bobot.numeric' => 'Masukan Angka, Bukan Huruf!',
        ]);

        $bobot = new BobotMetode();
        $bobot->kriteria = $request->kriteria;
        $bobot->bobot = $request->bobot;
        $bobot->save();

        $notification = array(
            'message' => 'Data Bobot Inserted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('bobot')->with($notification);
    }

    public function EditBobot($id)
    {
        $data['bobot'] = BobotMetode::find($id);
        return view('backend.setup.bobot_metode.edit_bobot', $data);
    }

    public function UpdateBobot(Request $request, $id)
    {
        $this->validate($request, [
            'bobot' => 'numeric',
        ], $message = [
            'bobot.numeric' => 'Masukan Angka, Bukan Huruf!',
        ]);

        $bobot = BobotMetode::find($id);
        $bobot->kriteria = $request->kriteria;
        $bobot->bobot = $request->bobot;
        $bobot->save();

        $notification = array(
            'message' => 'Data Bobot Updated Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('bobot')->with($notification);

    }

    public function DeleteBobot($id)
    {
        $bobot = BobotMetode::find($id);
    
        $bobot->delete();

        $notification = array(
            'message' => 'Data Bobot Deleted Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('bobot')->with($notification);

    }


}
