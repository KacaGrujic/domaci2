<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap = 'company';

    public function toArray($request)
    {
        return [
            'companyid' => $this->resource->companyid,
            'name' => $this->resource->name,
            'address' => $this->resource->address,
            'contact' => $this->resource->contact
        ];

    }
}
