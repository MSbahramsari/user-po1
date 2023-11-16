<?php
extract($_REQUEST , EXTR_PREFIX_SAME , "dup");
echo '<br>';
//age
if ($age >= 18) {
    echo $age ;
    var_dump($age);
}
else {
    echo 'invalid age';

}
echo '<br>';
//phone number
if (strlen($phone) <= 11) {
    echo $phone;
}
else {
    echo 'invalid';
}
echo '<br>';
// first name
if (strlen($firstname) <= 40) {
    echo $firstname;}
else {
    echo 'invalid';
}
echo '<br>';
//last name
if (strlen($lastname) <= 40) {
    echo $lastname ;
}


else {
    echo 'invalid';
}
echo '<br>';
//password
$str = $pwd ;
$password = md5($str);
echo $password ;
echo '<br>';








