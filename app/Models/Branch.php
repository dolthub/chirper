<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $table = 'dolt_branches';
    protected $primaryKey = 'name';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
}
