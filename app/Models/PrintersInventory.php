<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PrintersModels;
use App\Models\Contractors;

class PrintersInventory extends Model
{
    use HasFactory;
    const CREATED_AT = "Utworzono";
    const UPDATED_AT = "Zmodyfikowano";

    protected $table = "Drukarkiinwentaryzacja";
    protected $primaryKey = "IDdrukarki";

    public function PrintersModelsFK(){
        return $this->belongsTo(PrintersModels::class, "IDModeluDrukarki", "IDdrukarki");
    }
    public function ContractorsFK(){
        return $this->belongsTo(Contractors::class, "IDDostawcy", "IDDostawcy");
    }
    public function LocationsFK(){
        return $this->belongsTo(Shops::class, "IDLokalizacji", "IDLokalizacji");
    }
}
