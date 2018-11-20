<?php

if (!function_exists('upload_image')) {
    /**
     * Helper for Laravel's validator
     *
     * @param object $validator
     * @return array
     */
    function upload_image($id , $table_name , $file , $width, $height)
    {
        $path = 'default.png';
        if ($_FILES[$file]){
           
         $post_photo = $_FILES[$file]['name'];
         $post_photo_tmp = $_FILES[$file]['tmp_name'];
     
      $ext = pathinfo($post_photo, PATHINFO_EXTENSION);///getting extention
      if($ext=='png'||$ext=='PNG'||$ext=='jpg'||$ext=='JPG'||$ext=='jpeg'||$ext=='JPEG'||$ext=='gif'||$ext=='GIF')
      {
        if($ext=='jpg' || $ext=='jpeg'||$ext=='JPG'||$ext=='JPEG')
        {
          $src=imagecreatefromjpeg($post_photo_tmp);
        }
        if($ext=='png' || $ext=='PNG')
        {
          $src=imagecreatefrompng($post_photo_tmp);
        }
        if($ext=='gif' || $ext=='GIF')
        {
          $src=imagecreatefromgif($post_photo_tmp);
        }

        list($width_min,$height_min) = getimagesize($post_photo_tmp);
        $newwidth_min = $width;///set compressing image width
        $newheight_min = $height;//($height_min/$width_min)*$newwidth_min;///equation for set image height
        $tmp_min = imagecreatetruecolor($newwidth_min, $newheight_min);///create fraame for compress image
        imagecopyresampled($tmp_min,$src, 0, 0, 0, 0, $newwidth_min, $newheight_min, $width_min, $height_min);/////compress

        imagejpeg($tmp_min,public_path('upload/'.$table_name.'/').($id).".".$ext,100);////copy image
         
        $path = '/' . $table_name . '/' . $id . '.' . $ext;
      }
     
        }
      else
      {
           $path = 'default.png';
      }
        return $path;

           
      

        
    }
}

