<?php

function check_login($userID)
{
    if ($userID) {
        return true;
    }

    return false;
}

function cek_profile($userID)
{
    $db = \config\Database::connect();

    return $db->table('anggota')->getWhere(['id' => $userID])->getFirstRow();
}

function generate_menu($userID)
{
    $db = \config\Database::connect();
    // $query = "SELECT DISTINCT(user_access_menu.menu_id), mst_menu.menu FROM `user_access_menu` left JOIN mst_menu ON user_access_menu.menu_id = mst_menu.id WHERE user_access_menu.user_id = $userID;";

    // return $db->query($query)->getResultObject();

    $builder = $db->table('user_access_menu');
    $builder->select('DISTINCT(user_access_menu.menu_id) as id, mst_menu.menu');
    $builder->join('mst_menu', 'mst_menu.id = user_access_menu.menu_id');
    $builder->join('mst_submenu', 'mst_submenu.id = user_access_menu.submenu_id');
    $builder->where(['user_access_menu.user_id' => $userID]);
    $builder->where(['user_access_menu.flag_view' => 1]);
    $builder->where(['mst_submenu.aktif' => 1]);
    $builder->orderBy('mst_menu.id', 'ASC');

    return $builder->get()->getResultObject();
}

function generate_submenu($menu_id, $userID = '')
{
    $db = \config\Database::connect();
    $builder = $db->table('mst_submenu');
    $builder->select('mst_submenu.*');
    if ($userID) {
        $builder->join('user_access_menu', 'mst_submenu.id = user_access_menu.submenu_id');
        $builder->where(['mst_submenu.menu_id' => $menu_id, 'user_access_menu.flag_view' => 1, 'user_id' => $userID]);
    } else {
        $builder->where('menu_id', $menu_id);
    }

    return $builder->get()->getResultObject();
}
