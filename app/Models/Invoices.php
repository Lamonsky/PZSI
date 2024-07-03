<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    use HasFactory;
    const CREATED_AT = "Utworzono";
    const UPDATED_AT = "Zmodyfikowano";

    protected $table = "faktura";
    protected $primaryKey = "id";

}
