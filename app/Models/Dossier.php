<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;


/**
 * Class AbsenceCourse
 *
 * @package  DotwebCloud\Entities\AbsenceCourses
 *
 * @property  int     $id
 * @property  integer $employee_id
 * @property  integer $dossier_status_id
 * @property  Carbon  $start_at
 * @property  Carbon  $end_at
 */
class Dossier extends Model
{

    /**
     * The table name associated with the model.
     *
     * @var  string
     */
    protected $table = 'dossiers';

    /**
     * An absence course has an absence type.
     *
     * @return  HasMany
     */
    public function absenceCourses()
    {
        return $this->hasMany(AbsenceCourse::class);
    }
}
