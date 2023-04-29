<?php

namespace App\Policies;

use App\Models\Invoice;
use App\Models\User;

class InvoicePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the given invoice can be updated
     */
    public function update(Invoice $invoice)
    {
        return $invoice->status === Invoice::DRAFT;
    }
}
