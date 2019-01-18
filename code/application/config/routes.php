<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['default_controller']        = 'LoaddingPage';
$route['home']                      = 'LoaddingPage/Home';
$route['about-us']        			= 'LoaddingPage/aboutUs';
$route['login']                     = 'Login';
$route['change-password']           = 'User/changePassword';
$route['forgot-password']           = 'Login/forgotPassword';
$route['reset-password']            = 'Login/resetPassword';
$route['activate-link']             = 'Login/activateLink';
$route['ico-posts-expiration']      = 'Company/icoPostsExpiration';
$route['digital-asset-edit/(:any)'] = 'Company/digitalAssetEdit';
$route['ico-tracker-edit/(:any)']   = 'Company/digitalAssetEdit';
$route['write-a-review/(:any)']     = 'Company/writeAreview';
$route['edit-review/(:any)']        = 'Company/editReview';
$route['digital-assets']            = 'Company/digitalAssets';
$route['add-ico-tracker']           = 'Company/addIcoTracker';
$route['ico-tracker']               = 'Company/icoTracker';
$route['company-full-view/(:any)']  = 'Company/companyFullView';
$route['company-full-view/(:any)/(:num)']  = 'Company/companyFullView/$1/$2';
$route['event-full-view/(:any)']  = 'Company/eventFullView';
$route['event-full-view/(:any)/(:num)']  = 'Company/eventFullView/$1/$2';
$route['my-companies-list']         = 'Company/myCompaniesList';
$route['my-ico-trackers']           = 'Company/myIcoTrackers';
$route['my-digital-assets']         = 'Company/myCompaniesList';
$route['add-digital-asset']         = 'Company/addDigitalAsset';
$route['add-event']                 = 'Company/addEvent';  
$route['edit-profile']              = 'User/editProfile';
$route['display-profile']           = 'User/showProfile';
$route['social-sign-in/(:any)']     = 'Login/socialSignIn';
$route['twitter-login-auth/(:any)'] = 'Login/twitterLoginAuth';
$route['subscribe']     			= 'Careers/addEmail';
$route['admin'] 					= "admin/User";
$route['admin/admin-login'] 		= "admin/User/adminLogin";
$route['admin/admin-logout'] 		= "admin/User/adminLogout";
$route['admin/change-password'] 	= "admin/User/changePassword";
$route['admin/my-dashboard'] 		= "admin/User/myDashboard";
$route['admin/spam-email'] 		    = "admin/User/spamEmail";
$route['admin/add-user'] 		    = "admin/User/addUser";
$route['admin/edit-user/(:any)'] 	= "admin/User/editUser/$1";
$route['admin/user-management'] 	= "admin/User/userManagement";
$route['admin/digital-assets'] 		= "admin/Companies";
$route['admin/ico-trackers'] 		= "admin/Companies/icoTrackers";
$route['admin/add-ico-tracker'] 	= "admin/Companies/addIcoTracker";
$route['admin/add-digital-asset'] 	= "admin/Companies/addDigitalAssetView";
$route['admin/top-digital-assets'] 	= "admin/Companies/topDigitalAssets";
$route['admin/top-ico-trckers'] 	= "admin/Companies/topIcoTrackers";
$route['admin/reviews-replies'] 	= "admin/Reviews/reviewsReplies";
$route['admin/company-reviews'] 	= "admin/Reviews/companyReviews";
$route['admin/reviews-reports'] 	= "admin/Reviews/reviewsReports";
$route['admin/reviews-replies-reports'] = "admin/Reviews/reviewsRepliesReports";
$route['admin/edit-digital-asset/(:any)'] 	= "admin/Companies/editDigitalAsset/(:any)";
$route['admin/edit-ico-tracker/(:any)'] 	= "admin/Companies/editDigitalAsset/(:any)";
$route['admin/careers'] 			= "admin/Careers/careerActions";
$route['admin/add-career'] 		    = "admin/Careers/addCareer";
$route['admin/edit-career/(:any)'] 	= "admin/Careers/editCareer/$1";
$route['admin/banners'] 			= "admin/Banners/banerActions";
$route['admin/add-banner'] 		    = "admin/Banners/addBanner";
$route['admin/edit-banner/(:any)'] 	= "admin/Banners/editBanner/$1";
$route['careers']               	= 'Careers/index';
$route['donate']                 	= 'Careers/viewdonate';
$route['contact-us']               	= 'Careers/contactUs';
$route['contact-us-submit']         = 'Careers/submit';
$route['check-out-aim']            	= 'example/index';
$route['admin/subscribe'] 			= "admin/Subscribe/subscribeActions";
$route['admin/add-email'] 		    = "admin/Subscribe/addEmail";
$route['admin/edit-email/(:any)'] 	= "admin/Subscribe/editEmail/$1";
$route['admin/sendmail'] 			= "admin/Subscribe/sendMail";
$route['admin/ckeditor'] 			= "admin/Subscribe/sendCkeditor";
$route['unsubscribe'] 		        = "User/unsubscribeActions";
$route['cron-page'] 			    = "User/cronActions";
// $route['admin/immport-excel'] 		= "admin/Excel/excelActions";
//
$route['comments-policy']           = 'LoaddingPage/commentsPolicy';
$route['privacy-policy']            = 'LoaddingPage/privacyPolicy';
$route['terms-of-use']              = 'LoaddingPage/termsOfUse';

// Imprt and Export Companies
$route['admin/export-companies'] 	= "admin/ExcelActions/index";
$route['admin/import-companies']    = 'admin/ExcelActions/importView';

//
$route['coming-soon']              = 'Careers/commingSoon';
// // Templates
// $route['templates']                 = 'Templates';
// $route['add-template']              = 'Templates/addTemplate';
$route['cronjob-companies']           = 'Company/getCompDetailsApi';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
