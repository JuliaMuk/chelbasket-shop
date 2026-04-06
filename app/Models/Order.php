<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'order_date',
        'customer_name',
        'email',
        'phone',
        'city',
        'address',
        'comment',
        'total_price',
        'status',
    ];

    protected $casts = [
        'order_date' => 'datetime',
        'total_price' => 'decimal:2',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Добавляет позицию в заказ: при совпадении товара и варианта (размера) увеличивает quantity.
     * Цена фиксируется на момент добавления (актуальная цена товара / акция).
     *
     * @throws InvalidArgumentException
     */
    // public function addItem(Product $product, int $quantity = 1, ?string $characteristicValue = null): OrderItem
    // {
    //     if ($quantity < 1) {
    //         throw new InvalidArgumentException('Количество должно быть не меньше 1.');
    //     }

    //     $existing = $this->orderItems()
    //         ->where('product_id', $product->id)
    //         ->where(function ($query) use ($characteristicValue): void {
    //             if ($characteristicValue === null || $characteristicValue === '') {
    //                 $query->whereNull('characteristic_value')->orWhere('characteristic_value', '');
    //             } else {
    //                 $query->where('characteristic_value', $characteristicValue);
    //             }
    //         })
    //         ->first();

    //     $newTotalQty = $quantity + (int) ($existing?->quantity ?? 0);

    //     $available = $this->availableUnitsForVariant($product, $characteristicValue);
    //     if ($newTotalQty > $available) {
    //         throw new InvalidArgumentException('Недостаточно товара на складе.');
    //     }

    //     $unitPrice = $product->sale_price !== null
    //         ? (float) $product->sale_price
    //         : (float) $product->price;

    //     return DB::transaction(function () use ($existing, $product, $quantity, $newTotalQty, $characteristicValue, $unitPrice): OrderItem {
    //         if ($existing !== null) {
    //             $existing->update(['quantity' => $newTotalQty]);
    //             $this->recalculateTotal();

    //             return $existing->fresh();
    //         }

    //         $item = $this->orderItems()->create([
    //             'product_id' => $product->id,
    //             'product_name' => $product->name,
    //             'quantity' => $quantity,
    //             'characteristic_value' => $characteristicValue ?: null,
    //             'item_price' => $unitPrice,
    //         ]);

    //         $this->recalculateTotal();

    //         return $item;
    //     });
    // }

    // public function recalculateTotal(): void
    // {
    //     $sum = (float) $this->orderItems()
    //         ->get()
    //         ->sum(fn (OrderItem $line) => (float) $line->item_price * (int) $line->quantity);

    //     $this->update(['total_price' => $sum]);
    // }

    /**
     * Доступное количество: по размеру из characteristics или общий stock_quantity.
     */
    // protected function availableUnitsForVariant(Product $product, ?string $characteristicValue): int
    // {
    //     $chars = $product->characteristics;
    //     if (is_array($chars) && $characteristicValue !== null && $characteristicValue !== '' && array_key_exists($characteristicValue, $chars)) {
    //         return max(0, (int) $chars[$characteristicValue]);
    //     }

    //     return max(0, (int) $product->stock_quantity);
    // }
}
