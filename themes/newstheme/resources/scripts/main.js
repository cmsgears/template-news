jQuery( document ).ready( function() {

	initPreloaders();

	initCmgTools();

	initListeners();
	
	initBlogAnimated();
	
	
});

function initPreloaders() {

	// Hide global pre-loader spinner
	jQuery( '.container-main' ).imagesLoaded( { background: true }, function() {

		jQuery( '#pre-loader-main' ).fadeOut( 'slow' );
	});
}

function initCmgTools() {

	// Page Blocks
	if( jQuery().cmtBlock ) {

		jQuery( '.block' ).cmtBlock({
			// Generic
			halfHeight: true,
			heightAuto: true,
			// Block Specific - Ignores generic
			blocks: { 'landing-slider-block' : { fullHeight: false, halfHeight: false },
                            'landing-video': { fullHeight: false, halfHeight: false, height: "50" },
                            'landing-static': { fullHeight: false, halfHeight: false },
                                'news-roller': { fullHeight: false, halfHeight: false },
                                'landing-form': { fullHeight: false, halfHeight: false },
				'block-header': { fullHeight: false, halfHeight: false },
				'block-public': { fullHeight: true, heightAutoMobile: true, heightAutoMobileWidth: 1024 },
				'block-form': { fullHeight: true, heightAutoMobile: true, heightAutoMobileWidth: 1024 },
				'block-page': { halfHeight: true, height: "500" }
			}
		});
	}

	// File Uploader
	if( jQuery().cmtFileUploader ) {

		jQuery( '.file-uploader' ).cmtFileUploader();
	}

        //cmt slider 
        if( jQuery().cmtSlider ) {

		jQuery( '.cmt-slider' ).cmtSlider({
                    lControlContent: '<i class="cmti cmti-arrow-left cmti-2x valign-center"></i>',
			rControlContent: '<i class="cmti cmti-arrow-right cmti-2x valign-center"></i>'
                });
	}
        

	// Popups
	if( jQuery().cmtPopup ) {

		jQuery( '.popup' ).cmtPopup();
		
	}

	// Sliding Menu
	if( jQuery().cmtSlidingMenu ) {

		jQuery( '#popup-menu-main' ).cmtSlidingMenu( { showTrigger: '#btn-mobile-menu', hideTrigger: '#btn-feedback', mainMenu: true, position: 'left' } );
	}
        
	// Custom Select
	if( jQuery().cmtSelect ) {

		jQuery( '.cmt-select' ).cmtSelect( { iconHtml: '<span class="cmti cmti-chevron-down"></span>' } );
	}

	// Custom Checkbox
	if( jQuery().cmtCheckbox ) {

		jQuery( '.cmt-checkbox' ).cmtCheckbox();
	}

	// Form with Info
	if( jQuery().cmtFormInfo ) {

		jQuery( '.box-form' ).cmtFormInfo();
	}

	// Google Map
	if( jQuery().latLongPicker ) {

		jQuery( '.lat-long-picker' ).latLongPicker();
	}
       
}

function initListeners() {

	// custom scroller
	if( jQuery().mCustomScrollbar ) {

		jQuery( ".cscroller" ).mCustomScrollbar( { autoHideScrollbar: true } );
	}
}


function initBlogAnimated(){

    jQuery( ".blog .post" ).hover( function() {	

	var info	= jQuery( this ).find( ".post-info" );
	var show	= 'fadeInDown';
	var hide	= 'fadeOut';
	
       if( jQuery( info ).hasClass( "animated "+show ) ) {
	    jQuery( info ).removeClass( "animated "+show );
	    jQuery( info ).addClass( "animated "+hide );
	    return true;
	}		
	if( jQuery( info ).hasClass( "animated "+hide ) ) {
	    jQuery( info ).show();
	    jQuery( info ).removeClass( "animated "+hide );
	    jQuery( info ).addClass( "animated "+show );
	}		
	else {		
	    jQuery( info ).show();
	    jQuery( info ).addClass( "animated "+show );
	}   
    } );
}

function initAttributeIndexing( model ) {

	jQuery( ".wrap-attributes .attribute" ).each( function( i, el ) {

		var deleteAttribute	= jQuery( this ).find( ".delete-attribute" );
		var attributeCount	= jQuery( this ).find( ".attribute-count" );
		var attributeTitle	= jQuery( this ).find( ".attribute-title" );
		var message			= jQuery( this ).find( ".message" );
		var requestForm		= jQuery( this ).find( ".cmt-request" );
		var hiddenAttribute	= jQuery( this ).find( ".hidden-attribute" );

		jQuery( this, ",", deleteAttribute, ",", attributeTitle, ",", message, ",", requestForm, ",", hiddenAttribute ).attr( "id", null );

		jQuery( this ).attr( "id", "attribute-"+i );

		jQuery( deleteAttribute ).attr( "id", "frm-delete-attr-"+i );

		jQuery( attributeCount ).val( "attribute-"+i );

		jQuery( attributeTitle ).attr( {

			"id": "listingattribute-" +i+ "-name",
			"name": model+"Attribute[" +i+ "][name]"
		} );

		jQuery( attributeTitle ).parent().removeAttr("class");
		jQuery( attributeTitle ).parent().attr( "class", "form-group field-listingattribute-" +i+ "-name required" );

		jQuery( message ).attr( {

			"id": "listingattribute-" +i+ "-value",
			"name": model+"Attribute[" +i+ "][value]"
		} );

		jQuery( message ).parent().removeAttr("class");
		jQuery( message ).parent().attr( "class", "form-group field-listingattribute-" +i+ "-value" );

		jQuery( requestForm ).attr( "id", "frm-delete-attr-"+i );

		jQuery( hiddenAttribute ).attr( {

			"id": "listingattribute-" +i+ "-id",
			"name": model+"Attribute[" +i+ "][id]"
		} );

		jQuery( hiddenAttribute ).parent().removeAttr( "class" );
		jQuery( hiddenAttribute ).parent().attr( "class", "form-group field-listingattribute-" +i+ "-id" );
	});
}