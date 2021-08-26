<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paper;

class PaperController extends Controller
{
    public function PaperView() {
        $data['allData'] = Paper::all();
        return view('backend.view_paper', $data);
    }

    public function PaperStore(Request $request) {

         $request->validate([
            "nom"=>"required"
        ]);
        $data = new Paper();
        $data->nom = $request->nom;


        if($request->hasFile('file')){

            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('files/', $filename);
            $data->file = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'تم إضافة الوثيقة بنجاح',
            'alert-type' => 'success'
        );


        return back()->with($notification);
    }


    public function PaperDelete($id) {

        $paper = Paper::find($id);
        $paper->delete();

        $notification = array(
            'message' => 'تم حذف الوثيقة بنجاح',
            'alert-type' => 'info'
        );

        return redirect()->route('paper.view')->with($notification);
    }
}
