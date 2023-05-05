<?php
/***************************************************************************
*                                                                          *
*   (c) 2004 Vladimir V. Kalynyak, Alexey V. Vinokurov, Ilya M. Shalnev    *
*                                                                          *
* This  is  commercial  software,  only  users  who have purchased a valid *
* license  and  accept  to the terms of the  License Agreement can install *
* and use this program.                                                    *
*                                                                          *
****************************************************************************
* PLEASE READ THE FULL TEXT  OF THE SOFTWARE  LICENSE   AGREEMENT  IN  THE *
* "copyright.txt" FILE PROVIDED WITH THIS DISTRIBUTION PACKAGE.            *
****************************************************************************/

use Tygh\Registry;
use Tygh\BlockManager\ProductTabs;

if (!defined('BOOTSTRAP')) { die('Access denied'); }

if ($mode == 'departments') {


    // Save current url to session for 'Continue shopping' button
    Tygh::$app['session']['continue_url'] = "products.departments";


    $params = $_REQUEST;


    

  
    
    

    list($departments, $search) = fn_get_departments($params, Registry::get('settings.Appearance.products_per_page'), CART_LANGUAGE);

    Tygh::$app['view']->assign('departments', $departments);
    Tygh::$app['view']->assign('search', $search);
    Tygh::$app['view']->assign('columns', 3);
   
    fn_add_breadcrumb("Отделы");
    // [/Breadcrumbs]


} elseif ($mode === 'department') {

    $department_data = [];
    $department_id = !empty($_REQUEST['department_id']) ? $_REQUEST['department_id'] : 0;
    $department_data = fn_get_department_data($department_id, CART_LANGUAGE);
    if (empty($department_data)) {
        return [CONTROLLER_STATUS_NO_PAGE];
    }

    

    Tygh::$app['view']->assign('department_data', $department_data);

    fn_add_breadcrumb(["Отделы", $department_data['department']]);

 


    $params = $_REQUEST;
    $params['extend'] = array('description');
    $params['item_ids'] = !empty($department_data['product_ids']) ? implode(',', $department_data['product_ids']) : -1;

    if ($items_per_page = fn_change_session_param(Tygh::$app['session']['search_params'], $_REQUEST, 'items_per_page')) {
        $params['items_per_page'] = $items_per_page;
    }
    if ($sort_by = fn_change_session_param(Tygh::$app['session']['search_params'], $_REQUEST, 'sort_by')) {
        $params['sort_by'] = $sort_by;
    }
    if ($sort_order = fn_change_session_param(Tygh::$app['session']['search_params'], $_REQUEST, 'sort_order')) {
        $params['sort_order'] = $sort_order;
    }



   
    $supervisor = fn_get_user_info($department_data['user_id']);

    
    foreach(explode(',', $params['item_ids']) as $member) {
        $members[] = fn_get_user_info($member) ;
    }
    Tygh::$app['view']->assign('supervisor', $supervisor);
    Tygh::$app['view']->assign('members', $members);
    Tygh::$app['view']->assign('columns', 3);
    




}
