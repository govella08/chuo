<?php namespace App\Http\Controllers\site;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Administration;
use App\Models\AdministrationCategories;

class AdministrationController extends BaseSiteController {

	public function index()
	{

		$administration = Administration::orderByRaw('FIELD(title,"Solicitor General","Deputy Solicitor General","Director","Manager")')->paginate(4);
		return view('site.administration.show', compact('administration'));
	}

	public function single_admin($id)
	{
		$administration = Administration::where('id','=',$id)->first();
		return view('site.administration.single', compact('administration'));
	}

	public function show($id)
	{
		//$category_board = AdministrationCategories::where('id',$id)->where('slug','board-member')->first();
	
		$category_board = AdministrationCategories::where('id',$id)->first();
		$category = AdministrationCategories::where('id',$id)->first();

		/*$managements = Administration::whereIn('category_id', function($query) use ($id){
			$query->select('id')->from('administration_categories')->where('id',$id)->where('slug','board-member');
		})->orderByRaw('FIELD(title,"Chair Person", "Vice Chair Person","General Secretary","Secretary","Board Member","Head of Department")')->get();*/
		
		$managements = Administration::whereIn('category_id', function($query) use ($id){
			$query->select('id')->from('administration_categories')->where('id',$id);
		})->orderByRaw('FIELD(title,"Chair Person", "Vice Chair Person","General Secretary","Secretary","Board Member","Head of Department")')->get();

		// $administration = Administration::whereIn('category_id', function($query) use ($id){
		// 	$query->select('id')->from('administration_categories')->where('id',$id);
		// })->orderByRaw('FIELD(title,"Solicitor General","Deputy Solicitor General","Director","Manager","Head of Department")')->get();

		$administration = Administration::whereIn('category_id', function($query) use ($id){
			$query->select('id')->from('administration_categories')->where('id',$id);
		})->orderBy('position', 'ASC')->orderBy('group_id', 'ASC')->get();

		if($category_board){
			$category=$category_board;
		}

		/*$ceo=Administration::where('position',1)->limit(1)->first();
		$directors=displayOtherPositions(2,4);
		$heads=displayOtherPositions(3,6);
		$manager=displayOtherPositions(4,10);*/
		
		return view('site.administration.index', compact('administration', 'category','managements'));
	}
}
