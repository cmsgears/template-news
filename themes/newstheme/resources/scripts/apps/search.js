// Get ready on page load ----------
jQuery( document ).ready( function() {
	initSearch();
    });
	//// Sort/Search/Filter --------------
function initSearch() {
    var pageUrl	= window.location.href;
   
    // Regular Search	
    jQuery( "#btn-search" ).click( function() {
	searchBro( "#search-page", pageUrl );
    });

    jQuery( "#btn-search-post" ).click( function() {
	
	pageUrl	= siteUrl + "blog/search";	
	
	searchBro( "#search-post", pageUrl );	
    });	

    // Post Search
    jQuery( "#search-post" ).keypress( function( e ) {

	// Listen to enter key    
	if( e.which === 13 ) {	
	    pageUrl = siteUrl + "blog/search";
	    searchBro( "#search-post", pageUrl );    
	}	
    });	

    // Page Search	
    jQuery( "#search-page" ).keypress( function( e ) {

	// Listen to enter key
	if( e.which === 13 ) {
	    searchBro( "#search-page", pageUrl ); 
	}	
    });
}

function searchBro( selector, pageUrl ) {	

    var keywords	= jQuery( '.search' ).val();
    // Search Keywords
    if( null != keywords && keywords.length > 0 ) {	
	pageUrl = cmt.utils.data.updateUrlParam( pageUrl, 'keywords', keywords );
    }   else {		
	pageUrl = cmt.utils.data.removeParam( pageUrl, 'keywords' );
    }
    window.location	= pageUrl;
}