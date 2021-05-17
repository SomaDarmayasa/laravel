<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nama'=> $this->nama,
            'role_id'=> $this->role_id,
            'nickname'=> $this->nickname,
            'telp'=> $this->telp
        ];
        return parent::toArray($request);
    }
}
