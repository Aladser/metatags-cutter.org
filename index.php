<?
error_reporting(E_ALL & ~E_DEPRECATED & ~E_WARNING);
require_once('MyDOMTree.php');

 // ДОМ-дерево
 $doc = new DOMDocument();
 $doc->loadHTMLFile("page.html");
 
  // DOM-дерево как итератор
 $elements = [];
 foreach ($doc->getElementsByTagName('*') as $row) {
     $elements[] = $row;
 }
 $tree = new MyDOMTree();
 for($i=0; $i<count($elements); $i++) {$tree->set($i, $elements[$i]);}

 $count = $tree->count();
 echo nl2br("Количество DOM-элементов: $count\n");

 $ti=0; $di=0; $ki=0;
 foreach ($tree as $row) {
    if($row->hasAttribute('title')){
        $row->removeAttribute('title');
        $ti++;
    }

    if($row->hasAttribute('description')){
        $row->removeAttribute('description');
        $di++;
    }

    if($row->hasAttribute('keywords')){
        $row->removeAttribute('keywords');
        $ki++;
    }
 }
echo nl2br("Найдены атрибуты: title: $ti; description: $di; keywords: $ki\n\n");

echo $doc->saveHTML();
?>
