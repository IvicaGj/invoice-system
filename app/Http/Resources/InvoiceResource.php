<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CompanyResource;

class InvoiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'number' => $this->number,
            'due_date' => $this->due_date->format('d-m-Y'),
            'status' => $this->status,
            'company' => new CompanyResource($this->company),
            // 'billed_company' => BilledCompanyResource::collection($this->whenLoaded('company')),
            'products' => ProductResource::collection($this->product),
            'created_at' => $this->created_at->format('d-m-Y H:i:s'),
            'updated_at' => $this->updated_at->format('d-m-Y H:i:s')
        ];
    }
}
