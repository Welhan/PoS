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
