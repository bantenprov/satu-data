<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SysNotifications extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sys_notifications';

    protected $primaryKey = 'notification_id';

    public $timestamps = false;


}
