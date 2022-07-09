<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Announcement;
use \Cviebrock\EloquentSluggable\Services\SlugService;

use Response;
use Validator;
use Redirect;
use Auth;

class AnnouncementsController extends BaseController {

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announcements = Announcement::orderBy('id', 'DESC')->paginate(10);
        return view('cms.announcements.index', compact('announcements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.announcements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Announcement::$rules);

		/*$validator = Validator::make($data = , );

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }*/

        $data = $request->only('name','content','active');

/*        if ($request->hasFile('file_en'))
		{

			if ($request->file('file_en')->isValid())
			{
			    $file_url_en = $request->file('file_en');

				$doc_name_en = 'en'.time() . '-' .$file_url_en->getClientOriginalName();

				$pathName = '/uploads/announcements/';

				$destinationPath = public_path().$pathName;

				$file_url_en->move($destinationPath, $doc_name_en);

				$data['file_en'] = $pathName.$doc_name_en;

			}
		}


        if ($request->hasFile('file_sw'))
        {

            if ($request->file('file_sw')->isValid())
            {
                $file_url_sw = $request->file('file_sw');

                $doc_name_sw = 'sw'.time() . '-' .$file_url_sw->getClientOriginalName();

                $pathName = '/uploads/announcements/';

                $destinationPath = public_path().$pathName;

                $file_url_sw->move($destinationPath, $doc_name_sw);

                $data['file_sw'] = $pathName.$doc_name_sw;

            }
        }*/
         //$data['user_id'] = Auth::user()->id;
        //  dd($data);
        $announcement = Announcement::create($data);

        if(request('name_en')){
            app()->setLocale('en');
            $announcement->name=request('name_en');
            $announcement->save();

         }
        if(request('content_en')){
            app()->setLocale('en');
            $announcement->content=request('content_en');
            $announcement->save();
         }
        $announcement->slug = null;
        $slug = SlugService::createSlug(Announcement::class, 'slug', $request->name);
        $announcement->slug=$slug;
        app()->setLocale('en');

        $announcement->update();

        if($announcement){
            return redirect('cms/announcements');
        }
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $announcement = Announcement::find($id);
        return view("cms.announcements.edit", compact('announcement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	$announcement = Announcement::find($id);

    	$request->validate(Announcement::$rules);

        $data = $request->only('name','content','active');

        /*if ($request->hasFile('file_en'))
		{

			if ($request->file('file_en')->isValid())
			{
			    $file_url_en = $request->file('file_en');

				$doc_name_en = 'en'.time() . '-' .$file_url_en->getClientOriginalName();

				$pathName = '/uploads/announcements/';

				$destinationPath = public_path().$pathName;

				$file_url_en->move($destinationPath, $doc_name_en);

				$data['file_en'] = $pathName.$doc_name_en;

				if(is_file(public_path().$announcement->file_en) && file_exists(public_path().$announcement->file_en)){
					unlink(public_path().$announcement->file_en);
				}

			}
		}


		if ($request->hasFile('file_sw'))
		{

			if ($request->file('file_sw')->isValid())
			{
			    $file_url_sw = $request->file('file_sw');

				$doc_name_sw = 'sw'.time() . '-' .$file_url_sw->getClientOriginalName();

				$pathName = '/uploads/announcements/';

				$destinationPath = public_path().$pathName;

				$file_url_sw->move($destinationPath, $doc_name_sw);

				$data['file_sw'] = $pathName.$doc_name_sw;

				if(is_file(public_path().$announcement->file_sw) && file_exists(public_path().$announcement->file_sw)){
					unlink(public_path().$announcement->file_sw);
				}

			}
		}*/

        $announcement->update($data);
         //$data['user_id'] = Auth::user()->id;
        if(request('name_en')){
            app()->setLocale('en');
            $announcement->name=request('name_en');
            $announcement->save();

         }
        if(request('content_en')){
            app()->setLocale('en');
            $announcement->content=request('content_en');
            $announcement->save();
         }
        $announcement->slug = null;
        $slug = SlugService::createSlug(Announcement::class, 'slug', $request->name);
        $announcement->slug=$slug;
        app()->setLocale('en');

        $announcement->update();

        
        return redirect('cms/announcements');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    	$announcement = Announcement::find($id);

	/*	if(is_file(public_path().$announcement->file_en) && file_exists(public_path().$announcement->file_en)){
			unlink(public_path().$announcement->file_en);
		}

		if(is_file(public_path().$announcement->file_sw) && file_exists(public_path().$announcement->file_sw)){
			unlink(public_path().$announcement->file_sw);
		}*/

		Announcement::destroy($id);

        return redirect('cms/announcements');
    }

}
