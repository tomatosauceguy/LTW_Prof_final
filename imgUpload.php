<?php
    declare(strict_types = 1);

    function uploadImage(PDO $db,string $folder,string $imgName){
        // Create folders if they don't exist
        if (!is_dir(__DIR__ . "/images")) mkdir(__DIR__ . "/images");
        if (!is_dir(__DIR__ . "/images/$folder")) mkdir(__DIR__ . "/images/$folder");
        if (!is_dir(__DIR__ . "/images/$folder/originals")) mkdir(__DIR__ . "/images/$folder/originals");
        if (!is_dir(__DIR__ . "/images/$folder/thumbs_small")) mkdir(__DIR__ . "/images/$folder/thumbs_small");
        if (!is_dir(__DIR__ . "/images/$folder/thumbs_medium")) mkdir(__DIR__ . "/images/$folder/thumbs_medium");

        // Generate filenames for original, small and medium files
        $originalFileName = __DIR__ . "/images/$folder/originals/$imgName.jpg";
        $smallFileName = __DIR__ . "/images/$folder/thumbs_small/$imgName.jpg";
        $mediumFileName = __DIR__ . "/images/$folder/thumbs_medium/$imgName.jpg";

        //this function moves the file from a to b... why is it called rename????
        rename( __DIR__ . "/temp/$folder.jpg", $originalFileName);

        // Crete an image representation of the original image
        $original = imagecreatefromjpeg($originalFileName);
        if (!$original) $original = imagecreatefrompng($originalFileName);
        if (!$original) $original = imagecreatefromgif($originalFileName);

        if (!$original) die();
        /* TODO: create smaller version of image
        $width = imagesx($original);     // width of the original image
        $height = imagesy($original);    // height of the original image
        $square = min($width, $height);  // size length of the maximum square

        // Create and save a small square thumbnail
        $small = imagecreatetruecolor(200, 200);
        imagecopyresized($small, $original, 0, 0, ($width>$square)?($width-$square)/2:0, ($height>$square)?($height-$square)/2:0, 200, 200, $square, $square);
        imagejpeg($small, $smallFileName);

        // Calculate width and height of medium sized image (max width: 400)
        $mediumwidth = $width;
        $mediumheight = $height;
        if ($mediumwidth > 400) {
            $mediumwidth = 400;
            $mediumheight = $mediumheight * ( $mediumwidth / $width );
        }

        // Create and save a medium image
        $medium = imagecreatetruecolor($mediumwidth, $mediumheight);
        imagecopyresized($medium, $original, 0, 0, 0, 0, $mediumwidth, $mediumheight, $width, $height);
        imagejpeg($medium, $mediumFileName);*/

        //header("Location: index.php");
    }    
?>
