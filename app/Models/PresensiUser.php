<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PresensiUser extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'presensi_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'presensi_id',
        'user_id',
    ];
}
