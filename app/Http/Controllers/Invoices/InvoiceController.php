<?php 

namespace App\Http\Controllers\Invoices;

use App\Domain\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Resources\InvoiceResource;
use App\Models\Invoice;
use App\Modules\Approval\Application\ApprovalFacade;
use App\Modules\Approval\DTO\ApprovalDTO;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
class InvoiceController extends Controller
{
    protected $facade;

    public function __construct(ApprovalFacade $facade)
    {
        $this->facade = $facade;
    }

    public function index(Request $request) 
    { 
        $invoice = Invoice::findOrFail($request->invoice);

        return response()->json(new InvoiceResource($invoice));   
    }

    public function approve(Request $request)
    {
        $invoice = Invoice::findOrFail($request->invoice);
        
        $this->facade->approve(new ApprovalDTO(Uuid::fromString($invoice->id), StatusEnum::tryFrom($invoice->status)));

        return response()->json(['message' => 'Invoice updated successfully!'], 200);   
    }

    public function reject(Request $request)
    {
        $invoice = Invoice::findOrFail($request->invoice);

        $this->facade->reject(new ApprovalDTO(Uuid::fromString($invoice->id), StatusEnum::tryFrom($invoice->status)));

        return response()->json(['message' => 'Invoice updated successfully!'], 200);   
    }
}