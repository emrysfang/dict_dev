<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dict_query</title>
</head>
<body>
	<?php
		$res = "";
		if(isset($_POST['word'])){
			$word = $_POST['word'];
			$dom = new DOMDocument('1.0','utf-8');
			$dom->load('dict.xml');
			$xpath = new DOMXpath($dom);
			//$query = "/cetsix/word[name='$word']/mean";
			$query = "/dict/word[name='$word']/mean";
			$nodelist = $xpath->query($query);
			if($nodelist->length > 0){
				$res = $nodelist->item(0)->nodeValue;
			}else{
				$res = "No this item!";
			}
			/*$names = $dom->getElementsByTagName('name');
			$means = $dom->getElementsByTagName('mean');
			foreach($names as $k =>$v){
				if($v->nodeValue==$word){
					$res = $means->item($k)->nodeValue;
					break;
				}else{
					$res = "No this item!";
				}
			}*/
		}
	?>
	<form action="" method="post">
		<label for="">Please input:</label>
		<input type="text" name="word" value="<?php echo isset($word)?$word:'';?>">
		<input type="submit" value="Query">
	</form>
	<div><?php echo $res;?></div>
</body>
</html>
