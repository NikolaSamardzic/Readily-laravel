<?php

namespace App\Models\User\Resources;

use App\Models\Role\Resources\RoleResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public $preserveKeys = true;
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'username' => $this->username,
            'email' => $this->email,
            'created_at' => $this->created_at,
            'deleted_at' => $this->deleted_at,
            'banned_at' => $this->banned_at,
            'role' => RoleResource::make($this->role)
        ];
    }
}
