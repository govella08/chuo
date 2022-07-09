<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use App\Models\Tender;

use Auth;

class TendersController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tenders = Tender::orderBy('id', 'DESC')->paginate(15);
        return view('cms.tenders.index', compact('tenders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.tenders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Tender::$rules);

        $data = $request->except('file','file_en','title_en','summary_en'); 
 
        if ($request->hasFile('file'))
        {

            if ($request->file('file')->isValid())
            {
                $file_url = $request->file('file');

                $doc_name = 'sw-'.time() . '-' .$file_url->getClientOriginalName();

                $pathName = '/uploads/tenders/';

                $destinationPath = public_path().$pathName;

                $file_url->move($destinationPath, $doc_name);

                $data['file'] = $pathName.$doc_name;

               /* $data['file_size'] = $request->file('file')->getClientSize();*/


            }
        }

        $tender = Tender::create($data);

        if ($request->hasFile('file_en'))
        {

            if ($request->file('file_en')->isValid())
            {
                $file_url_en = $request->file('file_en');

                $doc_name_en = 'en-'.time() . '-' .$file_url_en->getClientOriginalName();

                $pathName = '/uploads/tenders/';

                $destinationPath = public_path().$pathName;

                $file_url_en->move($destinationPath, $doc_name_en);

                /*$data['file'] = $pathName.$doc_name_en;*/
                
                $tender->file=$pathName.$doc_name_en;
                app()->setLocale('en');
                $tender->save();
            }
        }

        if(request('title_en')){
            app()->setLocale('en');
            $tender->title=request('title_en');
            $tender->save();

         }

         if(request('summary_en')){
            
            app()->setLocale('en');
            $tender->summary=request('summary_en');
            $tender->save();
         }

        $tender->slug=null;

        $slug = SlugService::createSlug(Tender::class, 'slug', $request->title);
        $tender->slug=$slug;
        $tender->save();


       

        if($tender){
            return redirect('cms/tenders');
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
        $tender = Tender::find($id);
        return view("cms.tenders.edit", compact('tender'));
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
        $tender = Tender::find($id);

       $rules=Tender::$rules;
       $rules['file']='';

        $request->validate($rules);

        $data = $request->except('file','file_en','title_en','summary_en'); 

        $tender->update($data);
 
        if ($request->hasFile('file'))
        {

            if ($request->file('file')->isValid())
            {
                $file_url = $request->file('file');

                $doc_name = 'sw-'.time() . '-' .$file_url->getClientOriginalName();

                $pathName = '/uploads/tenders/';

                $destinationPath = public_path().$pathName;

                $file_url->move($destinationPath, $doc_name);

                $data['file'] = $pathName.$doc_name;

                if(file_exists(public_path().__($tender->file,[],'sw'))){
                    unlink(public_path().__($tender->file,[],'sw'));
                }

                $tender->file=$pathName.$doc_name;
                $tender->save();

            }
        }


        if ($request->hasFile('file_en'))
        {

            if ($request->file('file_en')->isValid())
            {
                $file_url_en = $request->file('file_en');

                $doc_name_en = 'en-'.time() . '-' .$file_url_en->getClientOriginalName();

                $pathName = '/uploads/tenders/';

                $destinationPath = public_path().$pathName;

                $file_url_en->move($destinationPath, $doc_name_en);

                if(file_exists(public_path().__($tender->file,[],'en'))){
                    unlink(public_path().__($tender->file,[],'en'));
                }
                
                $tender->file=$pathName.$doc_name_en;
                app()->setLocale('en');
                $tender->save();
            }
        }

        if(request('title_en')){
            app()->setLocale('en');
            $tender->title=request('title_en');
            $tender->save();

         }

         if(request('summary_en')){
            
            app()->setLocale('en');
            $tender->summary=request('summary_en');
            $tender->save();
         }

        $tender->slug=null;
        $tender->save();
        $slug = SlugService::createSlug(Tender::class, 'slug', $request->title);
        $tender->slug=$slug;
        $tender->save(); 

        return redirect('cms/tenders');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $tender = Tender::find($id);

        if(is_file(public_path().$tender->file_en) && file_exists(public_path().$tender->file_en)){
            unlink(public_path().$tender->file_en);
        }

        if(is_file(public_path().$tender->file) && file_exists(public_path().$tender->file)){
            unlink(public_path().$tender->file);
        }

        Tender::destroy($id);

        return redirect('cms/tenders');
    }

}
