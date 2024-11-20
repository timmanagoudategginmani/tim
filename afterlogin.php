<?php
$servername='localhost';
$username='root';
$password='';
$dbname='project';

$conn=mysqli_connect($servername,$username,$password,$dbname);
if($conn)
{
	$query1="SELECT * FROM `userloginfo`";
	$result=mysqli_query($conn,$query1);
	if($result)
	{
		while($row=mysqli_fetch_assoc($result))
		{
			$user=$row['user'];
			// echo $user;
		}
	}		
	$query1="SELECT * FROM `userregistration`";
	$result=mysqli_query($conn,$query1);
	if($result)
	{
		while($row=mysqli_fetch_assoc($result))
		{
			if($user==$row['username'])
			{
				$fname=$row['fname'];
				$lname=$row['lname'];
				$email=$row['email'];
				$phone=$row['phone'];
				$gender=$row['gender'];
				$pass=$row['pass'];
			}
		}
	}	$query1="SELECT * FROM `complaints`";
	$result=mysqli_query($conn,$query1);
	$pend=0;
	if($result)
	{
		while($row=mysqli_fetch_assoc($result))
		{
			if($user==$row['user'])
			{
				$cme=$row['pending'];
				if($cme=='1')
				{
					$pend++;
				}
			}
		}
	}
	
	$query1="SELECT * FROM `completedcomp`";
	$result=mysqli_query($conn,$query1);
	$compl=0;
	if($result)
	{
		while($row=mysqli_fetch_assoc($result))
		{
			if($user==$row['user'])
			{	
					$compl++;	
			}
		}
	}
	
	$query1="SELECT * FROM `inprogresscomp`";
	$result3=mysqli_query($conn,$query1);
	$inpro=0;
	if($result3)
	{
		while($row=mysqli_fetch_assoc($result3))
		{
			if($user==$row['user'])
			{	
					$inpro++;	
			}
		}
	}
	
	
}
 
 ?>
<html>
	<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="main.css">
  		
		
		<style>
			.items{
				margin-top:5px;
				margin-right:5%;
				font-family:Cooper Black;
				float:right;
			}
			.btn1{
				width:100%;
			}
			.navbar1{
				width:200px;
				border:1px solid #a79c9c42;
				padding:0px;
				box-shadow:1px 2px 3px 0.5px;;
				background-color:#e4d7d7ab;
			}
			.navbar-nav,.nav-item{
				width:100%;
			}
			img{
				margin:10px;
				margin-left:50px;
			}
			#file1,#file2,#file3{
				display:inline-block;
				font-size:160px;
				margin-left:50px;
				color:aqua;
				padding:20px;
				border-bottom:1px solid black;
			}
			#file1:hover{
				border:1px solid black;
				color:green;
			}
			#file1:hover #pen{
				display:block;
			}
			#file2:hover{
				border:1px solid black;
				color:blue;
			}
				#file2:hover #pen2{
				display:block;
			}
			#file3:hover{
				border:1px solid black;
				color:black;
			}	#file3:hover #pen3{
				display:block;
			}
			.in1{
				width:100%;
				border-radius:15px;
				padding:10px;
				font-size:18px;
				
			}
			#span{
				
				font-size:21px;
			}
			td{
				border-top:1px solid aqua;
				text-align:center;
			}
			.tr{
				width:auto;
			}
			.table,.tr{
				padding:10px;
				float;left;
				border:1px solid black;
			}
			th{
				
				text-align:center;
			}
			#file12:hover #pen{
				display:block;
			}
			#pen,#pen2,#pen3{
				display:none;
				font-size:18px;
				text-align:center;
				border-bottom:0.5px solid black;
			}
			#remark{
				color:green;
				padding:10px;
				font-size:24px;
			}
		</style>
		<script>
			function callsh()
			{
				
				if(document.getElementById("sh_menu").style.display=='block')
				{
					document.getElementById("sh_menu").style.display='none';
				}
				else {
					document.getElementById("sh_menu").style.display='block';
				}
			}
			function comp(){
				var make=document.getElementById("m_comp");
				var pend=document.getElementById("p_comp");
				var c=document.getElementById("c_comp");
				var i=document.getElementById("i_comp");
				var h=document.getElementById("h_comp");
				if(make.style.display=='block')
				{
					make.style.display='none';
					pend.style.display='none';
					h.style.display='none';
					c.style.display='none';
					i.style.display='none';
				}
				else
				{
					make.style.display='block';
					pend.style.display='block';
					h.style.display='block';
					i.style.display='block';
					c.style.display='block';
					
				}
			}
			function personal(){
				var e_info=document.getElementById("e_info");
				var c_pass=document.getElementById("c_pass");
				if(e_info.style.display=='block')
				{
					e_info.style.display='none';
					c_pass.style.display='none';
				}
				else
				{e_info.style.display='block';
					c_pass.style.display='block';
					
				}
			}
			function dashboard(){
				var dash=document.getElementById("dashboard");
				var einfo=document.getElementById("editinfo");
				var mcom=document.getElementById("makecomplaint");
				var pending=document.getElementById("pending");
				var history=document.getElementById("history");
				var changepass=document.getElementById("changepass");
				var inpro=document.getElementById("inpro");
				var c=document.getElementById("completed");
				c.style.display='none';
				inpro.style.display='none';
				
				einfo.style.display='none';
				mcom.style.display='none';
				pending.style.display='none';
				history.style.display='none';
				changepass.style.display='none';
				if(dash.style.display=='block')
				{
					dash.style.display='block';
				}
				else
				{dash.style.display='block';
					
				}
			}
			function editinfo()
			{
				var einfo=document.getElementById("editinfo");
				var dash=document.getElementById("dashboard");
				var mcom=document.getElementById("makecomplaint");
				var pending=document.getElementById("pending");
				var history=document.getElementById("history");
				var changepass=document.getElementById("changepass");
				var inpro=document.getElementById("inpro");
				var c=document.getElementById("completed");
				c.style.display='none';
				inpro.style.display='none';
				dash.style.display='none';
				mcom.style.display='none';
				pending.style.display='none';
				history.style.display='none';
				changepass.style.display='none';
					if(einfo.style.display=='block')
				{
					einfo.style.display='block';
				}
				else
				{einfo.style.display='block';
					
				}
			}
			function makecomplaint()
			{
				var mcom=document.getElementById("makecomplaint");
				var einfo=document.getElementById("editinfo");
				var dash=document.getElementById("dashboard");
				var pending=document.getElementById("pending");
				var history=document.getElementById("history");
				var changepass=document.getElementById("changepass");
				var inpro=document.getElementById("inpro");
				var c=document.getElementById("completed");
				c.style.display='none';
				inpro.style.display='none';
				dash.style.display='none';
				einfo.style.display='none';
				pending.style.display='none';
				history.style.display='none';
				changepass.style.display='none';
				
					if(mcom.style.display=='block')
				{
				}
				else
				{mcom.style.display='block';
					
				}
			}
			
    function startRecognition(fieldId) {
        var recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();
        recognition.lang = 'kn-IN'; // Kannada language code
        recognition.interimResults = false;
        recognition.maxAlternatives = 1;

        recognition.start();

        recognition.onresult = function(event) {
            var result = event.results[0][0].transcript;
            document.getElementById(fieldId).value += result;
        };

        recognition.onerror = function(event) {
            console.error('Speech recognition error detected: ' + event.error);
        };

        recognition.onaudiostart = function(event) {
            console.log('Audio capturing started');
        };

        recognition.onaudioend = function(event) {
            console.log('Audio capturing ended');
        };

        recognition.onspeechstart = function(event) {
            console.log('Speech has been detected');
        };

        recognition.onspeechend = function(event) {
            console.log('Speech has stopped');
            recognition.stop();
        };
    }

    function clearAllFields() {
        document.getElementById("complaintForm").reset();
    }



			function pending()
			{
					var pending=document.getElementById("pending");
					var mcom=document.getElementById("makecomplaint");
				var einfo=document.getElementById("editinfo");
				var dash=document.getElementById("dashboard");
				var history=document.getElementById("history");
				var changepass=document.getElementById("changepass");
				var inpro=document.getElementById("inpro");
				var c=document.getElementById("completed");
				c.style.display='none';
				inpro.style.display='none';
				dash.style.display='none';
				einfo.style.display='none';
				mcom.style.display='none';
				history.style.display='none';
				changepass.style.display='none';
					if(pending.style.display=='block')
				{
					pending.style.display='block';
				}
				else
				{pending.style.display='block';
					
				}
			}
			function history()
			{	var history=document.getElementById("history");
			var pending=document.getElementById("pending");
					var mcom=document.getElementById("makecomplaint");
				var einfo=document.getElementById("editinfo");
				var dash=document.getElementById("dashboard");
				var inpro=document.getElementById("inpro");
				var c=document.getElementById("completed");
				c.style.display='none';
				inpro.style.display='none';
				var changepass=document.getElementById("changepass");
				dash.style.display='none';
				einfo.style.display='none';
				mcom.style.display='none';
				pending.style.display='none';
				changepass.style.display='none';
					if(history.style.display=='block')
				{
					history.style.display='block';
				}
				else
				{
					history.style.display='block';
				}
				
			}
			function changepass()
			{
				var changepass=document.getElementById("changepass");
				var history=document.getElementById("history");
			var pending=document.getElementById("pending");
					var mcom=document.getElementById("makecomplaint");
				var einfo=document.getElementById("editinfo");
				var inpro=document.getElementById("inpro");
				inpro.style.display='none';
				var dash=document.getElementById("dashboard");
				var c=document.getElementById("completed");
				c.style.display='none';
				dash.style.display='none';
				einfo.style.display='none';
				mcom.style.display='none';
				pending.style.display='none';
				history.style.display='none';
					if(changepass.style.display=='block')
				{
					changepass.style.display='block';
				}
				else
				{
					changepass.style.display='block';
				}
			}
			function completed(){
				var changepass=document.getElementById("changepass");
				var history=document.getElementById("history");
				var pending=document.getElementById("pending");
				var mcom=document.getElementById("makecomplaint");
				var einfo=document.getElementById("editinfo");
				var inpro=document.getElementById("inpro");
				var dash=document.getElementById("dashboard");
				var c=document.getElementById("completed");
				changepass.style.display='none';
				inpro.style.display='none';
				dash.style.display='none';
				einfo.style.display='none';
				mcom.style.display='none';
				pending.style.display='none';
				history.style.display='none';
				if(c.style.display=='block')
				{
					c.style.display='block';
				}
				else
				{
					c.style.display='block';
				}
			}
			function inpro(){
				var changepass=document.getElementById("changepass");
				var history=document.getElementById("history");
				var pending=document.getElementById("pending");
				var mcom=document.getElementById("makecomplaint");
				var einfo=document.getElementById("editinfo");
				var inpro=document.getElementById("inpro");
				var dash=document.getElementById("dashboard");
				var c=document.getElementById("completed");
				changepass.style.display='none';
				c.style.display='none';
				dash.style.display='none';
				einfo.style.display='none';
				mcom.style.display='none';
				pending.style.display='none';
				history.style.display='none';
				if(inpro.style.display=='block')
				{
					inpro.style.display='block';
				}
				else
				{
					inpro.style.display='block';
				}
			}
		</script>
	</head>
	<body>
				<nav class="navbar-nav nav2 navbar-expand-sm bg-primary">
		
<i class="fa fa-reorder" onclick="callsh()" style="cursor:pointer;font-size:24px;margin:10px 2px 0px 20px;color:white"></i>		
		<div class="nav-item item1" style="margin-left:5%">
		<h3 style="color:white"><?php echo $fname." ".$lname; ?></h3>
		</div>
		
	
			<div class="nav-item items"  style="margin-left:50%;">
			<a class="btn btn-danger" title="Click to Logout" href="userlogin1.html">ಲಾಗ್ ಔಟ್</a>
		</div>
		</nav>
		<nav  class="navbar navbar1 bg-light" style="float:left;margin-top:0px;display:block;
				background-color:#e4d7d7ab;" id="sh_menu">
			<!-- Links -->
  <ul class="navbar-nav" style="width:100%;background-color:#17a2b86e;">
			  <li class="nav-item" >			
		<img src="user.png" width="90px" height="80px">
		   </li>
    <li class="nav-item"  >
      <a class="btn btn-primary btn1" onclick="dashboard()" href="#">ಡ್ಯಾಶ್‌ಬೋರ್ಡ್</a>
    </li><br />
    <li class="nav-item">
      <a class="btn btn-primary btn1" onclick="comp()" href="#">ದೂರು</a>
    </li>
	 <li class="nav-item" style="display:none;" id="m_comp">
      <a class="btn btn-light btn1" onclick="makecomplaint()" href="#">ದೂರು ನೀಡಿ</a>
    </li>
	
    <li class="nav-item" >
      <a class="btn btn-light btn1" onclick="completed()" style="display:none;" id="c_comp" href="#">ಪೂರ್ಣಗೊಂಡಿದೆ</a>
    </li>
	
    <li class="nav-item" >
      <a class="btn btn-light btn1" onclick="inpro()" style="display:none;" id="i_comp" href="#">ಪ್ರಗತಿಯಲ್ಲಿದೆ</a>
    </li>
    <li class="nav-item" >
      <a class="btn btn-light btn1" onclick="pending()" style="display:none;" id="p_comp" href="#">ಬಾಕಿಯಿದೆ</a>
    </li>
	<li class="nav-item" >
      <a class="btn btn-light btn1" onclick="history()" style="display:none;" id="h_comp" href="#">ದೂರಿನ ಇತಿಹಾಸ</a>
    
	</li>
	    <li class="nav-item" >
      <a class="btn btn-primary btn1" onclick="personal()" href="#">ವೈಯುಕ್ತಿಕ ಮಾಹಿತಿ</a>
    </li>
	    <li class="nav-item">
      <a class="btn btn-light btn1" onclick="editinfo()" style="display:none;" id="e_info" href="#">ಮಾಹಿತಿ ಸಂಪಾದಿಸಿ</a>
    </li>
	    <li class="nav-item">
      <a class="btn btn-light btn1" onclick="changepass()" style="display:none;" id="c_pass" href="#">ಪಾಸ್ವರ್ಡ್ ಬದಲಿಸಿ</a>
    </li>
	  
  </ul>
		</nav>
		<div id="main" style="width:78%;float:left;" >
			<!----------------------------------------------------------------------------------------DASHBOARD-->
			
			<div class="" id="dashboard" style="width:100%;display:block;padding:20px;">
    <h4>>ಡ್ಯಾಶ್‌ಬೋರ್ಡ್<hr /></h4>
    <div id="file1" onclick="pending()" style="cursor:pointer;">
        <i class="fa fa-file-text" style=""></i>
        <p id="file12" style="display:block;font-size:15px;text-align:center;color:blue;">ಬಾಕಿ ಇರುವ ದೂರುಗಳು<div id="pen"><?php echo $pend; ?></div></p>
    </div>
    <div id="file2" onclick="inpro()" style="cursor:pointer;">
        <i class="fa fa-file-text" style=""></i>
        <p id="file22" style="display:block;font-size:15px;text-align:center;color:blue;">ದೂರುಗಳು ಪ್ರಗತಿಯಲ್ಲಿವೆ<div id="pen2"><?php echo $inpro; ?></div></p>
    </div>
    <div id="file3" onclick="completed()" style="cursor:pointer;">
        <i class="fa fa-file-text" style=""></i>
        <p id="file32" style="display:block;font-size:15px;text-align:center;color:blue;">ಪೂರ್ಣಗೊಂಡ ದೂರುಗಳು<div id="pen3"><?php echo $compl; ?></div></p>
    </div>
</div>

			
			<!----------------------------------------------------------------------------------------DASHBOARD-->
			<!----------------------------------------------------------------------------------------editinfo-->
			<div class="" id="editinfo" style="width:90%;display:none;border-radius:15px;padding:15px;margin:10px;background-color:rgba(32, 76, 5, 0.1);border:1px solid aqua;">
				<h4>>ವೈಯುಕ್ತಿಕ ಮಾಹಿತಿ<hr /></h4>
				<form class="form" action="userupdateinfo" method="POST" style="width:100%;">
					<span id="span">ಮೊದಲ ಹೆಸರು</span><input type="text"  name="fname" class="form-control in1" placeholder="ಮೊದಲ ಹೆಸರು" value="<?php echo $fname; ?>"><br />
					<span id="span">ಕೊನೆಯ ಹೆಸರು</span><input type="text" name="lname" class="form-control in1" placeholder="ಕೊನೆಯ ಹೆಸರು" value="<?php echo $lname; ?>"><br />
					<span id="span">ಇಮೇಲ್</span><input type="text" name="email" class="form-control in1" placeholder="ಇಮೇಲ್" value="<?php echo $email; ?>"><br />
					<span id="span">ದೂರವಾಣಿ ಸಂಖ್ಯೆ</span><input type="text" name="phone" class="form-control in1" placeholder="ದೂರವಾಣಿ ಸಂಖ್ಯೆ" value="<?php echo $phone; ?>"><br />
					<span id="span">ಲಿಂಗ</span>
					<select name="gender" class="form-control in1" style="padding:2px;"  value="<?php echo $gender; ?>">
						<option>ಪುರುಷ</option>
						<option>ಮಹಿಳೆ</option>
					</select><br />
					<input type="submit"  class="btn btn-success " style="width:auto ;padding:10px;padding-left:50px;padding-right:50px;"  value="save"><br />
				</form>
			</div>
			
			<!----------------------------------------------------------------------------------------editinfo-->
						<!----------------------------------------------------------------------------------------makecomp-->
	<div class="" id="makecomplaint" style="width:100%;display:none;border-radius:15px;padding:15px;margin:10px;background-color:rgba(32, 76, 5, 0.1);border:1px solid aqua;">
    <h4>>ದೂರು ನೀಡಿ<hr /></h4>
    <form class="form" id="complaintForm" action="usermakecomp.php" method="POST" style="width:100%;" enctype="multipart/form-data">
        <span id="span2">ವರ್ಗ</span>
        <select id="category" name="category" style="width:30%;border-radius:12px;height:37px;"> 
            <option>ಗ್ರಾಮಸ್ಥ</option>
        </select>
        
        <br /><br />
        <span id="span2">ದೂರಿನ ಸ್ವರೂಪ</span>
        <input type="text" name="nature" id="nature" class="form-control in2" placeholder="ಅದರ ಬಗ್ಗೆ ....">
        <button type="button" id="nature-mic" onclick="startRecognition('nature')">ರೆಕಾರ್ಡಿಂಗ್ ಪ್ರಾರಂಭಿಸಿ</button>
        <br />
        <span id="span">ದೂರು</span>
        <textarea name="comp" id="comp" class="form-control in1" placeholder="ಬರೆಯಲು ಹಿಂಜರಿಯಬೇಡಿ. ನಿಮ್ಮ ದೂರು ಸುರಕ್ಷಿತವಾಗಿದೆ." style="height:200px;"></textarea>
        <button type="button" id="comp-mic" onclick="startRecognition('comp')">ರೆಕಾರ್ಡಿಂಗ್ ಪ್ರಾರಂಭಿಸಿ</button>
        <br />
        <span id="span">ಫೈಲ್ ಬಗ್ಗೆ (jpg or pdf) ಗರಿಷ್ಠ ಗಾತ್ರ 2Mb</span>
        <input name="f2" type="file" class="form-control">
        <br />
        <input type="submit" class="btn btn-success" style="width:auto; padding:10px; padding-left:50px; padding-right:50px;" value="ಕಳುಹಿಸು">
        <button type="button" class="btn btn-danger" style="width:auto; padding:10px; padding-left:50px; padding-right:50px;" onclick="clearAllFields()">ಎಲ್ಲವನ್ನೂ ತೆಗೆ</button>
        <br />
    </form>
</div>
<!----------------------------------------------------------------------------------------makecomp-->
			<!----------------------------------------------------------------------------------------pending-->
			<div class="" id="pending" style="width:90%;display:none;border-radius:15px;padding:15px;margin:10px;background-color:rgba(32, 76, 5, 0.1);border:1px solid aqua;">
				<h4>>ಬಾಕಿ ಇರುವ ಮಾಹಿತಿ<hr /></h4>
				<?php
	$query1="SELECT * FROM `complaints`";
	$result=mysqli_query($conn,$query1);
	$num=0;
	if($result)
	{	
		date_default_timezone_set('UTC');
		echo "<table class='table'><tr class='tr'>";
		echo "<th>ಸಂಖ್ಯೆ</th><th>ವರ್ಗ</th><th>ಸ್ವಭಾವ</th><th>ದಿನಾಂಕ ಮತ್ತು ಸಮಯ</th><th>ಫೈಲ್</th><th>ದೂರುಗಳು</th></tr>";
									$num=0;
		while($row=mysqli_fetch_assoc($result))
		{
			if($user==$row['user'])
			{
				$cme=$row['pending'];
				if($cme=='1')
				{							$num++;
											$cate=$row['category'];
										
											$nat=$row['nature'];
											$da=$row['date'];
											$fil=$row['file'];
											$co=$row['comp'];
											echo "<tr class='tr'>
											<td>$num</td>
											<td>$cate</td>
										
											<td>$nat</td>
											<td>$da</td>";
											if($fil==""||$fil=='0')
											{
												
											echo "<td>No file</td>";
											}
											else{
											echo "<td><a href='$fil' target='_blank'>view file</a></td>";
											}
											echo "<td style='width:200px;'>";
											echo $co;
											echo "</td>
											</tr>";
				}
			}
		}
		echo "</table>";
	}
	if($num==0)
	{
		echo "Still there is no record";
	}
				?>
			</div>
			
			<!----------------------------------------------------------------------------------------pending-->
			<!----------------------------------------------------------------------------------------inpro-->
			<div class="" id="inpro" style="width:90%;display:none;border-radius:15px;padding:15px;margin:10px;background-color:rgba(32, 76, 5, 0.1);border:1px solid aqua;">
				<h4>>ಪ್ರಗತಿಯ ದೂರುಗಳು<hr /></h4>
				<?php
				$num=0;
				$query1="SELECT * FROM `complaints`";
				$seeme="SELECT * FROM `inprogresscomp`";
				$resolt=mysqli_query($conn,$seeme);
					
					if($resolt)
					{
						while($cmp=mysqli_fetch_assoc($resolt))
						{
							$tellme=$cmp['user'];
						if($user==$tellme)
						{
							$inid=$cmp['compnum'];
							$remark=$cmp['remarks'];
						$result=mysqli_query($conn,$query1);
						
						if($result)
							{
							while($row=mysqli_fetch_assoc($result))
								{				
										$id=$row['id'];
										if($id==$inid)
										{
											$num++;
											$cate=$row['category'];
											$subcate=$row['subcategory'];
											$nat=$row['nature'];
											$da=$row['date'];
											$fil=$row['file'];
											$co=$row['comp'];
											echo "<h5 class='tr'>											
											Number:$num			
											</h5>
											<h6>
											 Remark :<span id='remark'>$remark</span><br />
											";
											echo"File:               ";
											if($fil==""||$fil=='0')
											{
												
											echo "<span id='span'>No file</span><br />";
											}
											else{
											echo "<a href='$fil' target='_blank'>view file</a><br />";
											}
											 echo "
											 Complaint-categoty:<span id='span'> $cate</span><br />
											 Complaint-Subcategoty:   <span id='span'>$subcate</span><br />
											 Complaint-Nature:        <span id='span'>$nat</span><br />
											 Complaint-Date:          <span id='span'>$da</span><br />
											 COMLAINT >               <span id='span'>$co</span><br /></h6><br /><hr />";
										}
										
									
								}
							}
						}
						}
					}
	if($num==0)
	{
		echo "Still there is no record";
	}
				?>
			</div>
			
			<!----------------------------------------------------------------------------------------inpro-->
			<!----------------------------------------------------------------------------------------completed-->
			<div class="" id="completed" style="width:90%;display:none;border-radius:15px;padding:15px;margin:10px;background-color:rgba(32, 76, 5, 0.1);border:1px solid aqua;">
				<h4>>ಪೂರ್ಣಗೊಂಡ ದೂರುಗಳು<hr /></h4>
				<?php
				$num=0;
				$query1="SELECT * FROM `complaints`";
				$seee="SELECT * FROM `completedcomp`";
				$reso=mysqli_query($conn,$seee);
					
					if($reso)
					{
						while($coomp=mysqli_fetch_assoc($reso))
						{
							$tellme=$coomp['user'];
						if($user==$tellme)
						{
							$cid=$coomp['compnum'];
							$remark=$coomp['remark'];
						$result=mysqli_query($conn,$query1);
						
						if($result)
							{
							while($row=mysqli_fetch_assoc($result))
								{				
										$id=$row['id'];
										if($id==$cid)
										{
											$num++;
											$cate=$row['category'];
											$subcate=$row['subcategory'];
											$nat=$row['nature'];
											$da=$row['date'];
											$fil=$row['file'];
											$co=$row['comp'];
											echo "<h5 class='tr'>											
											Number:$num			
											</h5>
											<h6>
											 Remark :<span id='remark'>$remark</span><br />
											";
											echo"File:               ";
											if($fil==""||$fil=='0')
											{
												
											echo "<span id='span'>No file</span><br />";
											}
											else{
											echo "<a href='$fil' target='_blank'>view file</a><br />";
											}
											 echo "
											 Complaint-categoty:<span id='span'> $cate</span><br />
											 Complaint-Subcategoty:   <span id='span'>$subcate</span><br />
											 Complaint-Nature:        <span id='span'>$nat</span><br />
											 Complaint-Date:          <span id='span'>$da</span><br />
											 COMLAINT >               <span id='span'>$co</span><br /></h6><br /><hr />";
										}
										
									
								}
							}
						}
						}
					}		
				?>
			</div>
			
			<!----------------------------------------------------------------------------------------completed-->
			<!----------------------------------------------------------------------------------------history-->
			<div class="" id="history" style="width:90%;display:none;border-radius:15px;padding:15px;margin:10px;background-color:rgba(32, 76, 5, 0.1);border:1px solid aqua;">
				<h4>>ಇತಿಹಾಸ ಮಾಹಿತಿ<hr /></h4>
				<?php
					$conn=mysqli_connect($servername,$username,$password,$dbname);
					if($conn)
						{
							$query1="SELECT * FROM `complaints`";
							$result=mysqli_query($conn,$query1);
							if($result)
								{
									$num=0;
									echo "<table class='table'><tr class='tr'>";
									echo "<th>ಸಂಖ್ಯೆ</th><th>ವರ್ಗ</th><th>ಸ್ವಭಾವ</th><th>ದಿನಾಂಕ ಮತ್ತು ಸಮಯ</th><th>ಫೈಲ್</th><th>ದೂರುಗಳು</th></tr>";
									while($row=mysqli_fetch_assoc($result))
									{ 
										if($user==$row['user'])
										{$num++;
											$cate=$row['category'];
											$subcate=$row['subcategory'];
											$nat=$row['nature'];
											$da=$row['date'];
											$fil=$row['file'];
											$co=$row['comp'];
											echo "<tr class='tr'>
											<td>$num</td>
											<td>$cate</td>
											<td>$nat</td>
											<td>$da</td>";
											if($fil==""||$fil=='0')
											{
												
											echo "<td>No file</td>";
											}
											else{
											echo "<td><a href='$fil' target='_blank'>view file</a></td>";
											}
											echo "<td style='width:200px;'>";
											echo $co;
											echo "</td>
											</tr>";
											
										}
									}
									echo "</table>";
									if($num==0)
									{
										echo "NO complaint made yet.";
									}
								}
						}
				?>
			</div>
			
			<!----------------------------------------------------------------------------------------history-->
			<!----------------------------------------------------------------------------------------changepass-->
			<div class="" id="changepass" style="width:90%;display:none;border-radius:15px;padding:15px;margin:10px;background-color:rgba(32, 76, 5, 0.1);border:1px solid aqua;">
				<h4>ಪಾಸ್ವರ್ಡ್ ಬದಲಿಸಿ<hr /></h4>
				<form class="form" action="userchangepass.php" method="POST" style="width:100%;">
				
					<span id="span">ಹಳೆಯ ಪಾಸ್‌ವರ್ಡ್ ನಮೂದಿಸಿ</span><input type="password"  name="oldpass" class="form-control in1" placeholder="ಹಳೆಯ ಪಾಸ್‌ವರ್ಡ್..."><br />		
					<span id="span">ಹೊಸ ಪಾಸ್ವರ್ಡ್ ನಮೂದಿಸಿ</span><input type="password" name="newpass" class="form-control in1" placeholder="ಹೊಸ ಪಾಸ್‌ವರ್ಡ್..."><br />
					<span id="span">ಹೊಸ ಪಾಸ್ವರ್ಡ್ ಅನ್ನು ಮರು-ನಮೂದಿಸಿ</span><input type="password" name="renewpass" class="form-control in1" placeholder="ಹೊಸ ಪಾಸ್‌ವರ್ಡ್ ಅನ್ನು ಮರು-ನಮೂದಿಸಿ..."><br />
					
					<input type="submit"  class="btn btn-success " style="width:auto ;padding:10px;padding-left:50px;padding-right:50px;"  value="ಪಾಸ್ವರ್ಡ್ ಬದಲಿಸಿ"><br />
				</form>
			</div>
			
			<!----------------------------------------------------------------------------------------changepass-->
		</div>
		<div id="foot" style="background-color:grey;height:80px;width:100%;float:left;margin-top:10px;text-align:center;">
		© 2019 Copyright:
    <a href="https://bgmit.clg.mudhol/"> BGMIT.Clg.Mudhol</a>
		</div>
		
	</body>
</html>