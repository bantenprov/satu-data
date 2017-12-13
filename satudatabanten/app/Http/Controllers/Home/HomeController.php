<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\About;

class HomeController extends Controller
{
    public function getIndex()
    {
        //countData
        $this->setMethod('countData');
        $this->setParamGet('page',1);
        $this->setParamGet('limit',2);
        $this->setParamGet('view',2);
        $this->setParamGet('order_field','title');
        $this->setParamGet('sort_field','ASC');
        $datas = $this->doRead('get');
        $count = ($datas['status'] > 0 ? $datas['results'] : array());
        return view('pages.home',compact('count'));
    }

    public function getAbout()
    {
        $about = About::take(1)->orderBy('id','DESC')->first();
        return view('pages.about', compact('about'));
    }
}
