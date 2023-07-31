<?php

setcookie("unique_id", '', time()-3600, "/");
setcookie("unique_id", '', time()-3600, "/");
header("Location: /page/unauthorized/authorization");