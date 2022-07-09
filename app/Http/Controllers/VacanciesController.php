<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Vacancy;


class vacanciesController extends BaseController {

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacancies = Vacancy::orderBy('id', 'DESC')->get();
        return view('cms.vacancies.index', compact('vacancies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.vacancies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Vacancy::$rules);

        $data = $request->except('file','file_en','title_en'); 
 
        if ($request->hasFile('file'))
        {

            if ($request->file('file')->isValid())
            {
                $file_url = $request->file('file');

                $doc_name = 'sw-'.time() . '-' .$file_url->getClientOriginalName();

                $pathName = '/uploads/vacancies/';

                $destinationPath = public_path().$pathName;

                $file_url->move($destinationPath, $doc_name);

                $data['file'] = $pathName.$doc_name;

               /* $data['file_size'] = $request->file('file')->getClientSize();*/


            }
        }

        $vacancy = Vacancy::create($data);

        if ($request->hasFile('file_en'))
        {

            if ($request->file('file_en')->isValid())
            {
                $file_url_en = $request->file('file_en');

                $doc_name_en = 'en-'.time() . '-' .$file_url_en->getClientOriginalName();

                $pathName = '/uploads/vacancies/';

                $destinationPath = public_path().$pathName;

                $file_url_en->move($destinationPath, $doc_name_en);

                /*$data['file'] = $pathName.$doc_name_en;*/
                app()->setLocale('en');
                $vacancy->file=$pathName.$doc_name_en;
                $vacancy->save();
            }
        }

        if(request('title_en')){
            app()->setLocale('en');
            $vacancy->title=request('title_en');
            $vacancy->save();
         }


        if($vacancy){
            return redirect('cms/vacancies');
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
        $vacancy = Vacancy::find($id);
        return view("cms.vacancies.edit", compact('vacancy'));
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
    	$vacancy = Vacancy::find($id);


        /*$validator = Validator::make($data = $request->all(), $rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('file_en'))
		{

			if ($request->file('file_en')->isValid())
			{
			    $file_url_en = $request->file('file_en');

				$doc_name_en = 'en'.time() . '-' .$file_url_en->getClientOriginalName();

				$pathName = '/uploads/vacancies/';

				$destinationPath = public_path().$pathName;

				$file_url_en->move($destinationPath, $doc_name_en);

				$data['file_en'] = $pathName.$doc_name_en;

				if(is_file(public_path().$vacancy->file_en) && file_exists(public_path().$vacancy->file_en)){
					unlink(public_path().$vacancy->file_en);
				}

			}
		}


		if ($request->hasFile('file_sw'))
		{

			if ($request->file('file_sw')->isValid())
			{
			    $file_url_sw = $request->file('file_sw');

				$doc_name_sw = 'sw'.time() . '-' .$file_url_sw->getClientOriginalName();

				$pathName = '/uploads/vacancies/';

				$destinationPath = public_path().$pathName;

				$file_url_sw->move($destinationPath, $doc_name_sw);

				$data['file_sw'] = $pathName.$doc_name_sw;

				if(is_file(public_path().$vacancy->file_sw) && file_exists(public_path().$vacancy->file_sw)){
					unlink(public_path().$vacancy->file_sw);
				}

			}
		}*/

        $vacancy = Vacancy::find($id);

       $rules=vacancy::$rules;
       $rules['file']='';

        $request->validate($rules);

        $data = $request->except('file','file_en','title_en'); 

        $vacancy->update($data);
 
        if ($request->hasFile('file'))
        {

            if ($request->file('file')->isValid())
            {
                $file_url = $request->file('file');

                $doc_name = 'sw-'.time() . '-' .$file_url->getClientOriginalName();

                $pathName = '/uploads/vacancies/';

                $destinationPath = public_path().$pathName;

                $file_url->move($destinationPath, $doc_name);

                $data['file'] = $pathName.$doc_name;

                if(file_exists(public_path().__($vacancy->file,[],'sw'))){
                    unlink(public_path().__($vacancy->file,[],'sw'));
                }

                $vacancy->file=$pathName.$doc_name;
                $vacancy->save();

            }
        }


        if ($request->hasFile('file_en'))
        {

            if ($request->file('file_en')->isValid())
            {
                $file_url_en = $request->file('file_en');

                $doc_name_en = 'en-'.time() . '-' .$file_url_en->getClientOriginalName();

                $pathName = '/uploads/vacancies/';

                $destinationPath = public_path().$pathName;

                $file_url_en->move($destinationPath, $doc_name_en);

                if(file_exists(public_path().__($vacancy->file,[],'en'))){
                    unlink(public_path().__($vacancy->file,[],'en'));
                }
                
                app()->setLocale('en');
                $vacancy->file=$pathName.$doc_name_en;
                $vacancy->save();
            }
        }

        if(request('title_en')){
            app()->setLocale('en');
            $vacancy->title=request('title_en');
            $vacancy->save();

         }



        return redirect('cms/vacancies');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    	$vacancy = Vacancy::find($id);

		if(file_exists(public_path().__($vacancy->file_en))){
			unlink(public_path().__($vacancy->file_en));
		}

		if(file_exists(public_path().__($vacancy->file,[],'sw'))){
			unlink(public_path().__($vacancy->file,[],'sw'));
		}

		Vacancy::destroy($id);

        return redirect('cms/vacancies');
    }

}
