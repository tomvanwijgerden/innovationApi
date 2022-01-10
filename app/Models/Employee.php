<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * Class AbsenceCourse
 *
 * @package  DotwebCloud\Entities\AbsenceCourses
 *
 * @property  int    $id
 * @property  string $name
 * @property  string $street
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
