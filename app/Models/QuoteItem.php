<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * App\Models\QuoteItem
 *
 * @property-read \App\Models\Product $product
 * @property-read int|null $quote_item_tax_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QuoteItem query()
 *
 * @mixin \Eloquent
 */
class QuoteItem extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    const PAYMENT_ATTACHMENT = 'payment_attachment';
    const OLD_CERTIFICATE = 'old_certificate';

    /**
     * Validation rules
     *
     * @var array
     */

    const PENDING = 0;

    const APPROVED = 1;

    const REJECTED = 2;

    const STATUS_ALL = 3;

    const PAID = 'Paid';

    const PROCESSING = 'Processing';

    const DENIED = 'Denied';

    const STATUS_ARR_ALL = 'All';

    const FULLPAYMENT = 2;

    const PARTIALLYPAYMENT = 3;

    public static $rules = [
        'product_id' => 'required',
        'quantity' => 'required|integer',
        'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        'paymentProof' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'oldCertificate' => 'nullable',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $messages = [
        'product_id.required' => 'The product field is required',
    ];

    protected $table = 'quote_items';

    public $fillable = [
        'quote_id',
        'product_id',
        'product_name',
        'quantity',
        'price',
        'total',
        'paymentProof',
        'oldCertificate',
    ];

    protected $casts = [
        'quote_id' => 'integer',
        'product_id' => 'integer',
        'product_name' => 'string',
        'quantity' => 'integer',
        'price' => 'double',
        'total' => 'double',
        'paymentProof' => 'string',
        'oldCertificate' => 'string',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
