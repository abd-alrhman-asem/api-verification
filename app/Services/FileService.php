<?php

namespace App\Services;

use App\Http\Requests\Auth\signupAndVerificationRequests\SignupRequest;
use Illuminate\Http\Request;

// For file storage

class FileService
{
    /**
     * @param Request $request
     * @param string $fileKey
     * @param $path
     * @return string|null
     */
    public function handleFile(SignupRequest $request, string $fileKey, $path): ?string
    {
        if (!$request->hasFile($fileKey)) {
            return null;
        }
        $file = $request->file($fileKey);
        $fileName = microtime() . '.' . $file->getClientOriginalExtension();
        return $file->move(storage_path($path), $fileName);
    }
}
