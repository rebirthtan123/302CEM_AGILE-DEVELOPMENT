<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    public $timestamps = false;

    protected $fillable = [
        'table_id',
        'status',
        'created_time'
    ];

    public function menus()
    {
        return $this->belongsToMany(Menu::class)->withPivot(['quantity']);
    }

}
