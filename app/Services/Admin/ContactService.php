<?php

namespace App\Services\Admin;

use App\Models\Contact;
use App\Services\FileService;
use App\Services\TranslateService;

class ContactService
{
    protected FileService $fileService;
    protected TranslateService $translateService;

    public function __construct(FileService $fileService, TranslateService $translateService)
    {
        $this->fileService = $fileService;
        $this->translateService = $translateService;
    }

    public function create(array $data)
    {
        return Contact::query()->create([
            'address' => $this->translateService->createTranslate($data['address']),
            'company' => $this->translateService->createTranslate($data['company']),
            'email' => $data['email'],
            'phone' => $data['phone'],
            'image' => isset($data['image']) ? $this->fileService->saveFile($data['image'], Contact::IMAGE_PATH) : null,
        ]);
    }

    public function update(array $data, Contact $contact)
    {
        $contact->address = $this->translateService->updateTranslate($contact->address, $data['address']);
        $contact->company = $this->translateService->updateTranslate($contact->company, $data['company']);
        $contact->email = $data['email'];
        $contact->phone = $data['phone'];

        if (isset($data['image'])) {
            $contact->image = $this->fileService->saveFile($data['image_1'], Contact::IMAGE_PATH, $contact->image);
        }

        return $contact->save();
    }
}
