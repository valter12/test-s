<?php

namespace Front\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {

    /**
     * "homepage" page
     * @return type
     */
    public function homepageAction() {
        return $this->render('FrontFrontBundle:Default:homepage.html.twig');
    }

    /**
     * "our plans" page
     * @return 
     */
    public function plansAction() {
        return $this->render('FrontFrontBundle:Default:plans.html.twig');
    }

    /**
     * generates captcha
     */
    public function captchaAction() {
//        session_start();
        /*
          we create out image from the existing jpg image.
          You can replace that image with another of the
          same size.
         */
        $img = imagecreatefromjpeg("../web/images/texture.jpg");
        /*
          defines the text we use in our image,
          in our case the security number defined
          in index.php
         */
        
        $str = 'qwertyuiopasdfghjklzxcvbnm1234567890';
        $str = str_shuffle($str);
        $rand = rand(0, strlen($str)-5);
        $final_string = substr($str, $rand, 5);
        
        $_SESSION['security_number'] = $final_string;
        $security_number = empty($_SESSION['security_number']) ? 'error' : $_SESSION['security_number'];
        $image_text = $security_number;
        /*
          we define 3 random numbers that will
          eventually create our text color code (RGB)
         */
        $red = rand(100, 255);
        $green = rand(100, 255);
        $blue = rand(100, 255);
        /*
          in order to have different color for our text,
          we substract from the maximum 255 the random
          number generated above
         */
        $text_color = imagecolorallocate($img, 255 - $red, 255 - $green, 255 - $blue);
        /*
          this adds the text stored in $image_text to our
          capcha image
         */
        $text = imagettftext($img, 16, rand(-10, 10), rand(10, 30), rand(25, 35), $text_color, "fonts/courbd.ttf", $image_text);
        /*
          we tell the browser that he's dealing
          with a jpg image, although that's not true,
          he will have to belive us
         */
        header("Content-type:image/jpeg");
        header("Content-Disposition:inline ; filename=secure.jpg");
        imagejpeg($img);
        die;
    }

}
