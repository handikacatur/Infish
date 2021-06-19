<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class DepositPartner extends Model
{
    use HasFactory, HasRoles, softDeletes;

    protected $table = 'partner_deposits';
    protected $primaryKey = 'id';
}
