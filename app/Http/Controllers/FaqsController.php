<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Faq;


class FaqsController extends BaseController {

	 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::orderBy('id', 'DESC')->get();
        return view('cms.faqs.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Faq::$rules);


        $faq = Faq::create($request->only('question','answer','active'));

        if(request('question_en')){
            app()->setLocale('en');
            $faq->question=request('question_en');
            $faq->save();
         }
         if(request('answer_en')){
            app()->setLocale('en');
            $faq->answer=request('answer_en');
            $faq->save();
         }

        if($faq){
            return redirect('cms/faqs');
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
        $faq = Faq::find($id);

        return view("cms.faqs.edit", compact('faq'));
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
        $request->validate(Faq::$rules);
        
        $faq = Faq::find($id);

        $faq->update($request->only('question','answer','active'));

        if(request('question_en')){
            app()->setLocale('en');
            $faq->question=request('question_en');
            $faq->save();
         }
         if(request('answer_en')){
            app()->setLocale('en');
            $faq->answer=request('answer_en');
            $faq->save();
         }

        return redirect('cms/faqs');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faq = Faq::destroy($id);

        return redirect('cms/faqs');
    }

}
