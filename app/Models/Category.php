<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    public $timestamps = true;

    protected $casts = [
        // 'price' => 'float'
    ];

    protected $fillable = [
        'name',
        'description'
    ];
}
