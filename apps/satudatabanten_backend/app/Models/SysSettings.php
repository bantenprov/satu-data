<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SysSettings extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'settings';

    protected $primaryKey = 'setting_id';

    public $timestamps = false;
}
