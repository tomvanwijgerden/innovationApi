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
 * @property  integer $user_id
 * @property  integer $dossier_id
 * @property  Carbon  $last_seen
 * @property  Carbon  $created_at
 * @property  Carbon  $updated_at
 */
class RecentDossier extends Model
{

    /**
     * The table name associated with the model.
     *
     * @var  string
     */
    protected $table = 'recent_dossiers';

    /**
     * An recent dossier has an dossier.
     *
     * @return  BelongsTo
     */
    public function dossier()
    {
        return $this->belongsTo(Dossier::class);
    }

    /**
     * An recent dossier has an dossier.
     *
     * @return  BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
