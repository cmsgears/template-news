// Init -----------------------------------------------

jQuery( document ).ready( function() {
	
    jQuery( "#add-attribute" ).click( function() {
		
		showPopup( "#popup-attribute" );
    });
	
	jQuery( ".update-attribute" ).click( function() {
	 	
		var id = jQuery( this ).attr("data-id");
		var slug = jQuery( this ).attr("data-slug");
		
		showPopup( "#update-attribute" );
		jQuery("#name").val(jQuery( this ).attr("data-name"));
		jQuery("#value").val(jQuery( this ).attr("data-value"));
		jQuery("#action").attr("action" , "core/post/update-meta?id="+ id +"&slug="+ slug +"&type=blog");
    });
    
});
// Templates ------------------------------------------


function addAttribute( data ) {

	var source 		= document.getElementById( "attributeTemplate" ).innerHTML;
	var template		= Handlebars.compile( source );
	var count		= jQuery( "#box-attribute .wrap-attributes .attribute" ).length;
	var data		= { count: count, name: data.name, value: data.value, id: data.id };
	var output 		= template( data );
        
        jQuery('.wrap-attribute-height').css('display', 'block');
        
	jQuery( "#box-attribute .wrap-attributes" ).append( output );

	jQuery( "#attribute-" + count + " select" ).cmtSelect();

	var element		= jQuery("#box-attribute .wrap-attributes .attribute").last();

	element.find( '.delete-attribute' ).click( function() {

		jQuery( this ).closest( '.attribute' ).remove();

		initAttributeIndexing( model );
	});
	var appControllers	= [];
		
	appControllers[ 'attribute' ]	= 'AttributeController';

	jQuery(  '[cmt-app=mainApp]').cmtRequestProcessor({
		app: mainApp,
		controllers: appControllers
	});
}

function updateAttribute( data ) {

	var source 		= document.getElementById( "attributeTemplate" ).innerHTML;
	var template		= Handlebars.compile( source );
	var count		= jQuery( "#box-attribute .wrap-attributes .attribute" ).length;
	var data		= { count: count, name: data.name, value: data.value, id: data.id };
	var output 		= template( data );
        
        jQuery('.wrap-attribute-height').css('display', 'block');
        
	jQuery( "#box-attribute .wrap-attributes" ).append( output );

	jQuery( "#attribute-" + count + " select" ).cmtSelect();

	var element		= jQuery("#box-attribute .wrap-attributes .attribute").last();

	element.find( '.delete-attribute' ).click( function() {

		jQuery( this ).closest( '.attribute' ).remove();

		initAttributeIndexing( model );
	});
	var appControllers	= [];
		
	appControllers[ 'attribute' ]	= 'AttributeController';

	jQuery(  '[cmt-app=mainApp]').cmtRequestProcessor({
		app: mainApp,
		controllers: appControllers
	});
}