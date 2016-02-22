<?php

/**
 * Created by PhpStorm.
 * User: Muhammad.Imran
 * Date: 1/5/2016
 * Time: 5:33 PM
 */
class Util
{
    public static function generate_random_letters($length) {
        $random = '';
        for ($i = 0; $i < $length; $i++) {
            $random .= chr(rand(ord('a'), ord('z')));
        }
        return $random;
    }
    //UPLOAD IMAGE FUNCTION
    public static function saveimage($data,$file_name= "",$image_type="png") {

		Yii::log($data,'error');
        if($file_name == "")
        {
            $file_name = time().rand(10000,99999);
        }

        $myBasePath = Yii::app()->basePath;
        $photo_name = $file_name;
        //$r = $this->hextobin($data);
        $r = base64_decode($data);
        $Path = "$myBasePath//..//images//$photo_name";
        file_put_contents("$Path", $r);
        $web_path = "http://" . $_SERVER['HTTP_HOST'] . Yii::app()->request->baseUrl . "/images/" . $photo_name;
        return $photo_name;

    }
    function hextobin($hexstr) {
        $n = strlen($hexstr);
        $sbin = "";
        $i = 0;
        while ($i < $n) {
            $a = substr($hexstr, $i, 2);

            $c = @pack("H*", $a);
            if ($i == 0) {
                $sbin = $c;
            } else {
                $sbin.=$c;
            }
            $i+=2;
        }
        return $sbin;
    }
    public function imageUrl()
    {
        return "http://" . $_SERVER['HTTP_HOST'] . Yii::app()->request->baseUrl . "/images/" ;
    }

}