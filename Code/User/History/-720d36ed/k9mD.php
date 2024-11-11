
<?php
$x = 1;
function in(){
    $GLOBALS['y'] = $GLOBALS['x'];
    echo $GLOBALS['x'];
};
in();
echo $GLOBALS['y'];
?>
