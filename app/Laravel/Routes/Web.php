<?php

/*,'domain' => env("FRONTEND_URL", "wineapp.localhost.com")*/
Route::group(['as' => "web.",
		 'namespace' => "Web",
		 // 'domain' => env('SYSTEM_URL',''),
		],function() {


	Route::group(['prefix'=> "/",'as' => 'main.' ],function(){
		Route::get('/', [ 'as' => "index",'uses' => "MainController@index"]);
	});
	Route::get('type',['as' => "get_application_type",'uses' => "MainController@get_application_type"]);
	Route::get('permit-type',['as' => "get_permit_type",'uses' => "MainController@get_permit_type"]);
	Route::get('amount',['as' => "get_payment_fee",'uses' => "MainController@get_payment_fee"]);
	Route::get('requirements',['as' => "get_requirements",'uses' => "MainController@get_requirements"]);
	Route::get('contact-us',['as' => "contact",'uses' => "MainController@contact"]);
	Route::any('logout',['as' => "logout",'uses' => "AuthController@destroy"]);
	Route::get('company',['as' => "get_company",'uses' => "MainController@get_company"]);
	Route::get('company-request',['as' => "company_request",'uses' => "MainController@company_request"]);
	Route::post('company-request',['uses' => "MainController@company_add"]);

	Route::group(['middleware' => ["web","portal.guest"]], function(){
		Route::get('login/{redirect_uri?}',['as' => "login",'uses' => "AuthController@login"]);
        Route::post('login/{redirect_uri?}',['uses' => "AuthController@authenticate"]);
		Route::get('verify/{id?}',['as' => "verify",'uses' => "AuthController@verify"]);
        Route::post('verify/{id?}',['uses' => "AuthController@verified"]);

    /*  Route::get('forgot-password',['as' => "forgot_password",'uses' => "AuthController@forgot_pass"]);
        Route::post('change-password',['as' => "change_password",'uses' => "AuthController@change_password"]);*/
		Route::group(['prefix'=> "register",'as' => 'register.' ],function(){
            Route::get('/', [ 'as' => "index",'uses' => "AuthController@register"]);
            Route::post('/', [ 'uses' => "AuthController@store"]);
            Route::get('revert',['as' => "revert",'uses' => "AuthController@revert"]);
        });
	});

	Route::group(['middleware' => ["web","portal.auth"]], function(){
		Route::group(['prefix' => "transaction", 'as' => "transaction."], function () {
			Route::get('history',['as' => "history", 'uses' => "CustomerTransactionController@history"]);
			Route::get('payment/{code?}',['as' => "payment", 'uses' => "CustomerTransactionController@payment"]);

			Route::get('show/{id?}',['as' => "show", 'uses' => "CustomerTransactionController@show"]);
			Route::get('create',['as' => "create", 'uses' => "CustomerTransactionController@create"]);
			Route::post('create',['uses' => "CustomerTransactionController@store"]);
        });


        Route::group(['prefix' => "profile", 'as' => "profile."], function () {
        	Route::get('/',['as' => "index",'uses' => "ProfileController@index"]);
        	Route::post('/',['uses' => "ProfileController@update"]);

        });	

        Route::group(['prefix' => "business", 'as' => "business."], function () {
			Route::get('/',['as' => "index",'uses' => "BusinessController@index"]);
			Route::get('create',['as' => "create",'uses' => "BusinessController@create"]);
			Route::post('create',['uses' => "BusinessController@store"]);
            Route::get('revert',['as' => "revert",'uses' => "BusinessController@revert"]);
			Route::get('edit/{id?}',['as' => "edit",'uses' => "BusinessController@edit"]);
			Route::post('edit/{id?}',['uses' => "BusinessController@update"]);
			Route::get('profile/{id?}',['as' => "profile",'uses' => "BusinessController@profile"]);
			Route::any('delete/{id?}',['as' => "destroy",'uses' => "BusinessController@destroy"]);
			
			Route::get('edit-address/{id?}',['as' => "edit_address",'uses' => "BusinessController@business_address_edit"]);
			Route::post('edit-address/{id?}',['uses' => "BusinessController@address_update"]);
			Route::get('edit-others/{id?}',['as' => "edit_others",'uses' => "BusinessController@other_info_edit"]);
			Route::post('edit-others/{id?}',['uses' => "BusinessController@other_info_update"]);
			Route::get('permit/{id?}',['as' => "permit",'uses' => "BusinessController@permits"]);
			Route::post('permit/{id?}',['uses' => "BusinessController@permit_store"]);
            Route::get('revert',['as' => "revert",'uses' => "BusinessController@revert"]);
            /*Route::group(['prefix' => "application", 'as' => "application."], function () {
                Route::get('/',['as' => "index",'uses' => "BusinessApplicationController@index"]);
                Route::get('/building-permit',['as' => "building_permit",'uses' => "BusinessApplicationController@building_permit"]);
            });*/
		});
	});

	 Route::group(['prefix' => "application", 'as' => "application."], function () {
		Route::get('create/{id?}',['as' => "create",'uses' => "BusinessApplicationController@create"]);
		Route::post('create/{id?}',['uses' => "BusinessApplicationController@store"]);
		Route::get('revert/{id?}',['as' => "revert",'uses' => "BusinessApplicationController@revert"]);
        Route::get('history/{id?}',['as' => "history",'uses' => "BusinessApplicationController@history"]);
        Route::get('show/{id?}',['as' => "show",'uses' => "BusinessApplicationController@show"]);
	});	

	Route::get('pay/{code?}',['as' => "pay", 'uses' => "CustomerTransactionController@pay"]);
	Route::get('confirmation/{code?}',['as' => "confirmation",'uses' => "MainController@confirmation"]);
	Route::get('upload/{code?}',['as' => "upload",'uses' => "BusinessApplicationController@upload"]);
	Route::post('upload/{code?}',['uses' => "BusinessApplicationController@store_documents"]);
	Route::get('request-eor/{code?}',['as' => "request-eor", 'uses' => "CustomerTransactionController@request_eor"]);
	Route::get('show-pdf/{id?}',['as' => "show-pdf", 'uses' => "CustomerTransactionController@show_pdf"]);
	Route::get('physical-copy/{id?}',['as' => "physical-copy", 'uses' => "CustomerTransactionController@physical_pdf"]);
	Route::get('certificate/{id?}',['as' => "certificate", 'uses' => "CustomerTransactionController@certificate"]);

	Route::group(['prefix' => "digipep",'as' => "digipep."],function(){
		Route::any('success/{code}',['as' => "success",'uses' => "DigipepController@success"]);
		Route::any('cancel/{code}',['as' => "cancel",'uses' => "DigipepController@cancel"]);
		Route::any('failed/{code}',['as' => "failed",'uses' => "DigipepController@failed"]);
	});
		// Route::group(['prefix'=> "register",'as' => 'register.' ],function(){
  //           Route::get('/', [ 'as' => "index",'uses' => "AuthController@register"]);
  //           Route::post('/', [ 'uses' => "AuthController@store"]);
	 //     });

        // Route::post('login/{redirect_uri?}',['uses' => "AuthController@authenticate"]);
        // Route::get('forgot-password',['as' => "forgot_password",'uses' => "AuthController@forgot_pass"]);
        // Route::post('change-password',['as' => "change_password",'uses' => "AuthController@change_password"]);

		// $this->group(['prefix'=> "register",'as' => 'register.' ],function(){
  //           $this->get('/', [ 'as' => "index",'uses' => "AuthController@register"]);
  //           $this->post('/', [ 'uses' => "AuthController@store"]);
  //           $this->get('revert', [ 'as' => "revert",'uses' => "AuthController@revert"]);
  //       });



});
