<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LacakResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
      return [
        // 'kode' => $this->kode,
        // 'lokasi_tujuan'=> $this->lokasi_tujuan,
        // 'tanggal'=> $this->tanggal
      ];
    }
}
