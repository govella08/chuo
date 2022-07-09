<?php 
namespace App\Http\Controllers;


use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Translation as Translation;
use Illuminate\Http\Request;
use Waavi\Translation\Repositories\TranslationRepository;
use Waavi\Translation\Repositories\LanguageRepository;

class TranslationsController  extends BaseController {

  

    /**
     * Display a listing of categories
     *
     * @return Response
     */
    public function index(LanguageRepository $locals)
    {

        $translations = Translation::where('group','label')->orderBy('item','DESC')->orderBy('locale','DESC')->get();

        $available_locale=$locals->availableLocales();

        //dd($translations->shift()->id);
        
        return view('cms.translations.index', compact('translations','available_locale'));
    }

    /**
     * Show the form for creating a new category
     *
     * @return Response
     */
    public function create()
    {
        return view('cms.translations.create');
    }

    /**
     * Store a newly created category in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        Translation::create($request->all());

        //Notification::success('Translation successfully <strong>created!</strong>');
        return Redirect('cms/translations');
    }


    /**
     * Update the specified category in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function trans_update(Request $request,TranslationRepository $translate)
    {
        //dd($request->all());
        foreach (request('ids') as $key => $value) {
           //dd($key);
            $translate->update($key,$value);
        }
     /*    foreach($request->keyword as $key=>$value){
    
            Translation::find($key)->update($value);
         }
*/

        // Notification::success('Translations <strong>Updated</strong>');

         return Redirect('cms/translations')->with(['success' => "Translations data updated successfully"]);
        //return Redirect::back()->with(['success' => "Your Password have been changed"]);
     }

    /**
     * Remove the specified category from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id,Request $request)
    {
        Translation::destroy($id);

        
        return redirect()->route('cms.translations.index',['aa'=>$request->aa]);
    }



}