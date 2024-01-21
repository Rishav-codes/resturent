<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;
    public function OrderItem(): HasMany
    {
        return $this->hasMany(OrderItem::class, "order_id", "id");
    }

    public function users():HasOne{
        return $this->hasOne(User::class,"id","user_id");
    }
}
