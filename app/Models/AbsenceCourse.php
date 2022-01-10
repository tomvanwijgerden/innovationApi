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
 * @property  int      $id
 * @property  Carbon   $start_at
 * @property  Carbon   $end_at
 * @property  Employee $employee_id
 * @property  integer  $absence_percentage
 * @property  integer  $type_id
 */
class AbsenceCourse extends Model
{

    /**
     * The table name associated with the model.
     *
     * @var  string
     */
    protected $table = 'absence_courses';
}
