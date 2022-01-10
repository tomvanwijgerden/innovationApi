<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


/**
 * Class AbsenceCourse
 *
 * @package  DotwebCloud\Entities\AbsenceCourses
 *
 * @property  int    $id
 * @property  string $name
 * @property  string $street
 */
class Employer extends Model
{

    /**
     * The table name associated with the model.
     *
     * @var  string
     */
    protected $table = 'employers';


    /**
     * A employer has one of many employees.
     *
     * @return  HasMany
     */
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
