<?php

namespace App\Models;

use App\Models\Follow;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Work extends Model

{
    use HasFactory;

protected $fillable = [
     'company',
     'workapply',
     'status',
     'url',
     ];

     //Relacion One-to-Many can Follow 
     public function follows(){
        return $this->hasMany(Follow::class);
     }
}
