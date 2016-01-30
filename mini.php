<html>

<head>
<title>Mini</title>
</head>
<body>

<?php
// website One
/*
$website = file_get_contents('Dr. Martin Burtscher.html');
$file = fopen("Burtscher-output.txt", "w");
*/
// website Two

$website = file_get_contents('Ali.html');
$file = fopen("Ali-output.txt", "w");

// website three
/*
$website = file_get_contents('Shi.html');
$file = fopen("shi-output.txt", "w");
*/

// Name
$regex = '#Dr. [^\r*(*\n)]+[a-z]+(())+#i';
 if(preg_match($regex, $website, $match))
{
	str_replace("</title", " ", $regex);
	echo fwrite($file," Name: \n");
	echo fwrite($file, $match[0]. "\r\n");
	echo fwrite($file,"\n" );
	
}
// Research Interests
$regex = "~Interests<\/h3>(.*?)<\/div>(.*?)<div class=\"panel-body\"><p>(.*?)</p>~s";
if(preg_match($regex, $website, $match))
{
    $step = preg_replace("~Interests<\/h3>(.*?)<\/div>(.*?)<div class=\"panel-body\"><p>~s", "", $match[0]);
    $edu = str_replace("</p>", " ", $step);
	echo fwrite($file," Research Interests: ");
	echo fwrite($file, $edu. "\r\n");
	echo fwrite($file,"\n ");
     
}
// Education
$regex = "~Education<\/h3>(.*?)<\/div>(.*?)<div class=\"panel-body\"><p>(.*?)</p>~s";
if(preg_match($regex, $website, $match))
{
    $step = preg_replace("~Education<\/h3>(.*?)<\/div>(.*?)<div class=\"panel-body\"><p>~s", "", $match[0]);
    $edu = str_replace("</p>", " ", $step);
	echo fwrite($file,"Education: ");
	echo fwrite($file, $edu. "\r\n");
	echo fwrite($file,"\n ");
        
}
// Email
if(preg_match('~([a-z]+[0-9]+)~', $website, $match)){
	echo fwrite($file,"Email: ");
	echo fwrite($file, $match[0]);
	echo fwrite($file,"@txstate.edu". "\r\n");
	echo fwrite($file,"\n ");
    
}
//website
$regex = "~http://www.cs.txstate.edu/(.[a-z]+[0-9]+/*)~";
if(preg_match($regex, $website, $match))
{
	echo fwrite($file,"website: ");
	echo fwrite($file, $match[0]. "\r\n");
	echo fwrite($file,"\n ");
     
}
fclose($file);

?>

</body>
</html>