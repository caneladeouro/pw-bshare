<?php

if (isset($_SESSION['user']['code'])) {
    session_destroy();
}
header('location: /site/layout');
