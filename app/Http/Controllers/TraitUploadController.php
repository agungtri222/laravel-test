<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

trait TraitUploadController
{
    /**
     * Uploading file method
     *
     * @return string path name
     * @author 
     **/
    public function uploading(Request $request,$formField, $prefix = 'image_', $oldFile = null)
    {
    	$file = null;
    	if($input=$request->hasFile("$formField")) {
			$hashName = sha1(time()).'.'. $request->file("$formField")->getClientOriginalExtension();
            $fileName  = $prefix . $hashName;

	    	if(! $oldFile) {	    		
	            if($request->file("$formField")->move(public_path('upload'), $fileName)) $file = $fileName;	            
	    	} else {	    		
	    		if($request->file("$formField")->move(public_path('upload'), $fileName)) {				
	    			@unlink(public_path("upload/{$oldFile}"));
	        		$file = $fileName;
            	}        
	    	}    		
	    }
	    return $file;
    }
}
