<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShortLink extends Model
{
    protected $fillable = [
        'link', 'code', 'title', 'description', 'image'
    ];

    public static function getMeta($type, $title, $description, $url, $image)
    {
        $output  = "<meta property=\"og:type\" content=\"{$type}\">" . PHP_EOL;
        $output .= "<meta property=\"og:title\" content=\"{$title}\">" . PHP_EOL;
        $output .= "<meta property=\"og:image\" content=\"{$image}\">" . PHP_EOL;
        $output .= "<meta property=\"og:description\" content=\"{$description}\">" . PHP_EOL;
        $output .= "<meta property=\"og:url\" content=\"{$url}\">" . PHP_EOL;

        return $output;
    }

    public function uploading($name, $wmax, $hmax, $directory){
        $uploaddir = $directory;
        $size = 3280000;
        $ext = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $_FILES[$name]['name'])); // pic extension
        $types = ["image/gif", "image/png", "image/jpeg", "image/pjpeg", "image/x-png"]; // array of valid extensions
        if($_FILES[$name]['size'] > $size)
        {
            $answer['error'] = "Error! The maximum file size is 3 MB!";
            exit(json_encode($answer));
        }
        if($_FILES[$name]['error'])
        {
            $answer['error'] = "Error! The file may be too large.";
            exit(json_encode($answer));
        }
        if(!in_array($_FILES[$name]['type'], $types))
        {
            $answer['error'] = "Acceptable extensions - .gif, .jpg, .png";
            exit(json_encode($answer));
        }
        $new_name = substr( md5(time()), 0, 7) . ".$ext";
        $uploadfile = $uploaddir.$new_name;
        if(move_uploaded_file($_FILES[$name]['tmp_name'], $uploadfile))
        {
            switch ($name) {
                case 'poster':

                    break;

                case 'product-background':
                    # code
                    break;

                default:
                    session()->put(['name', $new_name]);
                    break;
            }
            self::resize($uploadfile, $uploadfile, $wmax, $hmax, $ext);
            $answer['file'] = $new_name;
            $answer['dir'] = $uploadfile;
            $answer['status'] = 'success';
            $answer['path'] = asset('images/' . $new_name) ;
            $answer['name'] = $_FILES[$name]['name'];
            exit(json_encode($answer));
        }
    }

    /**
     * @param string $target - path to the original file
     * @param string $dest - destination path
     * @param string $wmax - maximum width
     * @param string $hmax - maximum height
     * @param string $ext - file extension
     */
    public static function resize($target, $dest, $wmax, $hmax, $ext){
        list($w_orig, $h_orig) = getimagesize($target);
        $ratio = $w_orig / $h_orig; // =1 - square, <1 - album, >1 - book

        if(($wmax / $hmax) > $ratio)
        {
            $wmax = $hmax * $ratio;
        }
        else
        {
            $hmax = $wmax / $ratio;
        }

        $img = "";
        // imagecreatefromjpeg | imagecreatefromgif | imagecreatefrompng
        switch($ext)
        {
            case("gif"):
                $img = imagecreatefromgif($target);
                break;
            case("png"):
                $img = imagecreatefrompng($target);
                break;
            default:
                $img = imagecreatefromjpeg($target);
        }
        $newImg = imagecreatetruecolor($wmax, $hmax); // creating a shell for a new image

        if($ext == "png")
        {
            imagesavealpha($newImg, true); // сохранение альфа канала
            $transPng = imagecolorallocatealpha($newImg,0,0,0,127); // adding transparency
            imagefill($newImg, 0, 0, $transPng); // fill
        }

        imagecopyresampled($newImg, $img, 0, 0, 0, 0, $wmax, $hmax, $w_orig, $h_orig); // copy and resize the image
        switch($ext)
        {
            case("gif"):
                imagegif($newImg, $dest);
                break;
            case("png"):
                imagepng($newImg, $dest);
                break;
            default:
                imagejpeg($newImg, $dest);
        }
        imagedestroy($newImg);
    }
}
