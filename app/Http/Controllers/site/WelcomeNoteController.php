<?php namespace App\Http\Controllers\site;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\WelcomeNote;

use Response;
use Redirect;

class WelcomeNoteController extends BaseSiteController {

    public function show($slug)
    {
        $welcome = WelcomeNote::findBySlug($slug);
        return view('site.welcome.show', compact('welcome'));
    }

}
