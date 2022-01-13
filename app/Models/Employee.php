<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


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

    /**
     * A employee belongs to a EmployerPerson.
     *
     * @return  HasMany
     */
    public function dossiers(): HasMany
    {
        return $this->hasMany(Dossier::class)->with(['absenceCourses']);
    }

    /**
     * A employee belongs to a EmployerPerson.
     *
     * @return  \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employer(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }

}
