<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class FileService
{
    public function deleteFile($name, $path)
    {
        if ($name && Storage::disk('custom')->exists($path . '/' . $name)) {
            Storage::disk('custom')->delete($path . '/' . $name);
        }
        return null;
    }

    public function saveFile($file, $path, $oldFileName = null)
    {
        if ($oldFileName) {
            $this->deleteFile($oldFileName, $path);
        }

        Storage::disk('custom')->makeDirectory($path);
        $directory = Storage::disk('custom')->path($path);

        if (!is_writable($directory)) {
            chmod($directory, 0777);
        }

        $extension = $file->getClientOriginalExtension();
        $randomFileName = $this->generateRandomFileName($extension);

        Storage::disk('custom')->putFileAs($path, $file, $randomFileName);

        return $randomFileName;
    }

    private function generateRandomFileName($extension)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $randomString = '';

        for ($i = 0; $i < 10; $i++) { // You can adjust the length of the random string as needed
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomString . '.' . $extension;
    }
}
