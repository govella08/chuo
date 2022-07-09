<?php namespace App\Http\Controllers\site;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Vacancy;
use Response;
use Carbon\Carbon;

class VacanciesController extends BaseSiteController {

	public function index()
	{
		$vacancies = Vacancy::orderBy('id', 'DESC')->whereDate('deadline',">=",Carbon::now()->toDateString())->paginate(15);
		return view('site.vacancies.index', compact('vacancies'));
	}

}
