<?php 

namespace App\Http\Controllers\Invoices;

use App\Http\Resources\InvoiceResource;
use App\Models\Invoice;
use Illuminate\Support\Facades\Gate;
use Illuminate\Routing\Controller as BaseController;

class InvoiceController extends BaseController
{
    public function index($id) 
    { 
        $invoice = Invoice::find($id);

        return new InvoiceResource($invoice);   
    }
}