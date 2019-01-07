<?php

namespace App\Http\Controllers;

use InfyOm\Generator\Utils\ResponseUtil;
use Response;

/**
 * @SWG\Swagger(
 *   basePath="/api/v1",
 *   @SWG\Info(
 *     title="Laravel Generator APIs",
 *     version="1.0.0",
 *   )
 * )
 * This class should be parent class for other API controllers
 * Class AppBaseController
 */
class AppBaseController extends Controller
{
    public function sendResponse($result, $message)
    {
        return Response::json(ResponseUtil::makeResponse($message, $result));
    }

    public function sendError($error, $code = 404)
    {
        return Response::json(ResponseUtil::makeError($error), $code);
    }

    public function namingFile($prefix = 'default', $extension = '.jpg')
    {
    	return sprintf("%s_%s.%s", $prefix, sha1(time()), $extension);
    }

    public function uploadFile($fieldName = null, $filePrefix = 'default')
    {    	
    	if($fieldName !== null) {
    		if(request()->hasFile($fieldName)) {
    			$file =  request()->file($fieldName);
    			$filename = $this->namingFile($filePrefix, $file->getClientOriginalExtension());

    			$file->move(public_path('images'), $filename);
    			return $filename;
    		}
    	}
    	return null;
    }

    public function deleteFile($filePath = null)
    {
    	if($filePath) {
    		if(file_exists($filePath)) return @unlink($filePath);
    	}
    	return false;
    }
}
