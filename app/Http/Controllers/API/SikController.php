<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class SikController extends Controller
{
    public function sendSik(Request $request)
    {
        Log::info('request', $request);

        $fileName = $request->fileName;
        $filePath = \public_path() . '\fdc\\' . $fileName;

        $storagePath = Storage::disk('fdc-sftp')
            ->put($fileName, \file_get_contents($filePath));

        $storageName = basename($storagePath);

        Log::info("attempt_send_zip_to_fdc_server", ['storage_name' => $storageName, 'storage_path' => $storagePath]);
    }

    public function testGet(Request $request)
    {
        print "helo";
    }
}
