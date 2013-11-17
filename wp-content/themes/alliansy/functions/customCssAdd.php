<?php 
global $themedir, $pego_prefix;

//mainTemplateColor

$mainTemplateColor = ' 
	h3.profile-desc span,
	span.btn-back,
	.address p span a,
	p#blog-post-form-allow  span.required,
	footer a,
	.submenu_1 li:hover > a, .submenu_1 li.sfHover > a,
	.menuTextOver,
	ul.portfolio-filter li.activeF a,
	.list li a:hover,
	.address p span, .address p span a	
	{ ';
	if (get_option($pego_prefix.'mainTemplateColor') != ''){
		$mainTemplateColor .=' color: #'. get_option($pego_prefix.'mainTemplateColor').'; ';						
	}
	$mainTemplateColor .= ' } ';
	
	$mainTemplateColor .= ' 
	h2 span,
	h3 span,
	.columnBox h3,
	.columnBox h3 a,
	ul.post-details li span,
	.a_button.mainCol,
	.hl,
	.shortcode-toggle h4 a,
	h3.portfolioSingle span	
	{ ';
	if (get_option($pego_prefix.'mainTemplateColor') != ''){
		$mainTemplateColor .=' background-color: #'. get_option($pego_prefix.'mainTemplateColor').'; ';						
	}
	$mainTemplateColor .= ' } ';
	
	$mainTemplateColor .= ' 
	h1.head1 strong:after,
	h1.head1 strong,
	.switchHold,
	.next,
	.prev,
	.circle1,
	input#submit-comment
	{ ';
	if (get_option($pego_prefix.'mainTemplateColor') != ''){
		$mainTemplateColor .=' background: #'. get_option($pego_prefix.'mainTemplateColor').'; ';						
	}
	$mainTemplateColor .= ' } ';


	$mainTemplateColor .= ' 
	.submenu_1 a:hover 
	{ ';
	if (get_option($pego_prefix.'mainTemplateColor') != ''){
		$mainTemplateColor .=' color: #'. get_option($pego_prefix.'mainTemplateColor').' !important; ';						
	}
	$mainTemplateColor .= ' } ';

//general settings start

	//default bg
	$defaultBG = ' body { ';
	
	if ((get_option($pego_prefix.'bgColDefault') != '')||(get_option($pego_prefix.'bgImgDefault') != '')) { $defaultBG .= ' backgorund:none;'; }
	
	$defaultBG .= ' background: ';
	if (get_option($pego_prefix.'bgColDefault') != ''){
		$defaultBG .=' #'. get_option($pego_prefix.'bgColDefault').' ';						
	}
	if (get_option($pego_prefix.'bgImgDefault') != ''){
		$defaultBG .= ' url('. get_option($pego_prefix.'bgImgDefault').') '. get_option($pego_prefix.'bgPosDefault').' '.get_option($pego_prefix.'bgRepeatDefault').'';			
	}
	$defaultBG .= ';  } ';
	
	//content bg
	$contentBG = ' .box { ';
	
	if ((get_option($pego_prefix.'bgColContent') != '')||(get_option($pego_prefix.'bgImgContent') != '')) { $contentBG .= ' backgorund:none;'; }
	
	$contentBG .= ' background: ';
	if (get_option($pego_prefix.'bgColContent') != ''){
		$contentBG .=' #'. get_option($pego_prefix.'bgColContent').' ';						
	}
	if (get_option($pego_prefix.'bgImgContent') != ''){
		$contentBG .= ' url('. get_option($pego_prefix.'bgImgContent').') '. get_option($pego_prefix.'bgPosContent').' '.get_option($pego_prefix.'bgRepeatContent').'';			
	}
	$contentBG .= ';  } ';
	
	//default font
	$fontText = ' body, p  { ';
	if (get_option($pego_prefix.'fontFamText') != ''){
		$fontText .= ' '. get_option($pego_prefix.'fontFamText').' ';
	}
	if (get_option($pego_prefix.'fontSizeText') != ''){
		$fontText .= 'font-size: '. get_option($pego_prefix.'fontSizeText').'px; ';
	}
	if (get_option($pego_prefix.'fontColText') != ''){
		$fontText .= 'color: #'. get_option($pego_prefix.'fontColText').'; ';
	}
	if (get_option($pego_prefix.'fontShadowText') != ''){
		$fontText .= ' text-shadow: 0.031em 0.031em 0.031em #'. get_option($pego_prefix.'fontShadowText').'; ';
	}
	$fontText .= ' } ';
	
	$fontText .= ' a { ';
	if (get_option($pego_prefix.'fontURLCol') != ''){
		$fontText .= 'color: #'. get_option($pego_prefix.'fontURLCol').'; ';
	}
	$fontText .= ' } ';
	
	//heading h1 settings
	$fontH1 = ' h1 { ';
	if (get_option($pego_prefix.'fontFamH1') != ''){
		$fontH1 .= ' '. get_option($pego_prefix.'fontFamH1').' ';
	}
	if (get_option($pego_prefix.'fontSizeH1') != ''){
		$fontH1 .= 'font-size: '. get_option($pego_prefix.'fontSizeH1').'px; ';
	}
	if (get_option($pego_prefix.'fontColH1') != ''){
		$fontH1 .= 'color: #'. get_option($pego_prefix.'fontColH1').'; ';
	}
	if (get_option($pego_prefix.'fontShadowH1') != ''){
		$fontH1 .= ' text-shadow: 0.031em 0.031em 0.031em #'. get_option($pego_prefix.'fontShadowH1').'; ';
	}
	$fontH1 .= ' } ';
	
	//heading h2 settings
	$fontH2 = ' h2 { ';
	if (get_option($pego_prefix.'fontFamH2') != ''){
		$fontH2 .= ' '. get_option($pego_prefix.'fontFamH2').' ';
	}
	if (get_option($pego_prefix.'fontSizeH2') != ''){
		$fontH2 .= 'font-size: '. get_option($pego_prefix.'fontSizeH2').'px; ';
	}
	if (get_option($pego_prefix.'fontColH2') != ''){
		$fontH2 .= 'color: #'. get_option($pego_prefix.'fontColH2').'; ';
	}
	if (get_option($pego_prefix.'fontShadowH2') != ''){
		$fontH2 .= ' text-shadow: 0.031em 0.031em 0.031em #'. get_option($pego_prefix.'fontShadowH2').'; ';
	}
	$fontH2 .= ' } ';
	
	//heading h3 settings
	$fontH3 = ' h3 { ';
	if (get_option($pego_prefix.'fontFamH3') != ''){
		$fontH3 .= ' '. get_option($pego_prefix.'fontFamH3').' ';
	}
	if (get_option($pego_prefix.'fontSizeH3') != ''){
		$fontH3 .= 'font-size: '. get_option($pego_prefix.'fontSizeH3').'px; ';
	}
	if (get_option($pego_prefix.'fontColH3') != ''){
		$fontH3 .= 'color: #'. get_option($pego_prefix.'fontColH3').'; ';
	}
	if (get_option($pego_prefix.'fontShadowH3') != ''){
		$fontH3 .= ' text-shadow: 0.031em 0.031em 0.031em #'. get_option($pego_prefix.'fontShadowH3').'; ';
	}
	$fontH3 .= ' } ';
	
	//heading h4 settings
	$fontH4 = ' h4 { ';
	if (get_option($pego_prefix.'fontFamH4') != ''){
		$fontH4 .= ' '. get_option($pego_prefix.'fontFamH4').' ';
	}
	if (get_option($pego_prefix.'fontSizeH4') != ''){
		$fontH4 .= 'font-size: '. get_option($pego_prefix.'fontSizeH4').'px; ';
	}
	if (get_option($pego_prefix.'fontColH4') != ''){
		$fontH4 .= 'color: #'. get_option($pego_prefix.'fontColH4').'; ';
	}
	if (get_option($pego_prefix.'fontShadowH4') != ''){
		$fontH4 .= ' text-shadow: 0.031em 0.031em 0.031em #'. get_option($pego_prefix.'fontShadowH4').'; ';
	}
	$fontH4 .= ' } ';
	
	//heading h5 settings
	$fontH5 = ' h5 { ';
	if (get_option($pego_prefix.'fontFamH5') != ''){
		$fontH5 .= ' '. get_option($pego_prefix.'fontFamH5').' ';
	}
	if (get_option($pego_prefix.'fontSizeH5') != ''){
		$fontH5 .= 'font-size: '. get_option($pego_prefix.'fontSizeH5').'px; ';
	}
	if (get_option($pego_prefix.'fontColH5') != ''){
		$fontH5 .= 'color: #'. get_option($pego_prefix.'fontColH5').'; ';
	}
	if (get_option($pego_prefix.'fontShadowH5') != ''){
		$fontH5 .= ' text-shadow: 0.031em 0.031em 0.031em #'. get_option($pego_prefix.'fontShadowH5').'; ';
	}
	$fontH5 .= ' } ';
	
	//page title settings
	$pageTitles = ' h1.head1 { ';
	if (get_option($pego_prefix.'fontFamPageTitles') != ''){
		$pageTitles .= ' '. get_option($pego_prefix.'fontFamPageTitles').' ';
	}
	if (get_option($pego_prefix.'fontSizePageTitles') != ''){
		$pageTitles .= 'font-size: '. get_option($pego_prefix.'fontSizePageTitles').'px; ';
	}
	if (get_option($pego_prefix.'fontColPageTitles') != ''){
		$pageTitles .= 'color: #'. get_option($pego_prefix.'fontColPageTitles').'; ';
	}
	if (get_option($pego_prefix.'fontShadowPageTitles') != ''){
		$pageTitles .= ' text-shadow: 0.031em 0.031em 0.031em #'. get_option($pego_prefix.'fontShadowPageTitles').'; ';
	}
	$pageTitles .= ' } ';
	
	$pageTitles .= ' h1.head1 strong { ';
	if (get_option($pego_prefix.'fontFamPageTitlesText') != ''){
		$pageTitles .= ' '. get_option($pego_prefix.'fontFamPageTitlesText').' ';
	}
	if (get_option($pego_prefix.'fontSizePageTitlesText') != ''){
		$pageTitles .= 'font-size: '. get_option($pego_prefix.'fontSizePageTitlesText').'px; ';
	}
	if (get_option($pego_prefix.'fontColPageTitlesText') != ''){
		$pageTitles .= 'color: #'. get_option($pego_prefix.'fontColPageTitlesText').'; ';
	}
	if (get_option($pego_prefix.'fontShadowPageTitlesText') != ''){
		$pageTitles .= ' text-shadow: 0.031em 0.031em 0.031em #'. get_option($pego_prefix.'fontShadowPageTitlesText').'; ';
	}
	$pageTitles .= ' } ';
	
	
//general settings end

	//menu settings
	$fontMenu = ' .mText, .menuTextOver { ';
	if (get_option($pego_prefix.'fontFamMenu') != ''){
		$fontMenu .= ' '. get_option($pego_prefix.'fontFamMenu').' ';
	}
	if (get_option($pego_prefix.'fontSizeMenu') != ''){
		$fontMenu .= 'font-size: '. get_option($pego_prefix.'fontSizeMenu').'px; ';
	}
	if (get_option($pego_prefix.'fontColMenu') != ''){
		$fontMenu .= 'color: #'. get_option($pego_prefix.'fontColMenu').' !important;; ';
	}
	if (get_option($pego_prefix.'fontShadowMenu') != ''){
		$fontMenu .= ' text-shadow: 0.031em 0.031em 0.031em #'. get_option($pego_prefix.'fontShadowMenu').'; ';
	}
	$fontMenu .= ' } ';
	
	$fontMenu .= ' .submenu_1 a { ';
	if (get_option($pego_prefix.'fontSizeMenuSub') != ''){
		$fontMenu .= 'font-size: '. get_option($pego_prefix.'fontSizeMenuSub').'px !important; ';
	}
	$fontMenu .= ' } ';
	
	$fontMenu .= ' .menuTextOver, .submenu_1 a:hover	{ ';
	if (get_option($pego_prefix.'fontColMenuHover') != ''){
		$fontMenu .= 'color: #'. get_option($pego_prefix.'fontColMenuHover').' !important; ';
	}
	$fontMenu .= ' } ';

	
	//top panel
	$topPanelCss =' #panel {';
	if (get_option($pego_prefix.'closeTopPanel') == 'yes'){
		$topPanelCss .= ' display:none; ';
	}
	$topPanelCss .= ' } ';
	
	$topPanelBG = ' #panel { ';
	
	if ((get_option($pego_prefix.'bgColUpperBar') != '')||(get_option($pego_prefix.'bgImgUpperBar') != '')) { $topPanelBG .= ' backgorund:none;'; }
	
	$topPanelBG .= ' background: ';
	if (get_option($pego_prefix.'bgColUpperBar') != ''){
		$topPanelBG .=' #'. get_option($pego_prefix.'bgColUpperBar').' ';						
	}
	if (get_option($pego_prefix.'bgImgUpperBar') != ''){
		$topPanelBG .= ' url('. get_option($pego_prefix.'bgImgUpperBar').') '. get_option($pego_prefix.'bgPosUpperBar').' '.get_option($pego_prefix.'bgRepeatUpperBar').'';			
	}
	$topPanelBG .= ';  } ';
	
	
	$topPanelBorder =' .btn-slide  {';
	if (get_option($pego_prefix.'topBorderColor') != ''){
		$topPanelBorder .= ' background-color: #'. get_option($pego_prefix.'topBorderColor').'; ';
	}
	$topPanelBorder .= ' } ';
	
	$topPanelBorder .=' .slideTopPanel {';
	if (get_option($pego_prefix.'topBorderColor') != ''){
		$topPanelBorder .= ' border-top: solid 6px #'. get_option($pego_prefix.'topBorderColor').'; ';
	}
	$topPanelBorder .= ' } ';

	//css output

	echo '<style type="text/css">';

	
	//general settings
	echo $defaultBG;
	echo $contentBG;
	echo $mainTemplateColor;
	echo $fontText;
	echo $fontH1;
	echo $fontH2;
	echo $fontH3;
	echo $fontH4;
	echo $fontH5;
	echo $pageTitles;
	echo $fontMenu;
	
	echo $topPanelCss;
	echo $topPanelBG;
	echo $topPanelBorder;
	

	
	
	
	echo '</style>';
	
	
	
	

?>

