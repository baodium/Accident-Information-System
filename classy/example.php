<?php echo '<pre>';

include './autoload.php';
include '../model/mysql.php';
$main=new mysql();


$tokenizer = new HybridLogic\Classifier\Basic;
$classifier = new HybridLogic\Classifier($tokenizer);


$classifier->train('serious', 'Serious');
//$classifier->train('hot', 'It was a warm day in the sun');
//$classifier->train('hot', 'This tea is hot!');

$classifier->train('fatal', 'Fatal');
//$classifier->train('cold', 'It\'s cold at night');
//$classifier->train('cold', 'Ice formed on my at over night');

$classifier->train('minor', 'Minor');
//$classifier->train('cloudy', 'It was a nice cloud');
//$classifier->train('cloudy', 'Rain will soon fall');
$accidents=$main->load_accident("6");
//var_dump($accidents);
$str='';
foreach($accidents as $accident){
$str.=$accident['type'].' ';
}

var_dump($str);
$groups = $classifier->classify($str);
var_dump($groups);

$groups = $classifier->classify('Hot');
//var_dump($groups);