<?php
namespace App\Modules\Invoices\Infrastructure;

use App\Domain\Enums\StatusEnum;
use App\Models\Invoice;
use App\Modules\Approval\DTO\ApprovalDTO;

class InvoiceRepository {

    public function updateStatus(ApprovalDTO $approvalDto, StatusEnum $newStatus): void
    {
        $invoice = Invoice::findOrFail($approvalDto->id->toString());
        
        $invoice->update(['status' => $newStatus->value]);
    }

}
