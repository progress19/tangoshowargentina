<?php
use Illuminate\Support\Facades\Route;
//FRONT
//Route::get('/', 'Web\PageController@landing')->name('web.page.landing');
Route::get('/', 'Web\PageController@landing1')->name('web.page.landing');
//Route::get('/', 'Web\PageController@home')->name('web.page.home');

Route::get('web/page/home', 'Web\PageController@home')->name('web.page.home');
Route::get('web/page/aboutus', 'Web\PageController@aboutus')->name('web.page.aboutus');
Route::get('web/page/contact', 'Web\PageController@contact')->name('web.page.contact');
Route::post('web/page/contact/send', 'Web\PageController@sendContact')->name('web.page.contact.send');
Route::get('web/page/shows', 'Web\PageController@shows')->name('web.page.shows');
Route::get('web/page/show/{show_id}/{slug}', 'Web\PageController@show')->name('web.page.show');
Route::get('web/page/houses', 'Web\PageController@houses')->name('web.page.houses');
Route::get('web/page/house/{casa_id}/{slug}', 'Web\PageController@house')->name('web.page.house');
Route::post('web/page/suscribe', 'Web\PageController@suscribe')->name('web.page.suscribe');
Route::post('web/page/paypal/capture', 'Web\PageController@capturePaypal')->name('web.page.paypal.capture');
Route::get('web/page/order/pdf/show/{order_id}', 'Web\PageController@showPdf')->name('web.page.order.pdf.show');

//Route::get('web/page/agency', 'Web\PageController@agency')->name('web.page.agency');
Route::get('web/page/agency', 'Web\PageController@agency1')->name('web.page.agency');
Route::post('web/register', 'Back\Access\RegisterController@store')->name('web.register'); //POST REGISTER
 
//
//
//Route::get('pickup', 'Web\PageController@pickup')->name('web.page.pickup');

/*
  |--------------------------------------------------------------------------
  | LANG
  |--------------------------------------------------------------------------
 */

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLang']);

//AUTH MIDDLEWARE
Route::get('login', 'Back\Access\LoginController@showForm')->name('login'); //FORM LOGIN
Route::post('back/access/login', 'Back\Access\LoginController@login')->name('back.access.login'); //POST LOGIN
Route::group(['middleware' => ['auth']], function()
{
    /*
      |--------------------------------------------------------------------------
      | ACCESS
      |--------------------------------------------------------------------------
     */
    Route::any('back/access/logout', 'Back\Access\LoginController@logout')->name('back.access.logout');


    /*
      |--------------------------------------------------------------------------
      | ADMIN
      |--------------------------------------------------------------------------
     */

    Route::get('back/admin/home/index', 'Back\Admin\HomeController@index')->name('back.admin.home.index');
    Route::get('back/admin/profile/edit', 'Back\Admin\ProfileController@edit')->name('back.admin.profile.edit');
    Route::post('back/admin/profile/store', 'Back\Admin\ProfileController@store')->name('back.admin.profile.store');
    Route::post('back/admin/profile/update', 'Back\Admin\ProfileController@update')->name('back.admin.profile.update');
    Route::post('back/admin/profile/logo/save', 'Back\Admin\ProfileController@saveLogo')->name('back.admin.profile.logo.save');
    Route::post('back/admin/profile/password/save', 'Back\Admin\ProfileController@savePassword')->name('back.admin.profile.password.save');


    Route::get('back/admin/house/index', 'Back\Admin\HouseController@index')->name('back.admin.house.index');
    Route::post('back/admin/house/sort', 'Back\Admin\HouseController@sort')->name('back.admin.house.sort');
    Route::get('back/admin/house/create', 'Back\Admin\HouseController@create')->name('back.admin.house.create');
    Route::post('back/admin/house/store', 'Back\Admin\HouseController@store')->name('back.admin.house.store');
    Route::get('back/admin/house/edit/{id}', 'Back\Admin\HouseController@edit')->name('back.admin.house.edit');
    Route::post('back/admin/house/update/{id}', 'Back\Admin\HouseController@update')->name('back.admin.house.update');
    Route::post('back/admin/house/logo/save', 'Back\Admin\HouseController@saveLogo')->name('back.admin.house.logo.save');
    Route::post('back/admin/house/password/save', 'Back\Admin\HouseController@savePassword')->name('back.admin.house.password.save');
    Route::post('back/admin/house/status/save', 'Back\Admin\HouseController@saveStatus')->name('back.admin.house.status.save');
    Route::get('back/admin/house/translation/edit/{id}/{lang}', 'Back\Admin\HouseController@editTranslation')->name('back.admin.house.translation.edit');
    Route::post('back/admin/house/translation/update', 'Back\Admin\HouseController@updateTranslation')->name('back.admin.house.translation.update');

    Route::get('back/admin/house/image/index/{casa_id}', 'Back\Admin\HouseController@indexImage')->name('back.admin.house.image.index');
    Route::get('back/admin/house/image/create', 'Back\Admin\HouseController@createImage')->name('back.admin.house.image.create');
    Route::post('back/admin/house/image/store', 'Back\Admin\HouseController@storeImage')->name('back.admin.house.image.store');
    Route::get('back/admin/house/image/edit', 'Back\Admin\HouseController@editImage')->name('back.admin.house.image.edit');
    Route::post('back/admin/house/image/update', 'Back\Admin\HouseController@updateImage')->name('back.admin.house.image.update');
    Route::get('back/admin/house/image/show', 'Back\Admin\HouseController@showImage')->name('back.admin.house.image.show');
    Route::post('back/admin/house/image/status/save', 'Back\Admin\HouseController@saveStatusImage')->name('back.admin.house.image.status.save');
    Route::delete('back/admin/house/image/delete', 'Back\Admin\HouseController@deleteImage')->name('back.admin.house.image.delete');

    Route::get('back/admin/house/transfer/edit/{casa_id}', 'Back\Admin\House\TransferController@edit')->name('back.admin.house.transfer.edit');
    Route::post('back/admin/house/transfer/update', 'Back\Admin\House\TransferController@update')->name('back.admin.house.transfer.update');

    Route::get('back/admin/house/show/index', 'Back\Admin\House\ShowController@index')->name('back.admin.house.show.index');
    Route::post('back/admin/house/show/sort', 'Back\Admin\House\ShowController@sort')->name('back.admin.house.show.sort');
    Route::get('back/admin/house/show/create', 'Back\Admin\House\ShowController@create')->name('back.admin.house.show.create');
    Route::post('back/admin/house/show/store', 'Back\Admin\House\ShowController@store')->name('back.admin.house.show.store');
    Route::get('back/admin/house/show/edit/{id}', 'Back\Admin\House\ShowController@edit')->name('back.admin.house.show.edit');
    Route::post('back/admin/house/show/update/{id}', 'Back\Admin\House\ShowController@update')->name('back.admin.house.show.update');
    Route::post('back/admin/house/show/logo/save', 'Back\Admin\House\ShowController@saveLogo')->name('back.admin.house.show.logo.save');
    Route::post('back/admin/house/show/password/save', 'Back\Admin\House\ShowController@savePassword')->name('back.admin.house.show.password.save');
    Route::post('back/admin/house/show/status/save', 'Back\Admin\House\ShowController@saveStatus')->name('back.admin.house.show.status.save');
    Route::get('back/admin/house/show/translation/edit/{id}/{lang}', 'Back\Admin\House\ShowController@editTranslation')->name('back.admin.house.show.translation.edit');
    Route::post('back/admin/house/show/translation/update', 'Back\Admin\House\ShowController@updateTranslation')->name('back.admin.house.show.translation.update');

    Route::get('back/admin/house/show/image/index/{espectaculo_id}', 'Back\Admin\House\ShowController@indexImage')->name('back.admin.house.show.image.index');
    Route::get('back/admin/house/show/image/create', 'Back\Admin\House\ShowController@createImage')->name('back.admin.house.show.image.create');
    Route::post('back/admin/house/show/image/store', 'Back\Admin\House\ShowController@storeImage')->name('back.admin.house.show.image.store');
    Route::get('back/admin/house/show/image/edit', 'Back\Admin\House\ShowController@editImage')->name('back.admin.house.show.image.edit');
    Route::post('back/admin/house/show/image/update', 'Back\Admin\House\ShowController@updateImage')->name('back.admin.house.show.image.update');
    Route::get('back/admin/house/show/image/show', 'Back\Admin\House\ShowController@showImage')->name('back.admin.house.show.image.show');
    Route::post('back/admin/house/show/image/status/save', 'Back\Admin\House\ShowController@saveStatusImage')->name('back.admin.house.show.image.status.save');

    Route::get('back/admin/service/index', 'Back\Admin\ServiceController@index')->name('back.admin.service.index');
    Route::get('back/admin/service/create', 'Back\Admin\ServiceController@create')->name('back.admin.service.create');
    Route::post('back/admin/service/store', 'Back\Admin\ServiceController@store')->name('back.admin.service.store');
    Route::post('back/admin/service/status/save', 'Back\Admin\ServiceController@saveStatus')->name('back.admin.service.status.save');
    Route::get('back/admin/service/translation/edit/{id}/{lang}', 'Back\Admin\ServiceController@editTranslation')->name('back.admin.service.translation.edit');
    Route::post('back/admin/service/translation/update', 'Back\Admin\ServiceController@updateTranslation')->name('back.admin.service.translation.update');

    Route::get('back/admin/event/index', 'Back\Admin\EventController@index')->name('back.admin.event.index');
    Route::get('back/admin/event/create', 'Back\Admin\EventController@create')->name('back.admin.event.create');
    Route::post('back/admin/event/store', 'Back\Admin\EventController@store')->name('back.admin.event.store');
    Route::post('back/admin/event/status/save', 'Back\Admin\EventController@saveStatus')->name('back.admin.event.status.save');
    Route::get('back/admin/event/translation/edit/{id}/{lang}', 'Back\Admin\EventController@editTranslation')->name('back.admin.event.translation.edit');
    Route::post('back/admin/event/translation/update', 'Back\Admin\EventController@updateTranslation')->name('back.admin.event.translation.update');

    Route::get('back/admin/date/index', 'Back\Admin\DateController@index')->name('back.admin.date.index');
    Route::get('back/admin/date/create', 'Back\Admin\DateController@create')->name('back.admin.date.create');
    Route::post('back/admin/date/store', 'Back\Admin\DateController@store')->name('back.admin.date.store');
    Route::post('back/admin/date/status/save', 'Back\Admin\DateController@saveStatus')->name('back.admin.date.status.save');
    Route::get('back/admin/date/translation/edit/{id}/{lang}', 'Back\Admin\DateController@editTranslation')->name('back.admin.date.translation.edit');
    Route::post('back/admin/date/translation/update', 'Back\Admin\DateController@updateTranslation')->name('back.admin.date.translation.update');


    Route::get('back/admin/suscribe/index', 'Back\Admin\SuscribeController@index')->name('back.admin.suscribe.index');
    Route::get('back/admin/suscribe/create', 'Back\Admin\SuscribeController@create')->name('back.admin.suscribe.create');
    Route::post('back/admin/suscribe/store', 'Back\Admin\SuscribeController@store')->name('back.admin.suscribe.store');
    Route::post('back/admin/suscribe/status/save', 'Back\Admin\SuscribeController@saveStatus')->name('back.admin.suscribe.status.save');

    Route::get('back/admin/order/index', 'Back\Admin\OrderController@index')->name('back.admin.order.index');
    Route::post('back/admin/order/status/save', 'Back\Admin\OrderController@saveStatus')->name('back.admin.order.status.save');
    Route::get('back/admin/order/pdf/show/{order_id}', 'Back\Admin\OrderController@showPdf')->name('back.admin.order.pdf.show');

    Route::get('back/admin/agency/index', 'Back\Admin\AgencyController@index')->name('back.admin.agency.index');
    Route::post('back/admin/agency/sort', 'Back\Admin\AgencyController@sort')->name('back.admin.agency.sort');
    Route::get('back/admin/agency/edit/{id}', 'Back\Admin\AgencyController@edit')->name('back.admin.agency.edit');
    Route::post('back/admin/agency/update/{id}', 'Back\Admin\AgencyController@update')->name('back.admin.agency.update');
    Route::post('back/admin/agency/password/save', 'Back\Admin\AgencyController@savePassword')->name('back.admin.agency.password.save');
    Route::post('back/admin/agency/status/save', 'Back\Admin\AgencyController@saveStatus')->name('back.admin.agency.status.save');

    Route::get('back/admin/agency/commission/index/{id}', 'Back\Admin\AgencyController@indexCommission')->name('back.admin.agency.commission.index');
    Route::get('back/admin/agency/commission/edit', 'Back\Admin\AgencyController@editCommission')->name('back.admin.agency.commission.edit');
    Route::post('back/admin/agency/commission/update', 'Back\Admin\AgencyController@updateCommission')->name('back.admin.agency.commission.update');
    Route::post('back/admin/agency/commission/status/save', 'Back\Admin\AgencyController@saveStatusCommission')->name('back.admin.agency.commission.status.save');
    /*
      |--------------------------------------------------------------------------
      | HOUSE
      |--------------------------------------------------------------------------
     */

    Route::get('back/house/home/index', 'Back\House\HomeController@index')->name('back.house.home.index');
    Route::get('back/house/profile/edit', 'Back\House\ProfileController@edit')->name('back.house.profile.edit');
    Route::post('back/house/profile/store', 'Back\House\ProfileController@store')->name('back.house.profile.store');
    Route::post('back/house/profile/update', 'Back\House\ProfileController@update')->name('back.house.profile.update');
    Route::post('back/house/profile/logo/save', 'Back\House\ProfileController@saveLogo')->name('back.house.profile.logo.save');
    Route::post('back/house/profile/password/save', 'Back\House\ProfileController@savePassword')->name('back.house.profile.password.save');


    Route::get('back/house/show/index', 'Back\House\ShowController@index')->name('back.house.show.index');
    Route::get('back/house/show/create', 'Back\House\ShowController@create')->name('back.house.show.create');
    Route::post('back/house/show/store', 'Back\House\ShowController@store')->name('back.house.show.store');
    Route::get('back/house/show/{id}/edit', 'Back\House\ShowController@edit')->name('back.house.show.edit');
    Route::post('back/house/show/{id}/update', 'Back\House\ShowController@update')->name('back.house.show.update');
    Route::post('back/house/show/logo/save', 'Back\House\ShowController@saveLogo')->name('back.house.show.logo.save');
    Route::post('back/house/show/password/save', 'Back\House\ShowController@savePassword')->name('back.house.show.password.save');
    Route::post('back/house/show/status/save', 'Back\House\ShowController@saveStatus')->name('back.house.show.status.save');


    /*
      |--------------------------------------------------------------------------
      | AGENCY
      |--------------------------------------------------------------------------
     */

    Route::get('back/agency/home/index', 'Back\Agency\HomeController@index')->name('back.agency.home.index');
    Route::get('back/agency/profile/edit', 'Back\Agency\ProfileController@edit')->name('back.agency.profile.edit');
    Route::post('back/agency/profile/update', 'Back\Agency\ProfileController@update')->name('back.agency.profile.update');
    Route::post('back/agency/profile/password/save', 'Back\Agency\ProfileController@savePassword')->name('back.agency.profile.password.save');
    
    Route::get('back/agency/commission/index', 'Back\Agency\CommissionController@index')->name('back.agency.commission.index');
});
//END AUTH MIDDLEWARE