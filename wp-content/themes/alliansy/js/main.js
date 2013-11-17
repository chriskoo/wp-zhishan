$(document).ready(function() {

  // get the action filter option item on page load
  var $filterType = $('.filterOptions li.active a').attr('class');
	
  // get and assign the ourHolder element to the
	// $holder varible for use later
  var $holder = $('ul.ourHolder');

  // clone all items within the pre-assigned $holder element
  var $data = $holder.clone();

  // attempt to call Quicksand when a filter option
	// item is clicked
	$('.filterOptions li a').click(function(e) {
		// reset the active class on all the buttons
		$('.filterOptions li').removeClass('activeF');
		
		// assign the class of the clicked filter option
		// element to our $filterType variable
		var $filterType = $(this).attr('class');
		$(this).parent().addClass('activeF');
		
		if ($filterType == 'all') {
			// assign all li items to the $filteredData var when
			// the 'All' filter option is clicked
			var $filteredData = $data.find('li');
		} 
		else {
			// find all li elements that have our required $filterType
			// values for the data-type element
			var $filteredData = $data.find('li[data-type~=' + $filterType + ']');
		}
		
		// call quicksand and assign transition parameters
		$holder.quicksand($filteredData, {
			duration: 800,
			easing: 'easeInOutQuad',
					}, function() {

	 $('a.portfPic').fancybox({
        'overlayColor'  :   '#1c1c1c',
        'transitionIn'	:	'elastic',
       	'transitionOut'	:	'elastic',
    	'speedIn'		:	500, 
    	'speedOut'		:	300
     });
	 
	  $('.imgList3 li a.iframe').fancybox({
	  'width'           : '70%',
	  'height'          : '70%',
	  'type'            : 'iframe',
      'transitionIn'	:	'elastic',
      'transitionOut'	:	'elastic',
	  'speedIn'			:	500, 
      'speedOut'		:	300
     });		
			}
		);
		return false;
	});
});