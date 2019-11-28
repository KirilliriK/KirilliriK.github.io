<?php
function clean($value = "") {
    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);
    
    return $value;
}

$mytitle=$_POST['title'];
$myappeal=$_POST['appeal'];
$myversion=$_POST['version'];
$myurgency=$_POST['urgency'];

$mytitle=clean($mytitle);
$myappeal=clean($myappeal);
$myversion=clean($myversion);
$myurgency=clean($myurgency);

if(!empty($mytitle) && !empty($myappeal) && !empty($myversion) && !empty($myurgency)) {
echo "hello";
    //Создает XML-строку и XML-документ при помощи DOM 
 $dom = new DomDocument('1.0','utf-8'); 
 
//добавление корня - <notes> 
$notes = $dom->appendChild($dom->createElement('notes')); 
 
//добавление элемента <note> в <notes> 
$note = $notes->appendChild($dom->createElement('note')); 
 
// добавление элемента <title> в <note> 
$date = $note->appendChild($dom->createElement('date'));
$title = $note->appendChild($dom->createElement('title')); 
$appeal = $note->appendChild($dom->createElement('appeal'));
$version = $note->appendChild($dom->createElement('version'));
$urgency = $note->appendChild($dom->createElement('urgency'));

$date->appendChild($dom->createTextNode(date(DATE_RFC822))); 
$title->appendChild($dom->createTextNode($_POST['title'])); 
 $appeal->appendChild($dom->createTextNode($_POST['appeal'])); 
$version->appendChild($dom->createTextNode($_POST['version'])); 
$urgency->appendChild($dom->createTextNode($_POST['urgency'])); 
//генерация xml 
$dom->formatOutput = true; // установка атрибута formatOutput
                           // domDocument в значение true 
// save XML as string or file 
$test1 = $dom->saveXML(); // передача строки в test1 
$dom->save('test1.xml'); // сохранение файла 

$file = '/test1.xml';
header('Content-Type: test/xml');
header('Content-Disposition: attachment; filename="test.xml"');
readfile($file); }
else echo('Введите все данные');
echo"<br>";
echo "<a href='index.html'>На главную</a>";
?>

