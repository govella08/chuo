<?php namespace App\Http\Controllers\site;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Setting;

class ContentsController extends BaseSiteController {

    public function privacy(){
        $content = Setting::where('slug', '=', 'privacy-policy')->first();
        return view('site.contents.show', compact('content'));
    }

    public function disclaimer(){
        $content = Setting::where('slug', '=', 'disclaimer')->first();
        return view('site.contents.show', compact('content'));
    }

    public function copyright(){
        $content = Setting::where('slug', '=', 'copyright')->first();
        return view('site.contents.show', compact('content'));
    }

    public function terms(){
        $content = Setting::where('slug', '=', 'terms')->first();
        return view('site.contents.show', compact('content'));
    }
}
