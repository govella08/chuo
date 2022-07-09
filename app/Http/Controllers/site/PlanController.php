<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans = Plan::orderBy('id', 'DESC')->paginate(8);
        return view('site.plans.index', compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cms.plans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate(Plan::$rules);

        $data = $request->only('implementing_agency','description');

        if ($request->hasFile('doc'))
		{

			if ($request->file('doc')->isValid())
			{
			    $file_doc = $request->file('doc');

				$doc_name = time() . '-' .$file_doc->getClientOriginalName();

				$pathName = '/uploads/plans/';

				$destinationPath = public_path().$pathName;

				$file_doc->move($destinationPath, $doc_name);

				$data['doc'] = $doc_name;

			}
		}

        $plan = Plan::create($data);

        if(request('implementing_agency_en')){
            app()->setLocale('en');
            $plan->implementing_agency=request('implementing_agency_en');
            $plan->save();
        }

        if(request('description_en')){
            app()->setLocale('en');
            $plan->description=request('description_en');
            $plan->save();
        }

        if($request->hasFile('doc_en')){
            app()->setLocale('en');
            if ($request->file('doc_en')->isValid())
            {
                $file_doc_en = $request->file('doc_en');

                $doc_name_en = time() . '-' .$file_doc_en->getClientOriginalName();

                $pathName_en = '/uploads/allocations/';

                $destinationPath_en = public_path().$pathName_en;

                $file_doc_en->move($destinationPath_en, $doc_name_en);

                $plan->doc = $doc_name_en;

            }
            
            $plan->save();
        }


            //$event->slug=null;

            // $slug = SlugService::createSlug(event::class, 'slug', $request->title);
            // $event->slug=$slug;
            // app()->setLocale('en');

            $plan->update();

        if($plan){
            return redirect('cms/plans');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plan = Plan::find($id);
        return view("cms.plans.edit", compact('plan'));
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
        $plan = Plan::find($id);

        $rules['doc']='required|max:4096';

        $request->validate($rules);

        $data = $request->only('implementing_agency','description');

        if ($request->hasFile('doc'))
		{

			if ($request->file('doc')->isValid())
			{
			    $file_doc = $request->file('doc');

				$doc_name = time() . '-' .$file_doc->getClientOriginalName();

				$pathName = '/uploads/plans/';

				$destinationPath = public_path().$pathName;

				$file_doc->move($destinationPath, $doc_name);

				$data['doc'] = $doc_name;

                if(is_file(public_path().$pathName.$plan->doc) && file_exists(public_path().$pathName.$plan->doc)){
					unlink(public_path().$pathName.$plan->doc);
				}
			}
		}

        $plan->update($data);

        if(request('description_en')){
            app()->setLocale('en');
            $plan->description=request('description_en');
            $plan->save();
         }

         if($request->hasFile('doc_en')){
            app()->setLocale('en');
            if ($request->file('doc_en')->isValid())
			{
			    $file_doc_en = $request->file('doc_en');

				$doc_name_en = time() . '-' .$file_doc_en->getClientOriginalName();

				$pathName_en = '/uploads/plans/';

				$destinationPath_en = public_path().$pathName_en;

				$file_doc_en->move($destinationPath_en, $doc_name_en);
                
                if(is_file(public_path().$pathName.$plan->doc_translation) && file_exists(public_path().$pathName.$plan->doc_translation)){
					unlink(public_path().$pathName.$plan->doc_translation);
                }
                
				$plan->doc = $doc_name_en;

			}
            
            $plan->save();
         }


            //$event->slug=null;

            // $slug = SlugService::createSlug(event::class, 'slug', $request->title);
            // $event->slug=$slug;
            // app()->setLocale('en');

            $plan->update();

        if($plan){
            return redirect('cms/plans');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plan = Plan::find($id);

        $pathName = '/uploads/plans/';

		if(is_file(public_path().$pathName.$plan->doc) && file_exists(public_path().$pathName.$plan->doc)){
			unlink(public_path().$pathName.$plan->doc);
        }
        
        if(is_file(public_path().$pathName.$plan->doc_translation) && file_exists(public_path().$pathName.$plan->doc_translation)){
            unlink(public_path().$pathName.$plan->doc_translation);
        }

		Plan::destroy($id);

        return redirect('cms/plans');
    }
}
