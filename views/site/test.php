<h1> <?php echo $title; ?> </h1>
<br>
<?php
//echo $title;
//echo '<hr>';

echo $cat;

?>
<hr>
<?php

 //รับค่า array จาก Controllers metord function  actionTest
print_r($ar);

echo '<hr>';
print_r($person);
echo '<hr>';

// print array key ทีละแถว
foreach ($person as $item) {
    echo $item['fname'].' / '.$item['lname'].' / '.$item['email'].'<br>';
}