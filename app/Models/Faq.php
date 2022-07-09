<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;
use App\Traits\TrackableTrait;
use App\Traits\TrackableInterface;
use Waavi\Translation\Traits\Translatable as WaaviTransilation;

class Faq extends Model implements TrackableInterface {

    use FormAccessible,TrackableTrait;
	use WaaviTransilation;

	// validation rules
	public static $rules = [
		'question' => 'required',
		'answer' => 'required',
	];

	protected $guarded=[];

	protected $translatableAttributes = ['question', 'answer'];
	// strong parameters support array
	//protected $fillable = ['question_en', 'question_sw', 'answer_en', 'answer_sw', 'user_id'];
	protected $indexable = ['question', 'answer'];
	protected $urlPrefix = 'faqs';

	public function getQuestionEnAttribute($value)
    {
        return __($this->question_translation,[],'en');
    }
    public function getAnswerEnAttribute($value)
    {
        return __($this->answer_translation,[],'en');
    }
}
