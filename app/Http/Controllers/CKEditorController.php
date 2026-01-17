<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CKEditorController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = Str::slug($fileName) . '_' . time() . '.' . $extension;

            $destinationPath = public_path('uploads/ckeditor');
            if (!is_dir($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            if (!$request->file('upload')->move($destinationPath, $fileName)) {
                $message = 'Image upload failed. Please try again.';
                $CKEditorFuncNum = $request->input('CKEditorFuncNum');
                $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '', '$message')</script>";
                @header('Content-type: text/html; charset=utf-8');
                return $response;
            }

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('uploads/ckeditor/' . $fileName);
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            return $response;
        }

        $message = 'No image selected for upload.';
        $CKEditorFuncNum = $request->input('CKEditorFuncNum');
        $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '', '$message')</script>";
        @header('Content-type: text/html; charset=utf-8');
        return $response;
    }
}
