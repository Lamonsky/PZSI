<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PrintersInventory;
use App\Models\Contractors;
use App\Models\Invoices;

class Renting extends Model
{
    use HasFactory;
    const CREATED_AT = "Utworzono";
    const UPDATED_AT = "Zmodyfikowano";

    protected $table = "Dzierzawa";
    protected $primaryKey = "IDDzierzawy";

    public function PrintersInventoryFK(){
        return $this->belongsTo(PrintersInventory::class, "IDDrukarki", "IDdrukarki");
    }
    public function ContractorsFK(){
        return $this->belongsTo(Contractors::class, "IDDostawcy", "IDDostawcy");
    }
    public function InvoicesFK(){
        return $this->belongsTo(Invoices::class, "IDFaktury", "id");
    }

}
