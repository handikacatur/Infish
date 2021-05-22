<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class Transaction extends Model
{
    use HasFactory, HasRoles, softDeletes;

    protected $table = 'transactions';
    protected $primaryKey = 'id';
}
