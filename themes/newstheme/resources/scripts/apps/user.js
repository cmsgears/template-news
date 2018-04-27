var user	= null;

jQuery( document ).ready( function() {

	var user	= cmt.api.root.registerApplication( 'user', 'cmt.api.Application', { basePath: ajaxUrl } );

	user.mapController( 'user', 'nt.controllers.UserController' );

	cmt.api.utils.request.register( user, jQuery( '[cmt-app=user]' ) );
});
/*
jQuery(document).ready( function() {

	user		= new cmt.api.Application( { basePath: ajaxUrl } );

	var userAppControllers		= [];

	userAppControllers[ 'user' ] 	= 'UserController';

	jQuery( '[cmt-app=user]' ).cmtRequestProcessor({
		app: user,
		controllers: userAppControllers
	});
});
*/
// FormController ----------------------------------------

// UserController --------------------------------------------
nt.controllers.UserController	= function() {};

nt.controllers.UserController.inherits( cmt.api.controllers.RequestController );

nt.controllers.UserController.prototype.avatarActionPre = function( requestElement ) {
	 return true;
}

nt.controllers.UserController.prototype.avatarActionSuccess = function( requestElement, response ) {

	if( success ) {
	   
		//requestElement.closest( '.post-action' ).css('display':'none');

	}
};
/*
UserController	= function() {};

UserController.inherits( cmt.api.controllers.BaseController );

UserController.prototype.avatarActionPre = function( requestElement, response ) {

    return true;
};

UserController.prototype.avatarActionPost = function( success, requestElement, response ) {

	if( success ) {
	    alert('hello');
	   // requestElement.closest( '.post-action' ).css('display':'none');

	}
};
*/

nt.controllers.UserController.prototype.profileActionSuccess = function( requestElement, response ) {

	if( success ) {

	}
};

nt.controllers.UserController.prototype.accountActionSuccess = function( requestElement, response ) {

	if( success ) {

	}
};

nt.controllers.UserController.prototype.addressActionSuccess = function( requestElement, response ) {

	if( success ) {

	}
};

nt.controllers.UserController.prototype.settingsActionSuccess = function( requestElement, response ) {

	if( success ) {

	}
};

/*
UserController.prototype.profileActionPost = function( success, requestElement, response ) {

	if( success ) {

		
	}
};

UserController.prototype.accountActionPost = function( success, requestElement, response ) {

	if( success ) {

	}
};

UserController.prototype.addressActionPost = function( success, requestElement, response ) {

	if( success ) {

	}
};

UserController.prototype.settingsActionPost = function( success, requestElement, response ) {

	if( success ) {

	}
};
*/