<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
function sosmed($jenis){
    if($jenis == "instagram"){
        $url = "https://www.instagram.com/sdit.alhikmah/";
    }elseif($jenis == "youtube"){
        $url = "https://www.youtube.com/channel/UCqOuYg6t0fi34z6nxBACQKw";
    }elseif($jenis == "facebook"){
        $url = "";
    }

    return $url;
}