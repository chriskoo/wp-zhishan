<?php

$input = array(get_option($pego_prefix.'fontFamUrlText'),
			   get_option($pego_prefix.'fontFamUrlPageTitles'),
			   get_option($pego_prefix.'fontFamUrlPageTitlesText'),
			   get_option($pego_prefix.'fontFamUrlH1'),
			   get_option($pego_prefix.'fontFamUrlH2'),
			   get_option($pego_prefix.'fontFamUrlH3'),
			   get_option($pego_prefix.'fontFamUrlH4'),
			   get_option($pego_prefix.'fontFamUrlH5'),
			   get_option($pego_prefix.'fontFamUrlMenu')		      
	 		);
	 		
	 		$result = array_unique($input);
	 		foreach($result as $link)
	 		{
	 			echo $link;	
	 		}
	 		
	 		
		?>