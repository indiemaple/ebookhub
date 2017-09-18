<?php

namespace Ebookhub\Handler;

use Ebookhub\Handler\Exception\ImageUploadException;
use Illuminate\Support\Facades\Auth;
use Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ImageUploadHandler
{
    /**
     * @var UploadedFile $file
     */
    protected $file;

    protected $allowed_extensions = ["png", "jpg", "gif", "jpeg"];

    public function uploadImage($file)
    {
        $this->file = $file;
        $this->checkAllowedExtensionsOrFail();
        $local_image = $this->saveImageToLocal('topic', 1440);
        return ['filename' => get_user_static_domain() . $local_image];
    }

    protected function checkAllowedExtensionsOrFail()
    {
        $extension = strtolower($this->file->getClientOriginalExtension());
        if ($extension && !in_array($extension, $this->allowed_extensions)) {
            throw new ImageUploadException('You can only upload image with extensions: ' . implode($this->allowed_extensions, ','));
        }
    }

    public function saveImageTolocal($type, $resize, $filename = '')
    {
        $folderName = ($type == 'avatar')
            ? 'uploads/avatars'
            : 'uploads/images/' . date("Ym", time()) .'/'.date("d", time()) .'/'. Auth::user()->id;

        $destinationPath = public_path() . '/' . $folderName;
        $extension = $this->file->getClientOriginalExtension() ?: 'png';
        $safeName  = $filename ? :str_random(10) . '.' . $extension;
        $this->file->move($destinationPath, $safeName);

        if ($this->file->getClientOriginalExtension() != 'gif') {
            $img = Image::make($destinationPath . '/' . $safeName);
            $img->resize($resize, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img->save();
        }
        return $folderName .'/'. $safeName;
    }
}