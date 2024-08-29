<?php

namespace Jdnk\Grossesse\Models;

use Illuminate\Database\Eloquent\Model;

class AntecedentObstetricaux extends Model
{
    // Nom de la table (si le nom ne suit pas la convention Laravel)
    protected $table = 'antecedent_obstetricaux';

    protected $guarded = [];

    // protected $fillable = [
    //     'issue_grossesse',
    //     'mode_accouchement',
    //     'complications',
    //     'id_grossesse',
    // ];
}
