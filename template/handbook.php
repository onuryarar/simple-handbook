<?php
$GLOBALS["file"] = "file/book.txt";
$content = "<table id='bookList'>";
$content .= "<tr><th>Ad Soyad</th><th>E-Mail</th><th>Adres</th></tr>";
$dosya = fopen($GLOBALS["file"], "r");
while (!feof($dosya)) {
    $values = explode(",", fgets($dosya));

    if (count($values) > 1) {
        $content .= "<tr>";
        $content .= "<td id='name'>" . $values[1] . "</td>";
        $content .= "<td id='email'>" . $values[2] . "</td>";
        $content .= "<td id='address'>" . $values[3] . "</td>";
        $content .= "</tr>";
    }
}
fclose($dosya);
$content .= "</table>";
echo $content;
