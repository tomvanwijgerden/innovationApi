<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * Class AbsenceCourse
 *
 * @package  DotwebCloud\Entities\AbsenceCourses
 *
 * @property  int    $id
 * @property  string $name
 */
class AbsenceType extends Model
{

    /**
     * The table name associated with the model.
     *
     * @var  string
     */
    protected $table = 'meta_absence_types';
}
