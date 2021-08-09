<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemTrans extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'item_transactions';
    
    
}
