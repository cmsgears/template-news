var mainApp	= null;

jQuery( document ).ready( function() {

	var mainApp	= cmt.api.root.registerApplication( 'mainApp', 'cmt.api.Application', { basePath: ajaxUrl } );

	mainApp.mapController( 'form', 'nt.controllers.FormController' );
	mainApp.mapController( 'attribute', 'nt.controllers.AttributeController' );
	mainApp.mapController( 'user', 'nt.controllers.UserController' );
	mainApp.mapController( 'post', 'nt.controllers.PostController' );

	cmt.api.utils.request.register( mainApp, jQuery( '[cmt-app=mainApp]' ) );
});
/*
jQuery(document).ready( function() {

	mainApp		= new cmt.api.Application( { basePath: ajaxUrl } );

	var appControllers				= [];

	appControllers[ 'form' ] 			= 'FormController';
	appControllers[ 'attribute' ] 			= 'AttributeController';
	appControllers[ 'user' ] 			= 'UserController';
	appControllers[ 'post' ] 			= 'PostController';

	jQuery(  '[cmt-app=mainApp]').cmtRequestProcessor({
		app: mainApp,
		controllers: appControllers
	});
});
*/
// FormController ----------------------------------------

// TagController --------------------------------------------

nt.controllers.AttributeController	= function() {};

nt.controllers.AttributeController.inherits( cmt.api.controllers.RequestController );

nt.controllers.CategoryController.prototype.addAttributeActionPre = function( requestElement ) {
	 return true;
}

nt.controllers.AttributeController.prototype.addAttributeActionSuccess = function( requestElement, response ) {

	if( success ) {

	jQuery( "#popup-attribute" ).hide();
	addAttribute(response.data);
	initAttributeIndexing();
    }
};
nt.controllers.CategoryController.prototype.updateAttributeActionPre = function( requestElement ) {
	 return true;
}

nt.controllers.AttributeController.prototype.updateAttributeActionSuccess = function( requestElement, response ) {

	if( success ) {

	jQuery( "#update-attribute" ).hide();
	
    }
};
/*
AttributeController	= function() {};

AttributeController.inherits( cmt.api.controllers.BaseController );


AttributeController.prototype.addAttributeActionPre = function( requestElement, response ) {
    
    return true;
};
AttributeController.prototype.addAttributeActionPost = function( success, requestElement, response ) {

    if( success ) {

	jQuery( "#popup-attribute" ).hide();
	addAttribute(response.data);
	initAttributeIndexing();
    }
};

AttributeController.prototype.updateAttributeActionPre = function( requestElement, response ) {
    
    return true;
};
AttributeController.prototype.updateAttributeActionPost = function( success, requestElement, response ) {

    if( success ) {

	jQuery( "#update-attribute" ).hide();
	
    }
};
*/

// Post Controller
nt.controllers.PostController	= function() {};

nt.controllers.PostController.inherits( cmt.api.controllers.RequestController );

nt.controllers.PostController.prototype.deletePostActionPre = function( requestElement ) {
	var action	= requestElement.attr( 'action' );
    var id	= cmt.utils.data.getParameterByName( 'id', action );
    id		= parseInt( id );

    if( id > 0 ) {

	var result = confirm( 'Are you sure you want to delete this post ?' );

	if( result ) {

	    return true;
	}
    }

    return false;
}

nt.controllers.PostController.prototype.deletePostActionSuccess = function( requestElement, response ) {

	 if( success ) {
	requestElement.closest( '.post' ).remove();

    }
};
nt.controllers.PostController.prototype.deleteAttributeActionPre = function( requestElement ) {
	var action	= requestElement.attr( 'action' );
	var id		= cmt.utils.data.getParameterByName( 'id', action );
	id			= parseInt( id );

	if( id > 0 ) {

		var result = confirm( 'Are you sure you want to delete this attribute ?' );

		if( result ) {

		    return true;
		}
	}

	return false;
}

nt.controllers.PostController.prototype.deleteAttributeActionSuccess = function( requestElement, response ) {

	if( success ) {

		requestElement.closest( '.attribute' ).remove();

		initAttributeIndexing();
	}
};
/*
PostController	= function() {};
PostController.inherits( cmt.api.controllers.BaseController );
PostController.prototype.deletePostActionPre = function( requestElement, response ) {

    var action	= requestElement.attr( 'action' );
    var id	= cmt.utils.data.getParameterByName( 'id', action );
    id		= parseInt( id );

    if( id > 0 ) {

	var result = confirm( 'Are you sure you want to delete this post ?' );

	if( result ) {

	    return true;
	}
    }

    return false;
};
PostController.prototype.deletePostActionPost = function( success, requestElement, response ) {

    if( success ) {
	requestElement.closest( '.post' ).remove();

    }
};


AttributeController.prototype.deleteAttributeActionPre = function( requestElement, response ) {

	var action	= requestElement.attr( 'action' );
	var id		= cmt.utils.data.getParameterByName( 'id', action );
	id			= parseInt( id );

	if( id > 0 ) {

		var result = confirm( 'Are you sure you want to delete this attribute ?' );

		if( result ) {

		    return true;
		}
	}

	return false;
};
AttributeController.prototype.deleteAttributeActionPost = function( success, requestElement, response ) {

	if( success ) {

		requestElement.closest( '.attribute' ).remove();

		initAttributeIndexing();
	}
};
*/

// User controller

nt.controllers.UserController	= function() {};

nt.controllers.UserController.inherits( cmt.api.controllers.RequestController );

nt.controllers.UserController.prototype.settingsAttributeActionPre = function( requestElement ) {
	  return true;
}

nt.controllers.PostController.prototype.settingsAttributeActionSuccess = function( requestElement, response ) {

	if( success ) {

		requestElement.closest( '.attribute' ).remove();

		initAttributeIndexing();
	}
};
/*
UserController	= function() {};

UserController.prototype.settingsAttributeActionPre = function( requestElement, response ) {

    return true;
};

UserController.prototype.settingsAttributeActionPost = function( success, requestElement, response ) {

	if( success ) {

		requestElement.closest( '.attribute' ).remove();

		initAttributeIndexing();
	}
};
*/