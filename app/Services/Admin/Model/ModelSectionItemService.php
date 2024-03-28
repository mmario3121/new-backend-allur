<?php

namespace App\Services\Admin\Model;

use App\Models\ModelSectionItem;
use App\Services\FileService;

class ModelSectionItemService
{
    protected FileService $fileService;

    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }
    public function create(array $data)
    {
        return ModelSectionItem::query()->create([
            'section_id' => $data['section_id'],
            'title' => $data['title'],
            'title_kz' => $data['title_kz'],
            'text' => $data['text'],
            'text_kz' => $data['text_kz'],
            'image' => isset($data['image']) ? $this->fileService->saveFile($data['image'], ModelSectionItem::IMAGE_PATH) : null,
        ]);
    }

    public function update(ModelSectionItem $sectionItem, array $data)
    {
        if (isset($data['image'])) {
            $sectionItem->image = $this->fileService->saveFile($data['image'], ModelSectionItem::IMAGE_PATH, $sectionItem->image);
        }
        // $section->model_id = $data['model_id'];
        $sectionItem->title = $data['title'];
        $sectionItem->title_kz = $data['title_kz'];
        $sectionItem->text = $data['text'];
        $sectionItem->text_kz = $data['text_kz'];
        return $sectionItem->save();
    }

    public function delete(ModelSectionItem $sectionItem)
    {
        return $sectionItem->delete();
    }
}
