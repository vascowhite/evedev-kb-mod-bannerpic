<?php
//set up options
options::cat('Modules', 'BannerPic', 'Settings');
options::fadd('Use as killboard banner?', 'mod_bannerpic_bannerreplace', 'checkbox');
options::fadd('Base picture to use for banner', 'none', 'custom', array('banner', 'basePic'));

options::cat('Modules', 'BannerPic', 'Victim Portrait');
options::fadd('Left edge', 'none', 'custom', array('banner', 'vicPicLeft'));
options::fadd('Top edge', 'none', 'custom', array('banner', 'vicPicTop'));
options::fadd('Transparency', 'none', 'custom', array('banner', 'vicPicTrans'));

options::cat('Modules', 'BannerPic', 'Victim Ship Picture');
options::fadd('Left edge', 'none', 'custom', array('banner', 'shipPicLeft'));
options::fadd('Top edge', 'none', 'custom', array('banner', 'shipPicTop'));
options::fadd('Transparency', 'none', 'custom', array('banner', 'shipPicTrans'));

options::cat('Modules', 'BannerPic', 'Killer Text Position');
options::fadd('Left edge', 'none', 'custom', array('banner', 'killStrLeft'));
options::fadd('Top edge', 'none', 'custom', array('banner', 'killStrTop'));

options::cat('Modules', 'BannerPic', 'Victims Corporation Position');
options::fadd('Left edge', 'none', 'custom', array('banner', 'corpStrLeft'));
options::fadd('Top edge', 'none', 'custom', array('banner', 'corpStrTop'));

options::cat('Modules', 'BannerPic', 'Victims Alliance Position');
options::fadd('Left edge', 'none', 'custom', array('banner', 'alliStrLeft'));
options::fadd('Top edge', 'none', 'custom', array('banner', 'alliStrTop'));

options::cat('Modules', 'BannerPic', 'Victims Ship Position');
options::fadd('Left edge', 'none', 'custom', array('banner', 'shipStrLeft'));
options::fadd('Top edge', 'none', 'custom', array('banner', 'shipStrTop'));

options::cat('Modules', 'BannerPic', 'Colours');
options::fadd('Border Box', 'none', 'custom', array('banner', 'boxCols'));
options::fadd('Text', 'none', 'custom', array('banner', 'textCols'));

options::cat('Modules', 'BannerPic', 'Font');
options::fadd('Font File', 'none', 'custom', array('banner', 'fontFile'));
options::fadd('Font Size', 'none', 'custom', array('banner', 'fontSize'));

options::cat('Modules', 'BannerPic', 'Preview');
options::fadd('Disable cache to enable preview updates', 'mod_bannerpic_nocache', 'checkbox');
options::fadd('Preview', 'none', 'custom', array('banner', 'preview'));

options::cat('Modules', 'BannerPic', 'About');
options::fadd('BannerPic for EDK3', 'none', 'custom', array('banner', 'about'));