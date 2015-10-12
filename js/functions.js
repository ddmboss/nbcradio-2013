/**
 * Functionality specific to Twenty Thirteen.
 *
 * Provides helper functions to enhance the theme experience.
 */

( function( $ ) {
	var body    = $( 'body' ),
	    _window = $( window );

	/**
	 * Enables menu toggle for small screens.
	 */
	( function() {
		var nav = $( '#site-navigation' ), button, menu;
		if ( ! nav )
			return;

		button = nav.find( '.menu-toggle' );
		if ( ! button )
			return;

		// Hide button if menu is missing or empty.
		menu = nav.find( '.nav-menu' );
		if ( ! menu || ! menu.children().length ) {
			button.hide();
			return;
		}

		$( '.menu-toggle' ).on( 'click.twentythirteen', function() {
			nav.toggleClass( 'toggled-on' );
		} );
	} )();

	/**
	 * Makes "skip to content" link work correctly in IE9 and Chrome for better
	 * accessibility.
	 *
	 * @link http://www.nczonline.net/blog/2013/01/15/fixing-skip-to-content-links/
	 */
	_window.on( 'hashchange.twentythirteen', function() {
		var element = document.getElementById( location.hash.substring( 1 ) );

		if ( element ) {
			if ( ! /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) )
				element.tabIndex = -1;

			element.focus();
		}
	} );

	/**
	 * Arranges footer widgets vertically.
	 */
	if ( $.isFunction( $.fn.masonry ) ) {
		var columnWidth = body.is( '.sidebar' ) ? 228 : 245;

		$( '#secondary .widget-area' ).masonry( {
			itemSelector: '.widget',
			columnWidth: columnWidth,
			gutterWidth: 20,
			isRTL: body.is( '.rtl' )
		} );
	}
    
    $(document).ready(function(){ 
        //update content hight with the tertiary sidebar to avoid overflow of sidebar 
        if($('#tertiary').get(0)){ 
            //if we have the sidebar widget area enabled 
            //jquery does not recommend calculating height of absolutely positioned element using height() method, so we will  
            //calculate the height of the wrapper child 
            //let us assume that the sidebar has the max height 
            //we find the widget-area height and append the top offset of the sidebar from #main 
            var max_height=$('#tertiary .sidebar-inner .widget-area').outerHeight(true)+parseFloat($('#tertiary').css('top')); 
            //is the primary content having more height than the sidebar? 
            if($('#primary').outerHeight(true)>max_height) 
                max_height=$('#primary').outerHeight(true);//if yes, let us consider it ias the max height 
            //thought we can set the  
            $('#main').css({'min-height':max_height+'px'}); 
            // $('#tertiary').height(max_height); 
        } 
    });
    
} )( jQuery );