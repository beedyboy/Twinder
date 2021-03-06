<?php

spl_autoload_register(function ($class_name){
$file_name =  "../classes/" . $class_name . '.php';
if(file_exists($file_name)){
require $file_name;
}
});

ob_start();
session_start();

$GetSession  = new my_Session();
$GetDatabase  = new Database();
$GetSchool  = new school(); 
$GetStudent  = new student();
$GetSystem  = new System();
$GetExam  = new Examination();


$loadSystem = $GetSchool->loadSchoolData(); 
$loadSchool = $GetSchool->loadSchool();
$i = 0;
foreach($loadSystem as $Data):
$i++; 

$beedySchoolName=  $_SESSION['cbt']['schoolname']= $Data['beedySchoolName'];
$beedySchoolLogo= $Data['beedySchoolLogo'];
$beedySchoolMotto= $Data['beedySchoolMotto'];
$beedySchoolAddress= $Data['beedySchoolAddress'];
$beedySchoolEmail= $Data['beedySchoolEmail'];
$beedySchoolPhoneNum= $Data['beedySchoolPhoneNum'];
$beedySchoolWebsite= $Data['beedySchoolWebsite'];
$CurrentSession= $Data['CurrentSession'];
$CurrentSemester= $Data['CurrentTerm'];
$theme= $_SESSION['cbt']['user_theme'] = $Data['theme'];
endforeach;
$i = 0; 
foreach($loadSchool as $Beedy):
$i++;
$active= $Beedy['active'];
$dateTo= $Beedy['dateTo'];
$dateFrom= $Beedy['dateFrom']; 
endforeach;



$schArray['dateFrom'] = $dateFrom;
$schArray['dateTo'] = $dateTo; 
$schArray['active'] = $active;



$schArray['beedySchoolName'] = $beedySchoolName;
$schArray['beedySchoolMotto'] = $beedySchoolMotto;
$schArray['beedySchoolLogo'] = $beedySchoolLogo;
$schArray['beedySchoolAddress'] = $beedySchoolAddress;
$schArray['beedySchoolEmail'] = $beedySchoolEmail;
$schArray['beedySchoolPhoneNum'] = $beedySchoolPhoneNum;
$schArray['beedySchoolWebsite'] = $beedySchoolWebsite;
$schArray['CurrentSession'] = $CurrentSession;
$schArray['CurrentSemester'] = $CurrentSemester;

define('_SCHOOL_ADDRESS_',$schArray['beedySchoolAddress']);
define('_SCHOOL_NAME_', $schArray['beedySchoolName']);
define('_SCHOOL_MOTTO_', $schArray['beedySchoolMotto']);
define('_SCHOOL_LOGO', $schArray['beedySchoolLogo']);
define('_CURRENT_TERM_', $schArray['CurrentSemester']);

$now= time();
$today=date('Y-m-d'); 

$d1 = new DateTime($schArray['dateFrom']);
$d2 = new DateTime($schArray['dateTo']);
$td = new DateTime($today);
$bdLast= $td->diff($d2)->format("%R%a");

define('dateFrom',$schArray['dateFrom']);
define('dateTo', $schArray['dateTo']); 
define('active', $schArray['active']); 
define('today', $today);
define('bdLast', $bdLast);

?> 
