<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LicenseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $this->resource->addHidden(['name', 'photo']);
        $data = parent::toArray($request);
        $data['logo'] = $this->image_url;
        return $data;
    }
}
