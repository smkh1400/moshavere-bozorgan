<?php
$json_object=file_get_contents('people.json');
$arr=json_decode($json_object,true);
$en_names[16];
$fa_names[16];
$i=0;
foreach($arr as $key => $value){
	$en_names[$i]=$key;
	$i++;
}
$i=0;
foreach($arr as $value){
	$fa_names[$i]=$value;
	$i++;
$data = file_get_contents('messages.txt');
$messages = explode("\n" , $data);
$onvan;
$question=$_POST["question"];
if($question == ""){
	$msg="سوال خود را بپرس!";
	$onvan="";
	$person_id=rand(0,15);
}
else{
	$onvan="پرسش:";
	$person_id=$_POST["person"];
	$random1 =(int)  hash('ripemd160',$en_names[$person_id])%16;
	$random2 =(int)  hash('ripemd160',$question)%16;
	$random3 = ($random2 + $random1)*($random2)%16;	
	$msg = $messages[2*$random3];
}
$en_name =$en_names[$person_id];
$fa_name =$fa_names[$person_id];
}
?>
<!DOCTYPE html>
<html lang="en">

	<head>
    		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="styles/default.css">
		<title>
			مشاوره بزرگان
		</title>
	
</head>
	
<body>
		
<p id="copyright">تهیه شده برای درس کارگاه کامپیوتر،دانشکده کامییوتر، دانشگاه صنعتی شریف</p>

		<div id="wrapper">

			<div id="title">
			
        <span id="label"><?php echo $onvan ?></span>
			
        <span id="question"><?php echo $question ?></span>

    			</div>

			<div id="container">

			        <div id="message">

			            <p><?php echo $msg ?></p>

			        </div>

			        <div id="person">

			        	<div id="person">

				                <img src="images/people/<?php echo "$en_name.jpg" ?>"/>

				                <p id="person-name"><?php echo $fa_name ?></p>

				        </div>

				</div>

			</div>

			<div id="new-q">

			        <form method="post" action="index.php">

			        	سوال

				        <input type="text" name="question" value="<?php echo $question ?>" maxlength="150" placeholder="..."/>
				        را از

				        <select name="person">

				                <?php
							for($i=0 ; $i<16 ; $i++){
								?>
								<option  value="<?php echo $i ?>"><?php echo $fa_names[$i] ?></option>;
								<?php
							}	

				                ?>
					</select>

				        <input type="submit" value="بپرس"/>

			        </form>

			</div>

		</div>

	</body>

</html>