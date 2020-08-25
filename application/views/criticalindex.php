<?php
    $command = escapeshellcmd('ml.py');
    $output = shell_exec($command);
    echo $output;
?>


<?php echo $d[0]->gender;?>
<?php echo $d[0]->age;?>
