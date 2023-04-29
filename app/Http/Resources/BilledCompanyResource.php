<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BilledCompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'street' => $this->street,
            'city' => $this->city,
            'zip' => $this->zip,
            'phone' => $this->phone,
            'email' => $this->email
        ];
    }
}
