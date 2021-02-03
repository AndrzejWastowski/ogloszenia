<?php
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;


function create_image($width,$height,$input,$output,$crop = '0')
{

    // create an image manager instance with favored driver
    $manager = new ImageManager(array('driver' => 'imagick'));    

    $img = $manager->make($input)->resize($width,$height, function ($constraint) {  
        $constraint->upsize(); })->stream('jpg', 75);
       // Storage::put($output, $img);
        Storage::disk('local')->put($output, $img);

}

function create_image_aspect_ratio($width,$input,$output)
{
    // create an image manager instance with favored driver
    $manager = new ImageManager(array('driver' => 'imagick'));  

    $width_org = $manager->make($input)->width();
    $height_org = $manager->make($input)->height();

    $img = $manager->make($input)->resize($width, null, function ($constraint) {
        $constraint->aspectRatio();
    })->stream('jpg', 75);
    
    
    Storage::disk('local')->put($output, $img);

}


function create_square_image($width,$input,$output)
{

    $manager = new ImageManager(array('driver' => 'imagick'));    


    $width_org = $manager->make($input)->width();
    $height_org = $manager->make($input)->height();

    if ($width_org>$height_org)    {
        //wycinamy środek zdjęcia, wyliczamy wycentrowany fragment 
        $x_crop = round(($width_org/2))-round($height_org/2);
        $img = $manager->make($input)->crop($height_org, $height_org, $x_crop, 0)->resize($width,$width)->stream('jpg', 75);
    }
    else {
        //wycinamy środek zdjęcia, wyliczamy wycentrowany fragment 
        $y_crop = round(($height_org/2))-round($width_org/2);
        $img = $manager->make($input)->crop($height_org, $height_org, $y_crop, 0)->resize($width,$width)->stream('jpg', 75);
    }
    Storage::disk('local')->put($output, $img);
    //Storage::put($output, $img);   
            
    return;    

}