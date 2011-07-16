<?php
include_once 'mods/bannerPic/class.bannerpic.php';
header("content-type:image/jpg");
$banner = new BannerPic();
$img = $banner->generate();
imagejpeg($img);