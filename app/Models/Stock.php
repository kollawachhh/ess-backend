<?php

namespace App\Models;

use App\Models\Goods;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $table = 'stocks';
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'goods_id',
        'code',
        'amount',
        'total_price',
        'stock_type',
        'input',
        'responsible',
        'office',
        'delivery_route',
        'seller',
        'customer',
    ];

    public function goods() {
        return $this->belongsTo(Goods::class);
    }
}
