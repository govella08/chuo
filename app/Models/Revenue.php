<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;
use App\Traits\TrackableTrait;
use App\Traits\TrackableInterface;
use Waavi\Translation\Traits\Translatable as WaaviTransilation;

class Revenue extends Model implements TrackableInterface
{
    use FormAccessibel , TrackableTrait;
    use WaaviTransilation;

    protected $guarded = [];
    protected $translatableAttributes = ['summary', 'doc_attachment'];
    //
    public static $rules = [
        'financial_year'    => 'required',
        'revenue_month'     => 'required',
        'summary'    => 'required',
        'doc_attachment'    => 'required'
    ];

    public function getSummaryEnAttribute($value)
    {
        return __($this->summary_translation,[],'en');
    }
}
