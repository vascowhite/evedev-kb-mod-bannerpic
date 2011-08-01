<?php
$modInfo['bannerPic']['name'] = "bannerPic by vasco di (V2.01)";
$modInfo['bannerPic']['abstract'] = "Puts latest kill into kb and/or forum banner.";
$modInfo['bannerPic']['about'] = "<a href='http://eve-id.net/forum/viewtopic.php?f=505&t=17007'>EveDev forum page</a><br>";
$modInfo['bannerPic']['about'] .= "<a href='http://code.google.com/p/evedev-kb-mod-bannerpic/'>Google Code</a>";

include_once 'class.bannerpic.php';
event::register('home_assembling', 'banner::replace');

class banner
{	
	function replace(){
		if(Config::get('mod_bannerpic_bannerreplace') == 1){
			$banner = new BannerPic();
			$banner->generate();
		}
	}
	
	function basePic(){
		$html = '';
		if(isset($_POST['option_mod_bannerpic_basepic'])){
			Config::set('mod_bannerpic_basepic', $_POST['option_mod_bannerpic_basepic']);
		}
		$basepic = 'mods/bannerPic/base.jpg';
		Config::get('mod_bannerpic_basepic') == null ? Config::set('mod_bannerpic_basepic', $basepic) : $basepic = Config::get('mod_bannerpic_basepic');
		$html = "<input type='text' id='option_mod_bannerpic_basepic' name='option_mod_bannerpic_basepic' value='$basepic' size='". strlen($basepic) . "' />";
		return $html;
	}
	
	function vicPicLeft(){
		$html = '';
		if(isset($_POST['option_mod_bannerpic_vicpicleft'])){
			Config::set('mod_bannerpic_vicpicleft', $_POST['option_mod_bannerpic_vicpicleft']);
		}
		$vicpicLeft = 1;
		Config::get('mod_bannerpic_vicpicleft') == null ? Config::set('mod_bannerpic_vicpicleft', $vicpicLeft) : $vicpicLeft = Config::get('mod_bannerpic_vicpicleft');
		$html = "<input type='text' id='option_mod_bannerpic_vicpicleft' name='option_mod_bannerpic_vicpicleft' value='$vicpicLeft' />";
		return $html;
	}
	
	function vicPicTop(){
		$html = '';
		if(isset($_POST['option_mod_bannerpic_vicpictop'])){
			Config::set('mod_bannerpic_vicpictop', $_POST['option_mod_bannerpic_vicpictop']);
		}
		$vicpicTop = 1;
		Config::get('mod_bannerpic_vicpictop') == null ? Config::set('mod_bannerpic_vicpictop', $vicpicTop) : $vicpicTop = Config::get('mod_bannerpic_vicpictop');
		$html = "<input type='text' id='option_mod_bannerpic_vicpictop' name='option_mod_bannerpic_vicpictop' value='$vicpicTop' />";
		return $html;
	}
	
	function vicPicTrans(){
		$html = '';
		if(isset($_POST['option_mod_bannerpic_vicpictrans'])){
			Config::set('mod_bannerpic_vicpictrans', $_POST['option_mod_bannerpic_vicpictrans']);
		}
		$vicpicTrans = 100;
		Config::get('mod_bannerpic_vicpictrans') == null ? Config::set('mod_bannerpic_vicpictrans', $vicpicTrans) : $vicpicTrans = Config::get('mod_bannerpic_vicpictrans');
		$html = "<input type='text' id='option_mod_bannerpic_vicpictrans' name='option_mod_bannerpic_vicpictrans' value='$vicpicTrans' />";
		return $html;
	}
	
	function shipPicLeft(){
		$html = '';
		if(isset($_POST['option_mod_bannerpic_shippicleft'])){
			Config::set('mod_bannerpic_shippicleft', $_POST['option_mod_bannerpic_shippicleft']);
		}
		$shippicLeft = 70;
		Config::get('mod_bannerpic_shippicleft') == null ? Config::set('mod_bannerpic_shippicleft', $shippicLeft) : $shippicLeft = Config::get('mod_bannerpic_shippicleft');
		$html = "<input type='text' id='option_mod_bannerpic_shippicleft' name='option_mod_bannerpic_shippicleft' value='$shippicLeft' />";
		return $html;
	}
	
	function shipPicTop(){
		$html = '';
		if(isset($_POST['option_mod_bannerpic_shippictop'])){
			Config::set('mod_bannerpic_shippictop', $_POST['option_mod_bannerpic_shippictop']);
		}
		$shippicTop = 1;
		Config::get('mod_bannerpic_shippictop') == null ? Config::set('mod_bannerpic_shippictop', $shippicTop) : $shippicTop = Config::get('mod_bannerpic_shippictop');
		$html = "<input type='text' id='option_mod_bannerpic_shippictop' name='option_mod_bannerpic_shippictop' value='$shippicTop' />";
		return $html;
	}
	
	function shipPicTrans(){
		$html = '';
		if(isset($_POST['option_mod_bannerpic_shippictrans'])){
			Config::set('mod_bannerpic_shippictrans', $_POST['option_mod_bannerpic_shippictrans']);
		}
		$shippicTrans = 100;
		Config::get('mod_bannerpic_shippictrans') == null ? Config::set('mod_bannerpic_shippictrans', $shippicTrans) : $shippicTrans = Config::get('mod_bannerpic_shippictrans');
		$html = "<input type='text' id='option_mod_bannerpic_shippictrans' name='option_mod_bannerpic_shippictrans' value='$shippicTrans' />";
		return $html;
	}
	
	function killStrLeft(){
		$html = '';
		if(isset($_POST['option_mod_bannerpic_killstrleft'])){
			Config::set('mod_bannerpic_killstrleft', $_POST['option_mod_bannerpic_killstrleft']);
		}
		$killstrLeft = 145;
		Config::get('mod_bannerpic_killstrleft') == null ? Config::set('mod_bannerpic_killstrleft', $killstrLeft) : $killstrLeft = Config::get('mod_bannerpic_killstrleft');
		$html = "<input type='text' id='option_mod_bannerpic_killstrleft' name='option_mod_bannerpic_killstrleft' value='$killstrLeft' />";
		return $html;
	}
	
	function killStrTop(){
		$html = '';
		if(isset($_POST['option_mod_bannerpic_killstrtop'])){
			Config::set('mod_bannerpic_killstrtop', $_POST['option_mod_bannerpic_killstrtop']);
		}
		$killstrTop = 15;
		Config::get('mod_bannerpic_killstrtop') == null ? Config::set('mod_bannerpic_killstrtop', $killstrTop) : $killstrTop = Config::get('mod_bannerpic_killstrtop');
		$html = "<input type='text' id='option_mod_bannerpic_killstrtop' name='option_mod_bannerpic_killstrtop' value='$killstrTop' />";
		return $html;
	}
	
	function corpStrLeft(){
		$html = '';
		$option = 'mod_bannerpic_corpstrleft';
		if(isset($_POST['option_' . $option])){
			Config::set($option, $_POST['option_'. $option]);
		}
		$default = 145;
		Config::get($option) == null ? Config::set($option, $default) : $default = Config::get($option);
		$html = "<input type='text' id='option_$option' name='option_$option' value='$default' />";
		return $html;
	}
	
	function corpStrTop(){
		$html = '';
		$option = 'mod_bannerpic_corpstrtop';
		if(isset($_POST['option_' . $option])){
			Config::set($option, $_POST['option_'. $option]);
		}
		$default = 30;
		Config::get($option) == null ? Config::set($option, $default) : $default = Config::get($option);
		$html = "<input type='text' id='option_$option' name='option_$option' value='$default' />";
		return $html;
	}
	
	function alliStrLeft(){
		$html = '';
		$option = 'mod_bannerpic_allistrleft';
		if(isset($_POST['option_' . $option])){
			Config::set($option, $_POST['option_'. $option]);
		}
		$default = 145;
		Config::get($option) == null ? Config::set($option, $default) : $default = Config::get($option);
		$html = "<input type='text' id='option_$option' name='option_$option' value='$default' />";
		return $html;
	}
	
	function alliStrTop(){
		$html = '';
		$option = 'mod_bannerpic_allistrtop';
		if(isset($_POST['option_' . $option])){
			Config::set($option, $_POST['option_'. $option]);
		}
		$default = 45;
		Config::get($option) == null ? Config::set($option, $default) : $default = Config::get($option);
		$html = "<input type='text' id='option_$option' name='option_$option' value='$default' />";
		return $html;
	}
	
	function shipStrLeft(){
		$html = '';
		$option = 'mod_bannerpic_shipstrleft';
		if(isset($_POST['option_' . $option])){
			Config::set($option, $_POST['option_'. $option]);
		}
		$default = 145;
		Config::get($option) == null ? Config::set($option, $default) : $default = Config::get($option);
		$html = "<input type='text' id='option_$option' name='option_$option' value='$default' />";
		return $html;
	}
	
	function shipStrTop(){
		$html = '';
		$option = 'mod_bannerpic_shipstrtop';
		if(isset($_POST['option_' . $option])){
			Config::set($option, $_POST['option_'. $option]);
		}
		$default = 60;
		Config::get($option) == null ? Config::set($option, $default) : $default = Config::get($option);
		$html = "<input type='text' id='option_$option' name='option_$option' value='$default' />";
		return $html;
	}
	
	function fontFile(){
		$html = '';
		$option = 'mod_bannerpic_fontfile';
		if(isset($_POST['option_' . $option])){
			Config::set($option, $_POST['option_'. $option]);
		}
		$default = 'mods/bannerPic/evesansmm.ttf';
		Config::get($option) == null ? Config::set($option, $default) : $default = Config::get($option);
		$html = "<input type='text' id='option_$option' name='option_$option' value='$default' />";
		return $html;
	}
	
	function fontSize(){
		$html = '';
		$option = 'mod_bannerpic_fontsize';
		if(isset($_POST['option_' . $option])){
			Config::set($option, $_POST['option_'. $option]);
		}
		$default = 12;
		Config::get($option) == null ? Config::set($option, $default) : $default = Config::get($option);
		$html = "<input type='text' id='option_$option' name='option_$option' value='$default' />";
		return $html;
	}
	
	function boxCols(){
		$html = '';
		$option = 'mod_bannerpic_box';
		if(isset($_POST['option_' . $option . 'r'])){
			Config::set($option .'r', $_POST['option_'. $option . 'r']);
		}
		if(isset($_POST['option_' . $option . 'g'])){
			Config::set($option . 'g', $_POST['option_'. $option . 'g']);
		}
		if(isset($_POST['option_' . $option . 'b'])){
			Config::set($option . 'b', $_POST['option_'. $option . 'b']);
		}
		$default = 185;
		Config::get("{$option}r") == null ? Config::set("{$option}r", $default) : $default = Config::get("{$option}r");
		$html = "Red : <input type='text' id='option_{$option}r' name='option_{$option}r' value='$default' />";
		Config::get("{$option}g") == null ? Config::set("{$option}g", $default) : $default = Config::get("{$option}g");
		$html .= " Green : <input type='text' id='option_{$option}g' name='option_{$option}g' value='$default' />";
		Config::get("{$option}b") == null ? Config::set("{$option}b", $default) : $default = Config::get("{$option}b");
		$html .= " Blue : <input type='text' id='option_{$option}b' name='option_{$option}b' value='$default' />";
		return $html;
	}
	
        function textCols(){
		$html = '';
		$option = 'mod_bannerpic_text';
		if(isset($_POST['option_' . $option . 'r'])){
			Config::set($option .'r', $_POST['option_'. $option . 'r']);
		}
		if(isset($_POST['option_' . $option . 'g'])){
			Config::set($option . 'g', $_POST['option_'. $option . 'g']);
		}
		if(isset($_POST['option_' . $option . 'b'])){
			Config::set($option . 'b', $_POST['option_'. $option . 'b']);
		}
		$default = 255;
		Config::get("{$option}r") == null ? Config::set("{$option}r", $default) : $default = Config::get("{$option}r");
		$html = "Red : <input type='text' id='option_{$option}r' name='option_{$option}r' value='$default' />";
		Config::get("{$option}g") == null ? Config::set("{$option}g", $default) : $default = Config::get("{$option}g");
		$html .= " Green : <input type='text' id='option_{$option}g' name='option_{$option}g' value='$default' />";
		Config::get("{$option}b") == null ? Config::set("{$option}b", $default) : $default = Config::get("{$option}b");
		$html .= " Blue : <input type='text' id='option_{$option}b' name='option_{$option}b' value='$default' />";
		return $html;
	}
	
	function preview(){
		$html = '';
		$basepic = Config::get('mod_bannerpic_basepic');
		$html = "<img src='?a=bannerPic' width='100%' />";
                $html .= "<p><a href='". KB_HOST . "/?a=bannerPic'>URL of banner for forums</a></p>";
		return $html;
	}
	
	function about(){
	  	$html = '<p>';
	  	$html .= "v1.11 by vasco di (Paul White 2010)";
	  	$html .= '</p>';
	  	$html .= "<p>Detailed instructions,support and updates are available on the <a href='http://eve-id.net/forum/viewtopic.php?f=505&t=17007'>EVE Development Network</a></p>";
	  	return $html;
  }
}