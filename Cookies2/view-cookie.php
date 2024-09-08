<?php

echo "Cookie Value : " . $_COOKIE["user"];


setcookie("$user", "", time() - (86400 * 30), "/")  // 86400 Second 24hr * 30day (-) delete cookie last month

?>