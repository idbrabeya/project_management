<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable =[
        'question',
        'group_id'
    ];
    public function grouptorelation(){
        return $this->belongsTo(Group::class,'group_id','id');
    }
}
