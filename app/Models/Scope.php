<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scope extends Model
{
    protected $fillable = [
        'scopes',
        'conference_id'
    ]; 

    use HasFactory;
}
