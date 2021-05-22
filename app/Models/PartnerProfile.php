<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class PartnerProfile extends Model
{
    use HasFactory, HasRoles, softDeletes;

    protected $table = 'partner_profiles';
    protected $primaryKey = 'id';
}
