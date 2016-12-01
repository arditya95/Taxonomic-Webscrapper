<!-- kode program untuk menampilkan
info dari web yang ditentukan -->

<?php
// Include the library
include("simple_html_dom.php");

// Retrieve the DOM from a given URL
$html = file_get_html("http://a-z-animals.com/animals/caiman/");

// Find all "A" tags and print their HREFs
foreach($html->find('table.article_facts td') as $e)
    {
    $posdiv=strpos($e->innertext, "<div");
    // var_dump($posdiv);
    if ($posdiv!=false) {
        echo substr($e->innertext, 0, $posdiv-1);
    }
    else {
        echo $e->innertext . '<br>';
    }


    }
?>
