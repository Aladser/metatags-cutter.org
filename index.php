<?
error_reporting(E_ALL & ~E_DEPRECATED & ~E_WARNING);
require_once('MyDOMTree.php');

 // ДОМ-дерево
 $doc = new DOMDocument();
 $doc->loadHTMLFile("page.html");
 $elements = [];
 foreach ($doc->getElementsByTagName('*') as $row) {
     $elements[] = $row;
 }
 // DOM-дерево как итератор
 $tree = new MyDOMTree();

 /*
 $reg -> set("DS",DIRECTORY_SEPARATOR)
    -> set("APP_HOME", '.')
    -> set("AUTO_RELOAD",true);
 foreach ( $reg as $option => $value ) {
    echo nl2br("[$option] = $value\n");
 }
 echo nl2br("\n\n");
*/

 $ti=0; $di=0; $ki=0;
 foreach ($elements as $row) {
    if($row->hasAttribute('title')){
        $title = $row->getAttribute('title');
        if($title !== '') echo nl2br("*$title*\n");
        else $ti++;
    }

    if($row->hasAttribute('description')){
        $description = $row->getAttribute('description');
        if($description !== '') echo nl2br("*$description*\n");
        else $di++;
    }

    if($row->hasAttribute('keywords')){
        $eywords = $row->getAttribute('keywords');
        if($eywords !== '') echo nl2br("*$eywords*\n");
        else $ki++;
    }
 }

 echo "<br>$ti $di $ki";
?>
