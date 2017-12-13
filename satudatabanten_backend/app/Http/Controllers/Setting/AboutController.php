<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\About;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{

    public function getIndex(Request $request)
    {
        $header = '<div class="block-header">';
        $header .= '<h2 style="display: inline;">Pengaturan Tentang</h2>';
        $header .= '</div>';
        $about = About::take(1)->first();
        return view('pages.setting.about.index')
            ->with('header', $header)
            ->with('about', $about);
    }

    public function updateAbout(Request $request, $id)
    {
        $header = '<div class="block-header">';
        $header .= '<h2 style="display: inline;">Pengaturan Tentang</h2>';
        $header .= '</div>';
        $aboutId = base64_decode($id);
        $about = About::where('id', $aboutId)->first();
        return view('pages.setting.about.update')
            ->with('header',$header)
            ->with('about',$about);
    }

    public function updateAboutSave(Request $request, $id)
    {
        if(!empty($request->file('aboutImage')))
        {
            # Upload photo if all input is valid ---------------------------------------------------------------------
            $path = str_replace('_backend','',base_path()) . '/public/assets/images/';
            $image = 'about.'.$request->file('aboutImage')->getClientOriginalExtension();
            if($request->file('aboutImage')->move($path, $image))
            {
                File::Delete($path.$request->input('aboutOldImage'));

                $aboutId = base64_decode($id);
                $about = About::find($aboutId);
                $about->title        = $request->input('aboutTitle');
                $about->content      = $request->input('aboutContent');
                $about->image        = $image;
                $about->updated_at   = date('Y-m-d H:i:s');

                if($about->save())
                {
                    $responses = array('redirect' => route('about'), 'status'=> 'success', 'title' => 'Berhasil!', 'message' => 'Perubahan telah disimpan.');
                }else{
                    $responses = array('redirect' => route('about.update',$id), 'status'=> 'danger', 'title' => 'Gagal!', 'message' => 'Terjadi kesalahan. Perubahan gagal disimpan.');
                }

            }
            return response()->json($responses);
        }else{
            $aboutId = base64_decode($id);
            $about = About::find($aboutId);
            $about->title        = $request->input('aboutTitle');
            $about->content      = $request->input('aboutContent');
            $about->updated_at   = date('Y-m-d H:i:s');

            if($about->save())
            {
                $responses = array('redirect' => route('about'), 'status'=> 'success', 'title' => 'Berhasil!', 'message' => 'Perubahan telah disimpan.');

            }else{
                $responses = array('redirect' => route('about.update',$id), 'status'=> 'danger', 'title' => 'Gagal!', 'message' => 'Terjadi kesalahan. Perubahan gagal disimpan.');
            }
            return response()->json($responses);
        }
    }

}
