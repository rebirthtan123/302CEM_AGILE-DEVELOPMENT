<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    
    protected $table = 'menus';
    public $timestamps = true;

    protected $fillable = [
        'categoryName',
        'itemName',
        'price',
        'created_time'
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

}
