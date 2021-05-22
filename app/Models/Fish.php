<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class Fish extends Model
{
    use HasFactory, HasRoles, softDeletes;

    protected $table = 'fishes';
    protected $primaryKey = 'id';
}
