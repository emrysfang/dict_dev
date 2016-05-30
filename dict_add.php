<?php
//cellect the data posted from form
$word = $_POST['word'];
$explain = $_POST['explain'];
$example = $_POST['example'];

//using XML file 
$dom = new DOMDocument('1.0','utf-8');
//var_dump($dom);
if(file_exists("dict.xml")){
	$dom->load("dict.xml");
	$root = $dom->documentElement;
}else{
	$root = $dom->createElement('dict');
	$dom->appendChild($root);
}

//create word element
$eword = $dom->createElement('word');
$ename = $dom->createElement('name',$word);
$emean = $dom->createElement('mean', $explain);
$eeg = $dom->createElement('eg',$example);

//append element
$eword->appendChild($ename);
$eword->appendChild($emean);
$eword->appendChild($eeg);
$root->appendChild($eword);

//save
$dom->save('dict.xml');
echo "<p>"."Adding completed!"."</p>";
