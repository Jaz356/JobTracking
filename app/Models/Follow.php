<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class Follow extends Model
{
    /**
     * Display a listing of the resource.
     */
    protected $fillable =[
        'works_id',
        'news',
    ];
    public function work(){
        return $this->belongsTo(Work::class);
    }
}