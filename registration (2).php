<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bindbay: Binding Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script type="js/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<!-- gallery -->
  <style>
		.label-div{
			width:; 
			height:auto; 
			margin:left; 
			padding-top:0px;
		}
	.labels{
		font-size:16px; 
		font-weight:200;
	}
	.label-div2{
		width:80%; 
		height:auto; 
		margin:left; 
		padding:20px 5px 5px 10px;
	}
  </style>
</head>
<body>
<!--    $to = "bindbay1@gmail.com"; -->
<?php
//index.php

$message = '';

function clean_text($string)
{
	$string = trim($string);
	$string = stripslashes($string);
	$string = htmlspecialchars($string);
	return $string;
}

if(isset($_POST["submit"]))
{
/*
    $programming_languages = '';
	foreach($_POST["programming_languages"] as $row)
	{
		$programming_languages .= $row . ', ';
	}
	$programming_languages = substr($programming_languages, 0, -2); */
	
	$path = 'upload/' . $_FILES["file"]["name"];
	move_uploaded_file($_FILES["file"]["tmp_name"], $path);
	$message = '
		<h3 align="center">Hi Bindbay, this is new task for you, Please find the below Details</h3>
		<table border="1" width="100%" cellpadding="5" cellspacing="5">
			<tr>
				<td width="30%">Name</td>
				<td width="70%">'.$_POST["fname"].'</td>
			</tr>
			<tr>
				<td width="30%">Phone Number</td>
				<td width="70%">'.$_POST["phone"].'</td>
			</tr>
			<tr>
				<td width="30%">Email Address</td>
				<td width="70%">'.$_POST["email"].'</td>
			</tr>
				<tr>
				<td width="30%">Addressr</td>
				<td width="70%">'.$_POST["address"].'</td>
			</tr>
			
			<tr>
				<td width="30%">City</td>
				<td width="70%">'.$_POST["city"].'</td>
			</tr>
			
			
			<tr>
				<td width="30%">District</td>
				<td width="70%">'.$_POST["district"].'</td>
			</tr>
			
			<tr>
				<td width="30%">State</td>
				<td width="70%">'.$_POST["State"].'</td>
			</tr>
			
			<tr>
			    <td width="30%">Pincode</td>
			    <td width="70%">'.$_POST["pincode"].'</td>
			    
			</tr>
			
			<tr>
				<td width="30%">Binding</td>
				<td width="70%">'.$_POST["Binding"].'</td>
			</tr>
			
			<tr>
				<td width="30%">Page Type</td>
				<td width="70%">'.$_POST["pagetype"].'</td>
			</tr>
			
			<tr>
				<td width="30%">Pages</td>
				<td width="70%">'.$_POST["pages"].'</td>
			</tr>
			
			<tr>
				<td width="30%">Paper Quality</td>
				<td width="70%">'.$_POST["file_type"].'</td>
			</tr>
			
			<tr>
				<td width="30%">Page Color</td>
				<td width="70%">'.$_POST["filecolor"].'</td>
			</tr>
			
			<tr>
				<td width="30%">Phone Number</td>
				<td width="70%">'.$_POST["phone"].'</td>
			</tr>
			<tr>
				<td width="30%">Copy</td>
				<td width="70%">'.$_POST["copy"].'</td>
			</tr>
			
			<tr>
				<td width="30%">File Color</td>
				<td width="70%">'.$_POST["pfile_color"].'</td>
			</tr>
			
			<tr>
				<td width="30%">Total Price</td>
				<td width="70%">'.$_POST["totalprice"].'</td>
			</tr>
			
			<tr>
				<td width="30%">Payment</td>
				<td width="70%">'.$_POST["payment"].'</td>
			</tr>
			
			<tr>
				<td width="30%">Message</td>
				<td width="70%">'.$_POST["message"].'</td>
			</tr>
			
		</table>
	';
	
	require 'class/class.phpmailer.php';
	$mail = new PHPMailer;
	$mail->IsSMTP();								//Sets Mailer to send message using SMTP
	$mail->Host = 'bindbay.com';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
	$mail->Port = '465';								//Sets the default SMTP server port
	$mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
	$mail->Username = 'info@bindbay.com';					//Sets SMTP username
	$mail->Password = 'Bindbay12321';					//Sets SMTP password
	$mail->SMTPSecure = 'ssl';							//Sets connection prefix. Options are "", "ssl" or "tls"
	$mail->From = "info@bindbay.com";					//Sets the From email address for the message
	$mail->FromName = $_POST["name"];				//Sets the From name of the message 
	$mail->AddAddress('sales@bindbay.com', 'Printing Details');		//Adds a "To" address  ("")
	$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
	$mail->IsHTML(true);							//Sets message type to HTML
	$mail->AddAttachment($path);					//Adds an attachment from a path on the filesystem
	$mail->Subject = 'Application for Binding Deatils';				//Sets the Subject of the message
	$mail->Body = $message;							//An HTML or plain text message body
	if($mail->Send())								//Send an Email. Return true on success or false on error
	{
		$message = '<div class="alert alert-success">Application Successfully Submitted</div>';
		unlink($path);
	}
	else
	{
		$message = '<div class="alert alert-danger">Sorr!! There is an Error</div>';
	}
}

?>

    <div class="modal-dialog " >
      <div class="modal-content" style="height:auto; background-color: rgba(255, 255, 255, .15);">
        <div class="modal-header" style="    background-color: #cab7b7;">
          <a href="../price.php"><button type="button" class="close" >&times;</button></a>
          <h3 class="modal-title" style="text-align:center;">Send Your File</h3>
          <p class="modal-title" style="text-align:center;"> Hey This is Bindbay, Happy to help you, we provide online printing services only in Greater Noida & Delhi NCR  </p>
        </div>
		
        <div class="modal-body" >
			<?php print_r($message); ?>
          <form class="" id="home_loan" method="post" action="#" enctype="multipart/form-data">
		  			<div class="row">
				<div class="col-md-6 form-group label-div !important;" >
					<label>Name</label>
					<input type="text" name="fname" placeholder="First Name" class="form-control" style="width:90%; margin:left;">
				</div>
				<div class="col-md-6 form-group label-div" style="padding-left:12px; !important;" required>
					<label style="">Phone Number</label>
					<input type="number" name="phone" placeholder="Phone number" class="form-control" style="width:90%; margin:left;">
				</div>
			</div>
				
				<div class="row">
				    <div class="col-md-6 from-group label-div !important;" required>
				        <input type="email" name="email" placeholder="Email" class="form-control" style="width:90%; margin:left;">
				    </div>
				</div>
					<div class="row">
				<div class="col-md-6 form-group label-div !important;" required>
					<label>Address</label>
					<input type="text" name="address" placeholder="Address" class="form-control" style="width:90%; margin:left;">
				</div>
				<div class="col-md-6 form-group label-div" style="padding-left:12px; !important;" required>
					<label style="color:#fff;">   </label>
					<input type="text" name="city" placeholder="City" class="form-control" style="width:90%; margin:left;">
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 form-group label-div !important;" required>
					<input type="text" name="district" placeholder="District" class="form-control" style="width:90%; margin:left;">
				</div>
				<div class="col-md-6 form-group label-div" style="padding-left:12px; !important;">
					
					<input type="text" name="State" placeholder="State" class="form-control" style="width:90%; margin:left;" required>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 form-group label-div !important;" required>
					<input type="number" name="pincode" placeholder="Postal Code" class="form-control" style="width:90%; margin:left;">	
				</div>
				</div>
			<div class="row" >
				<div class="col-md-6 form-group label-div" >
					<label>Binding Type</label>
					<select class="form-control" name="Binding" style="width:90%; margin:left;" readonly >
						<option value="">Select Binding Type</option>
						<option value="" <?php echo $_POST['binding']==0? "selected" : "";?>>Select Type</option>
						<option value="None (0)" <?php echo $_POST['binding']==1? "selected" : "";?>>None (Rs. 0.00/-)</option>
						<option value="Hard Binding (Rs.110.0/-)" <?php echo $_POST['binding']==2 ?"selected" : "";?>>Hard Binding (Rs. 45.0/-)</option>
						<option value="Hard Binding With Golden Print (Rs. 150.0/-)" <?php echo $_POST['binding']==3 ?"selected" : "";?>>Hard Binding With Golden Print(Rs. 90.0/-)</option>
						<option value="Soft Cover Binding (Rs. 45.0/-)" <?php echo $_POST['binding']==4 ?"selected" : "";?>>Soft Cover Binding (Rs. 35.0/-)</option>
						<option value="Soft Binding (Rs. 25.0/-) " <?php echo $_POST['binding']==5 ?"selected" : "";?>> Soft Binding (Rs. 45.0/-)</option>
						<option value="Spiral Binding (Rs. 30.0/-)" <?php echo $_POST['binding']==6 ?"selected" : "";?>> Spiral Binding (Rs. 20.0/-)</option>
						<option value="Spiral Binding with cover (Rs. 50.0/-)" <?php echo $_POST['binding']==7 ?"selected" : "";?>> Spiral Binding with cover (Rs. 45.0/-)</option>
					</select>
				</div>
				<div class="col-md-6 form-group label-div" style="padding-left:12px; !important;">
					<label >Page Type</label>
						<select class="form-control" name="pagetype" style="width:90%; margin:left;" readonly >
						<option value="">Page Type</option> 
						<option value="A4" <?php echo $_POST['size']==0 && $_POST['side']==0? "selected" : "";?>>A4 Size Single Side</option>
						<option value="A4" <?php echo $_POST['size']==0 && $_POST['side']==1? "selected" : "";?>> A4 Size Double side</option>
						<option value="A5" <?php echo $_POST['size']==1 && $_POST['side']==0? "selected" : "";?>> A5 Size Single Side</option>
						<option value="A5" <?php echo $_POST['size']==1 && $_POST['side']==1? "selected" : "";?>> A5 Size Double side</option>
					</select>
					</div>
			</div>
			<div class="row">
				<div class="col-md-6 form-group label-div" style="padding-left:12px; !important;">
					<label> Pages</label>
					<input type="number" <?php echo "value=".$_POST['number'].""?> name="pages" placeholder="Enter No. of pages" class="form-control" style="width:90%; margin:left;" readonly >
				</div>
				<div class="col-md-6 form-group label-div" style="padding-left:12px; !important;">
					<label >Page Color</label>
						<select class="form-control" name="filecolor" style="width:90%; margin:left;" readonly>
						<option value="Blank & White"  <?php echo $_POST['color']==0? "selected" : "";?>>Black & White</option>
						<option value="Color"  <?php echo $_POST['color']==1? "selected" : "";?>>Full Color</option>
					</select>
					</div>
			</div>
			<div class="row">
				<div class="col-md-6 form-group label-div" style="padding-left:12px; !important;">
					<label> Copy</label>
					<input type="number" name="copy" <?php echo "value=".$_POST['copies'].""?> placeholder="Enter No. of Copies" class="form-control" style="width:90%; margin:left;" readonly >
				</div>
				<div class="col-md-6 form-group label-div" style="padding-left:12px; !important;">
					<label>File Printing Color</label>
					<select class="form-control" name="pfile_color" id="pfile_color" style="width:90%; margin:left;" readonly>
						<option value="">Select Prinitng color</option>
						<option value="No Need"  <?php echo $_POST['fcolor']==0? "selected" : "";?>>None</option>
						<option value="Black"  <?php echo $_POST['fcolor']==1? "selected" : "";?>>Black</option>
						<option value="Green"  <?php echo $_POST['fcolor']==2? "selected" : "";?>>Green</option>
						<option value="Blue"  <?php echo $_POST['fcolor']==3? "selected" : "";?>>Blue</option>
						<option value="Mehroon"  <?php echo $_POST['fcolor']==4? "selected" : "";?>>Mehroon</option>
					</select>
				</div>
				<div class=col-md-6 form-group label-div" style="padding-left:12px; !important;">
				    <label>Paper Quality</label>
				    <select class="form-control" name="file_type" style="width:90%; margin:left;" readonly>
						<option value="">Select Page Type</option>
						<option value="75 GSM - Normal Paper"  <?php echo $_POST['type']==0? "selected" : "";?>>75 GSM - Normal Paper</option>
						<option value="85 Gsm Bond"  <?php echo $_POST['type']==1? "selected" : "";?>>85 Gsm Bond</option>
						<option value="100 Gsm Bond"  <?php echo $_POST['type']==2? "selected" : "";?>>100 Gsm Bond</option>
						<option value="100 Silky White D.O Paper"  <?php echo $_POST['type']==3? "selected" : "";?>>100 Silky White D.O Paper</option>
					</select>
				</div>
				<div class="col-md-6 form-group label-div" style="padding-left:12px; !important;">
					<label>Total Price</label>
                    <input type="text" <?php echo "value=".$_POST['total'].""?> name="totalprice" class="form-control" style="width:90%; margin:left;" readonly >
				</div>
			</div>
				<div class="row">
				    <div class="col-md-6 form-group label-div" >
				        <label> Upload Document</label>
				        <input type="file" name="file" id="File" accept=".doc,.docx, .pdf, .xls, .rtf, .txt, .wks, .ppt, .pptx" required >
				        </div>
				    
				    <div class="col-md-6 from--group label-div" style="padding-left:12px; !important;">
				
					<label>Payment Option</label>
					<select class="form-control" name="payment" id="payment" style="width:90%; margin:left; !important;" required>
						<option value="">Select Payment Mode</option>
						<option value="Google Pay (9555443344)">Google Pay (9555443344)</option>
						<option value="PayTm (9555443344)">Paytm (9555443344)</option>
						<option value="Phone Pe (9555443344)"> Phone Pe (9555443344)</option></option>
					</select>
				</div> 
				</div>
           <div class="col-md-12 from-group" style="padding-left:12px;">
                <input type="textarea" name="message" class="form-control" style="margin-bottom: 10px; margin-top: 10px; height: 100px;" >
            </div>
			<div class="row" >
				<div class="col-md-12" style="paddin-left:30px; margin-left:20px;">
					<input type="submit" class="btn btn-info btn-lg" name="submit" onClick="myFunction" value="Send Now">
					<br><br>
				</div>
			</div>
		  </form>
        </div>
       
      </div>
    </div>
  </div>
<script>
function myFunction() {
    var x = document.getElementById("File");
    x.disabled = true;
}
</script>
</body>
</html>