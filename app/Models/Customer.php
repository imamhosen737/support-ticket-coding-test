<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model implements Authenticatable
{
    use HasFactory;
    use \Illuminate\Auth\Authenticatable;
}
