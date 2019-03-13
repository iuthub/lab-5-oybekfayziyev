<?php 
  if(isset($_POST['submit'])){
  	$name = $_POST['name'];
  	$section = $_POST['section'];
  	$cart_no = $_POST['cart_no'];
  	$cart = $_POST['credit'];
  	$file = "suckers.txt";
  	$data = array($name,$section,$cart_no,$cart); 


  		file_put_contents($file, implode(';',$data)."\n",FILE_APPEND|LOCK_EX);


  }

 ?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Buy Your Way to a Better Education!</title>
		<link href="http://www.cs.washington.edu/education/courses/cse190m/09sp/labs/4-buyagrade/buyagrade.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<?php if(empty($name) || empty($section) ||empty($cart_no) || empty($cart)){ ?>
			<h1>Sorry</h1>
		<p>You didn't fill out the form completely. <a href="buyagrade.html">Try again?</a></p>
		
	<?php } else{?>
	<h1>Thanks, sucker!</h1>

		<p>Your information has been recorded.</p>

		<dl>
			<dt>Name</dt>
			<dd><?php echo $name; ?></dd>

			<dt>Section</dt>
			<dd><?php echo $section; ?></dd>

			<dt>Credit Card</dt>
			<dd><?php echo $cart_no; echo  " (". $cart .")"; ?></dd>
		</dl>

		<p>Here are all the suckets who have submitted here: </p>
		<?php 

		$file_read = file_get_contents($file); echo "<pre>".$file_read ."</pre>";?>
		
	<?php } ?>

	</body>
</html>  