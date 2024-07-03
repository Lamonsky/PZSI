<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrintersModels extends Model
{
    use HasFactory;

    const CREATED_AT = "Utworzono";
    const UPDATED_AT = "Zmodyfikowano";

    protected $table = "drukarkimodele";
    protected $primaryKey = "IDdrukarki";

}
