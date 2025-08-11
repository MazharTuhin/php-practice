<?php

    if (isset($_GET['accept_cookie'])) {
        setcookie('cookie_accepted', 'yes', time() + (86400 * 14), '/');
        exit;
    }

?>