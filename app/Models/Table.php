<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    protected $table = 'tables';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'src',
        'statusTable',
        'created_at'
    ];
}


