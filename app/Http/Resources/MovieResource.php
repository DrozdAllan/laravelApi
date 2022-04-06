<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request) {
        return ['en_title'     => $this->en_title,
                'release_date' => $this->release_date,
                'synopsis'     => $this->synopsis,
                'fr_title'     => $this->fr_title,
                'de_title'     => $this->de_title,
                'es_title'     => $this->es_title,
                'it_title'     => $this->it_title,
                'ja_title'     => $this->ja_title,
                'zh_title'     => $this->zh_title,
                'ru_title'     => $this->ru_title,
                'slug'         => $this->slug,];
    }
}
