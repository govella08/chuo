<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;
use App\Traits\TrackableTrait;
use App\Traits\TrackableInterface;
use Waavi\Translation\Traits\Translatable as WaaviTransilation;

class Plan extends Model implements TrackableInterface
{
    use FormAccessible , TrackableTrait;
    use WaaviTransilation;

    protected $guarded = [];

    public static $rules = [
        'implementing_agency'   =>  'optional',
        'description'   => 'required',
        'doc'   => 'required',
    ];

    public function getImplementingAgencyEnAttributes($value)
    {
        return __($this->implementing_agency_translation, [], 'en');
    }

    public function getDescriptionEnAttributes($value)
    {
        return __($this->description_translation, [], 'en');
    }

    public function getDocEnAttributes($value)
    {
        return __($this->description_translation, [], 'en');
    }
}
