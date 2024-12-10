<?php

namespace App\Models;

use App\Models\Work;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class Follow extends Model
{
    use HasFactory;
    protected $fillable =[
        'work_id',
        'news',
    ];
    public function work(){
        return $this->belongsTo(Work::class);
    }
}