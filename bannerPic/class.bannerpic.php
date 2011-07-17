<?php
class BannerPic
{
	private $basepic = 'mods/bannerPic/base.jpg';
	private $img;
	private $kill = null;
	private $font = 'mods/bannerPic/evesansmm.ttf';
	private $sfont = 12;
	private $lfont = 25;
	private $cache;
	private $nocache = false;
	
	public function __construct(){
		//get latest kill
		$kill_list = new KillList();
		$kill_list->setOrdered(true);
		$kill_list->setOrderBy('kll_timestamp DESC');
                $kill_list->setLimit(1);
		$kill_list->setPodsNoobShips(Config::get('podnoobs'));
                involved::load($kill_list);
                $this->kill = $kill_list->getKill();
		
		//if this is already cached we don't need to go any further..
		if(Config::get('mod_bannerpic_nocache') == 1) $this->nocache = true;
		$bannerreplace = Config::get('mod_bannerpic_bannerreplace');
		if($bannerreplace == 1) Config::set('style_banner', 'bannerpic.jpg');
		$this->cache = KB_CACHEDIR . '/data/bannerpic' . $this->kill->getID() . '.jpg';
		
                $basepic = Config::get('mod_bannerpic_basepic');
                if(file_exists($basepic)) $this->basepic = $basepic;
                
		if(file_exists($this->cache) && !$this->nocache){
			$this->img = imagecreatefromjpeg($this->cache);
			if($bannerreplace == 1)	imagejpeg($this->img, 'banner/bannerpic.jpg', 100);
			return;
		}
                
		//no kills?		
                if($this->kill === null){
                    $killstr = "No kills yet - how sad!";
                    imagefttext($this->img, $this->lfont, 0, 20, 30, $red, $this->font, $killstr);
                    imagejpeg($this->img);
                    imagedestroy($this->img);
                    return;
                }
                
		//killer
                $killername = $this->kill->getFBPilotName();
                
		//get victim info
                $victimid = $this->kill->getVictimID();
                $victimname = $this->kill->getVictimName();
		$victimcorp = $this->kill->getVictimCorpName();
		$victimalli = $this->kill->getVictimAllianceName();
		
		//get the 64 x 64 victim portrait;
		$victimgfile = 'http://image.eveonline.com/Character/' . $victimid . '_64.jpg';
		$victimimg = imagecreatefromjpeg($victimgfile);
		
		$victimshipname = $this->kill->getVictimShipName();
		$url = 'http://image.eveonline.com/InventoryType/' . $this->kill->getVictimShipExternalID() . '_64.png'; 	
		$victimshipimg = imagecreatefrompng($url);

		//set variables for positions
		//Config::get('mod_bannerpic_basepic') == null ? Config::set('mod_bannerpic_basepic', $this->basepic) : $this->basepic = Config::get('mod_bannerpic_basepic');
		//victim picture
		$vicpicLeft = 1;
		Config::get('mod_bannerpic_vicpicleft') == null ? Config::set('mod_bannerpic_vicpicleft', $vicpicLeft) : $vicpicLeft = Config::get('mod_bannerpic_vicpicleft');
		$vicpicTop = 1;
		Config::get('mod_bannerpic_vicpictop') == null ? Config::set('mod_bannerpic_vicpictop', $vicpicTop) : $vicpicTop = Config::get('mod_bannerpic_vicpictop');
		$vicpicTrans = 100;
		Config::get('mod_bannerpic_vicpictrans') == null ? Config::set('mod_bannerpic_vicpictrans', $vicpicTrans) : $vicpicTrans = Config::get('mod_bannerpic_vicpictrans');
		
		//ship picture
		$shippicLeft = 70;
		Config::get('mod_bannerpic_shippicleft') == null ? Config::set('mod_bannerpic_shippicleft', $shippicLeft) : $shippicLeft = Config::get('mod_bannerpic_shippicleft');
		$shippicTop = 1;
		Config::get('mod_bannerpic_shippictop') == null ? Config::set('mod_bannerpic_shippictop', $shippicTop) : $shippicTop = Config::get('mod_bannerpic_shippictop');
		$shippicTrans = 100;
		Config::get('mod_bannerpic_shippictrans') == null ? Config::set('mod_bannerpic_shippictrans', $shippicTrans) : $shippicTrans = Config::get('mod_bannerpic_shippictrans');
		//killer
		$killstrLeft = 145;
		Config::get('mod_bannerpic_killstrleft') == null ? Config::set('mod_bannerpic_killstrleft', $killstrLeft) : $killstrLeft = Config::get('mod_bannerpic_killstrleft');
		$killstrTop = 15;
		Config::get('mod_bannerpic_killstrtop') == null ? Config::set('mod_bannerpic_killstrtop', $killstrTop) : $killstrTop = Config::get('mod_bannerpic_killstrtop');
		//victim corp
		$corpstrLeft = 145;
		Config::get('mod_bannerpic_corpstrleft') == null ? Config::set('mod_bannerpic_corpstrleft', $corpstrLeft) : $corpstrLeft = Config::get('mod_bannerpic_corpstrleft');
		$corpstrTop = 30;
		Config::get('mod_bannerpic_corpstrtop') == null ? Config::set('mod_bannerpic_corpstrtop', $corpstrTop) : $corpstrTop = Config::get('mod_bannerpic_corpstrtop');
		//victim alliance
		$allistrLeft = 145;
		Config::get('mod_bannerpic_allistrleft') == null ? Config::set('mod_bannerpic_allistrleft', $allistrLeft) : $allistrLeft = Config::get('mod_bannerpic_allistrleft');
		$allistrTop = 45;
		Config::get('mod_bannerpic_allistrtop') == null ? Config::set('mod_bannerpic_allistrtop', $allistrTop) : $allistrTop = Config::get('mod_bannerpic_allistrtop');
		//victim ship name
		$shipstrLeft = 145;
		Config::get('mod_bannerpic_shipstrleft') == null ? Config::set('mod_bannerpic_shipstrleft', $shipstrLeft) : $shipstrLeft = Config::get('mod_bannerpic_shipstrleft');
		$shipstrTop = 60;
		Config::get('mod_bannerpic_shipstrtop') == null ? Config::set('mod_bannerpic_shipstrtop', $shipstrTop) : $shipstrTop = Config::get('mod_bannerpic_shipstrtop');
		//border box colours
		$boxr = 186;
		Config::get('mod_bannerpic_boxr') == null ? Config::set('mod_bannerpic_boxr', $boxr) : $boxr = Config::get('mod_bannerpic_boxr');
		$boxg = 185;
		Config::get('mod_bannerpic_boxg') == null ? Config::set('mod_bannerpic_boxg', $boxg) : $boxg = Config::get('mod_bannerpic_boxg');
		$boxb = 183;
		Config::get('mod_bannerpic_boxb') == null ? Config::set('mod_bannerpic_boxb', $boxb) : $boxb = Config::get('mod_bannerpic_boxb');
		
		//text colours
		$textr = 255;
		Config::get('mod_bannerpic_textr') == null ? Config::set('mod_bannerpic_textr', $textr) : $textr = Config::get('mod_bannerpic_textr');
		$textg = 255;
		Config::get('mod_bannerpic_textg') == null ? Config::set('mod_bannerpic_textg', $textg) : $textg = Config::get('mod_bannerpic_textg');
		$textb = 255;
		Config::get('mod_bannerpic_textb') == null ? Config::set('mod_bannerpic_textb', $textb) : $textb = Config::get('mod_bannerpic_textb');
		
		//font
		Config::get('mod_bannerpic_fontfile') == null ? Config::set('mod_bannerpic_fontfile', $this->font) : $this->font = Config::get('mod_bannerpic_fontfile');
		Config::get('mod_bannerpic_fontfile') == null ? Config::set('mod_bannerpic_fontfilesize', $this->sfont) : $this->sfont = Config::get('mod_bannerpic_fontsize');
		
		$killstr = "$victimname was killed by $killername";
		$corpstr = "Corporation : $victimcorp";
		$allistr = "Alliance : $victimalli";
		$shipstr = "Ship : $victimshipname";
		
                //open base picture
		$this->img = imagecreatefromjpeg($this->basepic);
		$red = imagecolorallocate($this->img, 255, 0, 0);
                
		$black = imagecolorallocate($this->img, 0, 0, 0);
		$textcol = imagecolorallocate($this->img, $textr, $textg, $textb);
		$box=imagecreate(68,68);
		$bxcol=imagecolorallocate($box, $boxr, $boxg, $boxb);
		
		//pics to base pic
		imagecopymerge($this->img, $box, $vicpicLeft, $vicpicTop, 0, 0, 68, 68, $vicpicTrans);
		imagecopymerge($this->img,$victimimg,$vicpicLeft + 2, $vicpicTop + 2, 0, 0, 64, 64, $vicpicTrans);
		imagecopymerge($this->img, $box, $shippicLeft, $shippicTop, 0, 0, 68, 68, 100);
		imagecopymerge($this->img,$victimshipimg,$shippicLeft + 2, $shippicTop + 2, 0, 0, 64, 64, 100);
		
		//add text to image
		imagefttext($this->img, $this->sfont, 0, $killstrLeft, $killstrTop, $textcol, $this->font, $killstr);
		imagefttext($this->img, $this->sfont, 0, $corpstrLeft, $corpstrTop, $textcol, $this->font, $corpstr);
		imagefttext($this->img, $this->sfont, 0, $allistrLeft, $allistrTop, $textcol, $this->font, $allistr);
		imagefttext($this->img, $this->sfont, 0, $shipstrLeft, $shipstrTop, $textcol, $this->font, $shipstr);
		
		//cache the file
		imagejpeg($this->img, $this->cache, 100);
		
		//if the board banner option is checked then put a copy in the banners dir.
		if($bannerreplace == 1) imagejpeg($this->img, 'banner/bannerpic.jpg', 100);
		
		//destroy the images
		imagedestroy($box);
		imagedestroy($victimimg);
		imagedestroy($victimshipimg);
	}
	
	public function generate(){
		return $this->img;
	}
}