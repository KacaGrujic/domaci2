<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ReportTypeResource;


class ReportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap = 'report';
    public function toArray($request)
    {

        return [
            'reportid' => $this->resource->reportid,
            'reportname' => $this->resource->reportname,
            'analysys' => $this->resource->analysys,
            'company' => new CompanyResource($this->resource->company),
            'reporttype' => new ReportTypeResource($this->resource->reporttype)
        ];
    }
}
