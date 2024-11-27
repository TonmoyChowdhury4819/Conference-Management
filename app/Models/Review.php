<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'paper_id', 'relevance', 'contribution', 'structure', 'standard',
        'studymethod', 'relevanceclarity', 'abstract', 'keyphrases',
        'discussion', 'reference', 'comments', 'status'
    ];
    use HasFactory;
}
