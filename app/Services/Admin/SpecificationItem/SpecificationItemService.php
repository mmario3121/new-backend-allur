<?php

namespace App\Services\Admin\SpecificationItem;

use App\Models\Specification;
use App\Models\SpecificationItem;
use App\Services\TranslateService;

class SpecificationItemService
{
    protected TranslateService $translateService;

    public function __construct(TranslateService $translateService)
    {
        $this->translateService = $translateService;
    }

    public function create(array $data, Specification $specification)
    {
        return SpecificationItem::query()->create([
            'title' => $this->translateService->createTranslate($data['title']),
            'specification_id' => $specification->id
        ]);
    }

    public function update(Specification $specification, SpecificationItem $specificationItem, array $data)
    {
        $specificationItem->title = $this->translateService
            ->updateTranslate($specificationItem->title, $data['title']);

        $specificationItem->specification_id = $specification->id;
        return $specificationItem->save();
    }

    public function delete(SpecificationItem $specificationItem)
    {
        if (count($specificationItem->mentorSpecificationItems)) {
            foreach ($specificationItem->mentorSpecificationItems as $mentorSpecificationItem) {
                $mentorSpecificationItem->delete();
            }
        }
        $specificationItem->titleTranslate?->delete();
        return $specificationItem->delete();
    }
}
