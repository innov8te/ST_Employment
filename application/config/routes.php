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
|	http://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'pages';
$route['aboutus'] = 'pages/aboutus';
$route['contactus'] = 'pages/contactus';
$route['contactus/cnt_send'] = 'pages/contactusFormEmail';
$route['testimonials'] = 'pages/testimonials';
$route['testimonials/(:num)'] = 'pages/testimonials';


$route['maid/maid_detail/(:num)'] = 'Maiddetail/maidDetail/$1';


$route['admin/settings'] = 'settings/index';

//$route['admin/users/(:any)'] = 'Users';
$route['admin/users'] = 'Users/index';
$route['admin/add_user'] = 'Users/addUser';
$route['admin/edit_user/(:num)'] = 'Users/editUser/$1';
$route['admin/delete_user/(:num)'] = 'Users/deleteUser/$1';

$route['admin/profile'] = 'Users/viewProfile';


$route['admin/aboutus'] = 'AdminAboutus/index';
$route['admin/home'] = 'AdminHome/index';
$route['admin/contactus'] = 'AdminContact/index';
//$route['admin/(:any)'] = 'admin/index';


/* Maids */
$route['admin/maids'] = 'Maids/index';
$route['admin/maids/(:num)'] = 'Maids/index';
$route['admin/add_maid'] = 'Maids/addMaid';
$route['admin/edit_maid/(:num)'] = 'Maids/editMaid/$1';
$route['admin/delete_maid/(:num)'] = 'Maids/deleteMaid/$1';
$route['admin/maid/page_setting'] = 'Maids/pageSetting';


/* Search Maid */
$route['searchmaids/(:num)'] = 'Searchmaids/index';
/* Filter */
$route['maid/search_result'] = 'Filter/index';
$route['maid/search_result/(:num)'] = 'Filter/index';


/* Countries */
$route['admin/countries'] = 'Countries/index';
$route['admin/add_country'] = 'Countries/addCountry';
$route['admin/edit_country/(:num)'] = 'Countries/editCountry/$1';
$route['admin/delete_country/(:num)'] = 'Countries/deleteCountry/$1';


/* Religious */
$route['admin/religious'] = 'Religious/index';
$route['admin/add_religious'] = 'Religious/addReligious';
$route['admin/edit_religious/(:num)'] = 'Religious/editReligious/$1';
$route['admin/delete_religious/(:num)'] = 'Religious/deleteReligious/$1';


/* Type */
$route['admin/type'] = 'Type/index';
$route['admin/add_type'] = 'Type/addType';
$route['admin/edit_type/(:num)'] = 'Type/editType/$1';
$route['admin/delete_type/(:num)'] = 'Type/deleteType/$1';


/* Marital */
$route['admin/marital'] = 'Marital/index';
$route['admin/add_marital'] = 'Marital/addMarital';
$route['admin/edit_marital/(:num)'] = 'Marital/editMarital/$1';
$route['admin/delete_marital/(:num)'] = 'Marital/deleteMarital/$1';


/* Other Information */
$route['admin/other_information'] = 'Otherinformation/index';
$route['admin/add_other_information'] = 'Otherinformation/addOtherinfo';
$route['admin/edit_other_information/(:num)'] = 'Otherinformation/editOtherinfo/$1';
$route['admin/delete_other_information/(:num)'] = 'Otherinformation/deleteOtherinfo/$1';


/* Experience */
$route['admin/experience'] = 'Experience/index';
$route['admin/add_experience'] = 'Experience/addExperience';
$route['admin/edit_experience/(:num)'] = 'Experience/editExperience/$1';
$route['admin/delete_experience/(:num)'] = 'Experience/deleteExperience/$1';


/* Testimonial */
$route['admin/testimonials'] = 'Testimonial/index';
$route['admin/testimonials/(:num)'] = 'Testimonial/index';
$route['admin/add_testimonial'] = 'Testimonial/addTestimonial';
$route['admin/edit_testimonial/(:num)'] = 'Testimonial/editTestimonial/$1';
$route['admin/delete_testimonial/(:num)'] = 'Testimonial/deleteTestimonial/$1';


/* Age Group */
$route['admin/age'] = 'Agegroup/index';
$route['admin/add_age'] = 'Agegroup/addAge';
$route['admin/edit_age/(:num)'] = 'Agegroup/editAge/$1';
$route['admin/delete_age/(:num)'] = 'Agegroup/deleteAge/$1';


/* Slider */
$route['admin/slider'] = 'Slider/index';
$route['admin/add_slider'] = 'Slider/addSlider';
$route['admin/edit_slider/(:num)'] = 'Slider/editSlider/$1';
$route['admin/delete_slider/(:num)'] = 'Slider/deleteSlider/$1';




$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
