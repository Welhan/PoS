<?php

function check_login($userID)
{
    if ($userID) {
        return true;
    }

    return false;
}
