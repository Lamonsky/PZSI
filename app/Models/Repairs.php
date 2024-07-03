<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contractors;
use App\Models\Invoices;
use App\Models\Shops;

class Repairs extends Model
{
    use HasFactory;
    const CREATED_AT = "Utworzono";
    const UPDATED_AT = "Zmodyfikowano";

    protected $table = "Naprawy";
    protected $primaryKey = "IDNaprawy";

    public function ShopsFK(){
        return $this->belongsTo(Shops::class, "IDLokalizacji", "IDLokalizacji");
    }
    public function ContractorsFK(){
        return $this->belongsTo(Contractors::class, "IDDostawcy", "IDDostawcy");
    }
    public function InvoicesFK(){
        return $this->belongsTo(Invoices::class, "IDFaktury", "id");
    }
}
