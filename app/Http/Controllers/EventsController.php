<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\Event;


class EventsController extends BaseController {

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::orderBy('id', 'DESC')->paginate(10);
        return view('cms.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$request->validate(Event::$rules);

        $data = $request->only('title', 'location','description', 'participants','objectives','start_date','end_date','start_time','end_time','fee','infophone','infoemail','visible');



        if ($request->hasFile('flier'))
		{

			if ($request->file('flier')->isValid())
			{
			    $file_flier = $request->file('flier');

				$doc_name = time() . '-' .$file_flier->getClientOriginalName();

				$pathName = '/uploads/events/';

				$destinationPath = public_path().$pathName;

				$file_flier->move($destinationPath, $doc_name);

				$data['flier'] = $doc_name;

			}
		}

        $event = Event::create($data);

        if(request('title_en')){
            app()->setLocale('en');
            $event->title=request('title_en');
            $event->save();
         }

         if(request('description_en')){
            app()->setLocale('en');
            $event->description=request('description_en');
            $event->save();
         }

         if(request('participants_en')){
            app()->setLocale('en');
            $event->participants=request('participants_en');
            $event->save();
         }

         if(request('objectives_en')){
            app()->setLocale('en');
            $event->objectives=request('objectives_en');
            $event->save();
         }

            $event->slug=null;

            $slug = SlugService::createSlug(event::class, 'slug', $request->title);
            $event->slug=$slug;
            app()->setLocale('en');

            $event->update();

        if($event){
            return redirect('cms/events');
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
        $event = Event::find($id);
        return view("cms.events.edit", compact('event'));
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
    	$event = Event::find($id);
        //'flier'       => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096'
        $rules=Event::$rules;
        
        $rules['flier']='image|mimes:jpeg,png,jpg,gif,svg|max:4096';

        $request->validate($rules);

        $data = $request->only('title', 'location','description', 'participants','objectives','start_date','end_date','start_time','end_time','fee','infophone','infoemail','visible');

        if ($request->hasFile('flier'))
		{

			if ($request->file('flier')->isValid())
			{
			    $file_flier = $request->file('flier');

				$doc_name = time() . '-' .$file_flier->getClientOriginalName();

				$pathName = '/uploads/events/';

				$destinationPath = public_path().$pathName;

				$file_flier->move($destinationPath, $doc_name);

				$data['flier'] = $doc_name;

				if(is_file(public_path().$pathName.$event->flier) && file_exists(public_path().$pathName.$event->flier)){
					unlink(public_path().$pathName.$event->flier);
				}

			}
		}

        $event->update($data);

        if(request('title_en')){
            app()->setLocale('en');
            $event->title=request('title_en');
            $event->save();
         }

         if(request('description_en')){
            app()->setLocale('en');
            $event->description=request('description_en');
            $event->save();
         }

         if(request('participants_en')){
            app()->setLocale('en');
            $event->participants=request('participants_en');
            $event->save();
         }

         if(request('objectives_en')){
            app()->setLocale('en');
            $event->objectives=request('objectives_en');
            $event->save();
         }

            $event->slug=null;

            $slug = SlugService::createSlug(event::class, 'slug', $request->title);
            $event->slug=$slug;
            app()->setLocale('en');

            $event->save();

        
        return redirect('cms/events');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    	$event = Event::find($id);

        $pathName = '/uploads/events/';

		if(is_file(public_path().$pathName.$event->flier) && file_exists(public_path().$pathName.$event->flier)){
			unlink(public_path().$pathName.$event->flier);
		}

		Event::destroy($id);

        return redirect('cms/events');
    }

}
