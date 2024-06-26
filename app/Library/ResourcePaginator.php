<?php
namespace App\Library;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Pagination\LengthAwarePaginator;
use JsonSerializable;

class ResourcePaginator implements JsonSerializable, Arrayable
{
    private ResourceCollection $collection;
    private LengthAwarePaginator $paginator;

    public function __construct(ResourceCollection $collection)
    {
        $this->collection = $collection;
        $this->paginator = $collection->resource;
    }

    public function toArray()
    {
        return array_merge($this->paginator->toArray(), ['data' => $this->collection]);
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
