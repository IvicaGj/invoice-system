<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'status'
    ];

    protected $casts = [
        'id' => 'string',
        'due_date' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public $incrementing = false;

    public const DRAFT = 'draft';
    public const APPROVED = 'approved';
    public const REJECTED = 'rejected';

    public function company() : BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function product() : BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'invoice_products')->withPivot('quantity');
    }
}
