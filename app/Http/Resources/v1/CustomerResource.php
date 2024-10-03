<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'type' => $this->type,
            'city' => $this->city,
            'email' => $this->email,
            'phoneNumber' =>$this->phone_number,
            'createdAt' => $this->created_at,
            'invoices' => InvoiceResource::collection($this->whenLoaded('invoices')),
        ];
    }
}
