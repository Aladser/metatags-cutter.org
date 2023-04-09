<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Применение итератора</title>
</head>
<body>
    <?
    error_reporting(E_ALL & ~E_DEPRECATED & ~E_WARNING);
    require_once('MyDOMTree.php');

    // ДОМ-дерево
    $doc = new DOMDocument();
    $doc->loadHTMLFile("page.html");
    
    // DOM-дерево как итератор
    $tree = new MyDOMTree();
    $i = 0;
    foreach ($doc->getElementsByTagName('*') as $row) {
        $tree->set($i++, $row);
    }

    $count = $tree->count();
    ?>
    <p class='info'><?=nl2br("Количество DOM-элементов: $count\n")?></p>
    <?
    // удаление метатегов
    $ti=0; $di=0; $ki=0;
    while ($tree->valid()) {
        $row = $tree->current();
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
        $tree->next();
    }
    ?>
    <p class='info'><?=nl2br("Найдены атрибуты: title: $ti; description: $di; keywords: $ki;\n\n")?></p> 
    <? echo $doc->saveHTML(); ?>    
</body>
</html>

