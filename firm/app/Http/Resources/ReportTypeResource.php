<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReportTypeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    
     public static $wrap = 'reporttype';
     public function toArray($request)
     {
         return [
             'reporttypeid' => $this->resource->reporttypeid,
             'type' => $this->resource->type
         ];
 
     }
}
