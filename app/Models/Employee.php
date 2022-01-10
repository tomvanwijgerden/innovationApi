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
 * @property  int     $id
 * @property  string  $name
 * @property  Carbon  $date_of_birth
 * @property  integer $employer_id
 */
class Employee extends Model
{

    /**
     * The table name associated with the model.
     *
     * @var  string
     */
    protected $table = 'employees';
}