<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviewer extends Model
{
    use HasFactory;

    protected $fillable = [
        'conference_id',
        'paper_id',
        'name',
        'email',
        'password' 
    ]; 
}
