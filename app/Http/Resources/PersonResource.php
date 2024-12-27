<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PersonResource extends JsonResource
{

    protected $includeRelations;

    public function __construct($resource, $includeRelations = false)
    {
        parent::__construct($resource);
        $this->includeRelations = $includeRelations;
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $includeRelations = $request->query('get_parents_childrens', false);

        $data = [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'birth_name' => $this->birth_name,
            'middle_names' => $this->middle_names,
            'date_of_birth' => $this->date_of_birth,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'creator' => $this->creator->first_name . ' ' . $this->creator->last_name,
        ];

        if ($this->includeRelations) {
            $data['children'] = PersonResource::collection($this->children);
            $data['parents'] = PersonResource::collection($this->parents);
        }

        return $data;
    }
}
