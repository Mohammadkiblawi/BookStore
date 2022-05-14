<?php

namespace App\Traits;

trait ImageUploadTrait
{
    protected $image_path = "app/public/images/covers";
    protected $image_height = "600";
    protected $image_width = "600";

    public function uploadImage($img)
    {
        $img_name = $this->imageName($img);
        \Image::make($img)->resize($this->image_width, $this->image_height)->save(storage_path($this->image_path . '/' . $img_name));
        return "images/covers/" . $img_name;
    }

    public function imageName($image)
    {
        return time() . '-' . $image->getClientOriginalName();
    }
}
