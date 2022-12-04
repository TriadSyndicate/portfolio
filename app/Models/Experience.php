<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable =[
        'title',
        'company_logo',
        'company',
        'location',
        'start_date',
        'end_date',
        'description',
        'tech_stacks',
    ];

    protected $casts = [
        'description' => 'array',
        'tech_stacks' => 'array',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

}
