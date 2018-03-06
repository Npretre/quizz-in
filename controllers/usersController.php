<?php

$user = new users();
$user->id = 5;
$user->ageMin = 15;
$user->ageMax = 40;
$user->gender = 0;
$AllResutCorrectByUser = $user->displayResultCorrectByUser();
$ResultByAge = $user->displayStatByAge();
$RessultByGender = $user->displayStatByGender();
