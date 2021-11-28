<?php

$videoKey=$_GET['key'];
$title=$_GET['title'];

echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/'.$videoKey.'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';

echo '<br />';
echo $title;


?>