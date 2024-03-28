<?php

namespace App\Services\Admin\Specification;

use App\Models\Specification;
use App\Services\TranslateService;

class SpecificationService
{
    protected TranslateService $translateService;

    public function __construct(TranslateService $translateService)
    {
        $this->translateService = $translateService;
    }

    public function create(array $data)
    {
        return Specification::query()->create([
            'title' => $data['title'],
            'title_kz' => $data['title_kz'],
            'value' => $data['value'],
            'value_kz' => $data['value_kz'],
            'position' => $data['position'],
            'specification_category_id' => $data['specification_category_id'],
            'complectation_id' => $data['complectation_id'],
        ]);
    }

    public function update(array $data, Specification $specification)
    {
        $specification->title = $data['title'];
        $specification->title_kz = $data['title_kz'];
        $specification->value = $data['value'];
        $specification->value_kz = $data['value_kz'];
        $specification->position = $data['position'];
        $specification->specification_category_id = $data['specification_category_id'];
        $specification->complectation_id = $data['complectation_id'];
        return $specification->save();
    }

    public function delete(Specification $specification)
    {
        $specification->titleTranslate?->delete();
        return $specification->delete();
    }
}
