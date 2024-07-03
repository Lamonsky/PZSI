<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Invoices;
use App\Models\Shops;

class Supplies extends Model
{
    use HasFactory;
    const CREATED_AT = "Utworzono";
    const UPDATED_AT = "Zmodyfikowano";

    protected $table = "Tonery";
    protected $primaryKey = "IDToneru";

    public function ShopsFK(){
        return $this->belongsTo(Shops::class, "IDLokalizacji", "IDLokalizacji");
    }
    public function InvoicesFK(){
        return $this->belongsTo(Invoices::class, "IDFaktury", "id");
    }
}
