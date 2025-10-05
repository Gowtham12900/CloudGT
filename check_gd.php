<?php
if (extension_loaded('gd')) {
    echo "GD library is enabled ✅";
    echo "<br>";
    echo "GD version: " . gd_info()['GD Version'];
} else {
    echo "GD library is NOT enabled ❌";
}
?>
