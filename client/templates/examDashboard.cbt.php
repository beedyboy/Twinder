 <?php
include_once('includes/system.php');
 
  $classId =$_SESSION['cbt']['classId']; 
$stdAddNum =$_SESSION['cbt']['stdAddNum']; 
?>
  
					
 <div  class="row ">
 <div class="col-md-12" > 
<div id="subName">  
	<input type="hidden" class="form-control" name="action"  value="enterHall" />
					
 <?php   $loadStudentCourses = $GetExam->loadStudentCourses($classId);
 if(!empty($loadStudentCourses)):
 foreach($loadStudentCourses as $LIST): 
$bankId = $GetExam->loadExamData($LIST['subId'], 0);
$process= $GetExam->process($stdAddNum,$bankId); 		
	  $subId = $LIST['subId']; 
	  $today = date("Y-m-d"); 
 $ExamSetStatus = System::existThree("beedygroupsub", "subId", "Exam_DATE", "Active", $LIST['subId'], $today, 'Yes');
	  ?>  
  		<a href="<?php  if($ExamSetStatus ==1 && $process!=1): 
	echo "?pid=22&action=Write-Exam/&bankId=$bankId&face=".System::getName2('beedygroupsub', 'bankId', 'subId', $bankId, $LIST['subId'], 9); 
	else: echo "#"; endif; ?>"> <button class="btn <?php if($ExamSetStatus ==0 && $process==1): echo "btn-danger"; 
	elseif($ExamSetStatus ==1 && $process==1): echo "btn-danger"; 
	elseif($ExamSetStatus ==1 && $process==0): echo "btn-success";
	else: 
	echo "btn-info";	endif; ?>">
		<?php echo System::getName('beedysubjectlist', 'subId', $LIST['subId'], 1); ?>
		</button>
	<br />
	<span class="badge"><?php if($ExamSetStatus ==1 && $process==1): echo "Status: Done"; 
		elseif($ExamSetStatus ==1 && $process==0): echo "Date: ".System::getName2('beedygroupsub', 'bankId', 'subId', $bankId, $LIST['subId'], 4); 
		else: 	echo "Examination not available"; 
	endif; ?></span>
	</a>
	
<?php
//					
					 
				endforeach;
else:
			echo "<div class='jumbotron'>
		<h1>You have not been registered for any courses<h1>
		</div>"; 
			endif; 

						?>
 
</div> 
</div>
</div>

 