<?php

namespace App\Models;

use  Jenssegers\Mongodb\Eloquent\Model;

class Schueler extends Model
{
    protected $connection = 'mongodb';
}
