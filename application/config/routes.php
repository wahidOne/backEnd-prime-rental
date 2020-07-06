<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
// frontEnd
$route['beranda'] = 'frontend/public/Pages/index';
$route['default_controller'] = 'welcome';
// $route['default_controller'] = 'frontend/public/Pages';
$route['mobil-kami'] = 'frontend/public/Pages/cars';
$route['mobil/detail/(:any)'] = 'frontend/public/Pages/detailCar/$1';
$route['tentang-kami'] = 'frontend/public/Pages/about';
$route['kontak'] = 'frontend/public/Pages/contact';


$route['penyewaan'] = 'frontend/public/Transactions/index';
$route['penyewaan/set-expired/(:any)'] = 'frontend/public/Transactions/autoDeleteOrder/$1';
$route['pembayaran']['GET'] = 'frontend/public/Transactions/payments';
$route['pembayaran/update'] = 'frontend/public/Transactions/uploadPaymentsProof';
$route['tambah-transaksi'] = 'frontend/public/Transactions/addPayment';
$route['session/respon-pesanan']['GET'] = 'frontend/public/Transactions/orderResponse';
$route['session/reset/respon-order'] = 'frontend/public/Transactions/resetResponOrderSession';
$route['session/payment-response']['GET'] = 'frontend/public/Transactions/paymentResponse';
$route['session/reset/payment-success']['GET'] = 'frontend/public/Transactions/resetPaymentSuccess';
$route['status-transaksi']['GET'] = 'frontend/public/Transactions/receipt_transactions';

$route['user/(:any)/dashboard/profile'] = 'frontend/public/User/index';
$route['user/(:any)/dashboard/profile/update'] = 'frontend/public/User/updateProfile';
$route['profile/upload-gambar'] = 'frontend/public/User/uploadImage';

// $route['transaksi'] = 'frontend/public/User/transactions';
$route['user/(:any)/dashboard/transaksi-saya'] = 'frontend/public/User/transactions';
$route['user/(:any)/dashboard/transaksi/pembatalan']['GET'] = 'frontend/public/User/infoReject';
$route['user/(:any)/dashboard/invoice/pembayaran']['GET'] = 'frontend/public/User/invoicePayment';
$route['transaksi/detail/(:any)'] = 'frontend/public/User/userDetailTransaction/$1';

$route['user/(:any)/dashboard/load-inbox']["GET"] = 'frontend/public/Inbox/loadInbox';
$route['user/(:any)/dashboard/inbox'] = 'frontend/public/Inbox/viewInbox';

$route['autentifikasi/login'] = 'frontend/auth/frontAuth/index';
$route['autentifikasi/registrasi'] = 'frontend/auth/frontAuth/registrasi';
$route['autentifikasi/logout'] = 'frontend/auth/frontAuth/logout';


// auth admnistrator
$route['administrator/sign-in'] = 'admin/auth/auth/index';
$route['administrator/sign-up'] = 'admin/auth/auth/signUp';
$route['administrator/sign-out'] = 'admin/auth/auth/signOut';

// menu
$route['administrator/dashboard'] = 'admin/dashboard/Dashboard/index';
$route['administrator/system-management/menu'] = 'admin/dashboard/System/menu';
$route['administrator/system-management/get-menu'] = 'admin/dashboard/System/showMenu';
$route['administrator/system-management/tambah-menu'] = 'admin/dashboard/System/tambahMenu';
$route['administrator/system-management/detail-menu/(:any)'] = 'admin/dashboard/System/getMenuWhere/$1';
$route['administrator/system-management/ubah-menu'] = 'admin/dashboard/System/UbahMenu';
$route['administrator/system-management/delete-menu/(:any)'] = 'admin/dashboard/System/deleteMenu/$1';

// submenu
$route['administrator/system-management/submenu'] = 'admin/dashboard/System/showSubmenu';
$route['administrator/system-management/add-submenu'] = 'admin/dashboard/System/addSubmenu';
$route['administrator/system-management/update-submenu/(:any)'] = 'admin/dashboard/System/updateSubmenu/$1';
$route['administrator/system-management/delete-submenu/(:any)'] = 'admin/dashboard/System/deleteSubmenu/$1';

// user access
$route['administrator/system-management/user-access-menu'] = 'admin/dashboard/System/showUserAccessMenu';
$route['administrator/system-management/add-level-access'] = 'admin/dashboard/System/addUserLevel';
$route['administrator/system-management/update-level-access'] = 'admin/dashboard/System/updateUserLevel';
$route['administrator/system-management/delete-level-access/(:num)'] = 'admin/dashboard/System/DeleteUserLevel/$1';
$route['administrator/system-management/get-level-access/(:num)'] = 'admin/dashboard/System/getUserLevel/$1';
$route['administrator/system-management/get-access-menu/(:any)'] = 'admin/dashboard/System/getUserAccessMenu/$1';
$route['administrator/system-management/change-access-menu'] = 'admin/dashboard/System/changeAccess';
$route['administrator/system-management/change-access-submenu'] = 'admin/dashboard/System/changeSubmenuAccess';
// Master Data
$route['administrator/master-data/cars'] = 'admin/dashboard/Master_data/cars';
$route['administrator/master-data/add-cars'] = 'admin/dashboard/Master_data/AddCar';
$route['administrator/master-data/update-car'] = 'admin/dashboard/Master_data/updateCar';
$route['administrator/master-data/get-car/(:num)'] = 'admin/dashboard/Master_data/getCarWhere/$1';
$route['administrator/master-data/delete-car/(:num)'] = 'admin/dashboard/Master_data/deleteCar/$1';
$route['administrator/master-data/data-tables-cars'] = 'admin/dashboard/Master_data/get_ajax';
/////
$route['administrator/master-data/types-car'] = 'admin/dashboard/Master_data/typesCar';
$route['administrator/master-data/get-types-car'] = 'admin/dashboard/Master_data/showTypesCar';
$route['administrator/master-data/get-type-car/(:num)'] = 'admin/dashboard/Master_data/detailTypeCar/$1';
$route['administrator/master-data/add-type'] = 'admin/dashboard/Master_data/addTypes';
$route['administrator/master-data/update-type'] = 'admin/dashboard/Master_data/updateTypes';
$route['administrator/master-data/delete-type/(:num)'] = 'admin/dashboard/Master_data/deleteTypes/$1';

//admnistrator profile
$route['administrator/profile'] = 'admin/profile/Profile/index';
$route['administrator/profile/update-profile'] = 'admin/profile/Profile/updateProfile';

//-->  users <--//

$route['administrator/users/general'] = 'admin/dashboard/Users/index';
$route['administrator/users/get-user/(:num)'] = 'admin/dashboard/Users/getUser/$1';
$route['administrator/users/change-level'] = 'admin/dashboard/Users/changeLevel';
$route['administrator/users/get-general-user'] = 'admin/dashboard/Users/generalUser';

// users/admin

$route['administrator/users/admin'] = 'admin/dashboard/Users/administrators';
$route['administrator/users/get-admin-user'] = 'admin/dashboard/Users/getAdminUser';
$route['administrator/users/admin-where/(:num)'] = 'admin/dashboard/Users/getAdminWhere/$1';


$route['administrator/users/drivers'] = 'admin/dashboard/Users/drivers';
$route['administrator/users/get-drivers'] = 'admin/dashboard/Users/getDrivers';
$route['administrator/users/get-a-driver/(:num)'] = 'admin/dashboard/Users/getDriversWhere/$1';
$route['administrator/users/del-driver/(:num)'] = 'admin/dashboard/Users/deleteDriver/$1';


// users/costumer 
$route['administrator/users/customer'] = 'admin/dashboard/Users/customers';
$route['administrator/users/get-customers'] = 'admin/dashboard/Users/getCustomers';
$route['administrator/users/get-costumer/(:num)'] = 'admin/dashboard/Users/getCustomersWhere/$1';
$route['administrator/users/del-customer/(:num)'] = 'admin/dashboard/Users/deleteCostumer/$1';

// Transaction
$route['administrator/transaction/rent'] = 'admin/dashboard/Transaction/rental';
$route['administrator/transaction/load-rent'] = 'admin/dashboard/Transaction/loadRentalData';
$route['administrator/transaction/get-rent/(:any)'] = 'admin/dashboard/Transaction/getRental/$1';

$route['administrator/transaction/check-payment']['GET'] = 'admin/dashboard/Transaction/checkPayment';
$route['administrator/transaction/download-payment-proof/(:any)'] = 'admin/dashboard/Transaction/downloadPaymentProof/$1';
$route['administrators/transaction/confirm-payment'] = 'admin/dashboard/Transaction/confirmPayment';


$route['administrator/rental'] = 'admin/demo/Rental/index';
$route['administrator/rental/transaction/(:num)'] = 'admin/demo/Rental/transaction_rent/$1';
$route['admistrator/rental/add-rental'] = 'admin/demo/Rental/add_rental';
$route['admistrator/rental/receipt'] = 'admin/demo/Rental/receipt';
$route['admistrator/rental/reset-receipt'] = 'admin/demo/Rental/reset_receipt';
$route['admistrator/rental/transaction/u/(:any)'] = 'admin/demo/Rental/userTransaction/$1';


// $route['administrator/system-management/get-menu-where/(:any)'] = 'admin/dashboard/System/getMenuWhere/$1';

// publice


$route['404_override'] = 'Page404/index';
$route['translate_uri_dashes'] = FALSE;
