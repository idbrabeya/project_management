<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dailywork extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'question_id',
        'yesterday'
    ];
    public function user(){
      return $this->belongsTo(User::class,);
    }
}
