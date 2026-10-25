<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReportResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'                => $this->id,
            'area'              => $this->location->area->name,
            'location'          => $this->location->name,
            'facility_category' => $this->facilityCategory->name,
            'deskripsi'         => $this->deskripsi,
            'urgensi'           => $this->urgensi,
            'status'            => $this->status,
            'catatan_admin'     => $this->catatan_admin,
            'teknisi'           => $this->teknisi ? new UserResource($this->teknisi) : null,
            'attachments'       => AttachmentResource::collection($this->whenLoaded('attachments')),
            'created_at'        => $this->created_at->toDateTimeString(),
            'updated_at'        => $this->updated_at->toDateTimeString(),
        ];
    }
}
