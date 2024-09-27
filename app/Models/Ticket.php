<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'customer_id',
        'subject',
        'description',
        'priority_level',
        'attachment',
        'customer_name',
        'status',
        'resolved_at'
    ];
}