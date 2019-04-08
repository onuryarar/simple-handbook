<?php
$GLOBALS["file"] = "file/book.txt";

if (isset($_POST["submit"])) {
    newUser();
} else if (isset($_POST["edit"])) {
    editUser();
} else if (isset($_POST["delete"])) {
    delUser();
}

function newUser()
{
    $row = getFormValues("new");
    $file = fopen($GLOBALS["file"], "a");
    fwrite($file, $row);
    fclose($file);
}

function editUser()
{
    $selectedRow = getFormValues("");
    list($selectedRowID) = explode(",", $_POST["buffer"]);
    $file = fopen($GLOBALS["file"], "r");
    $addedData = [];
    while (!feof($file)) {
        $fileRow = explode("\n", fgets($file));
        list($fileRowID) = explode(",", $fileRow[0]);
        if ($fileRowID) {
            if ($fileRowID === $selectedRowID) {
                $fileRow[0] = $selectedRowID . "," . trim($selectedRow);
            }

            array_push($addedData, $fileRow[0] . "\n");
        }
    }
    fclose($file);
    rewrite($addedData);
}

function delUser()
{
    list($selectedRowID) = explode(",", $_POST["buffer"]);
    $file = fopen($GLOBALS["file"], "r");
    $addedData = [];
    $linecount = 1;
    while (!feof($file)) {
        $fileRow = explode("\n", fgets($file));
        if ($fileRow[0]) {
            list($fileRowID) = explode(",", $fileRow[0]);
            $fileRow[0] = str_replace($fileRowID . ",", "", $fileRow[0]);
            if ($fileRowID !== $selectedRowID) {
                array_push($addedData, $linecount . "," . $fileRow[0] . "\n");
                $linecount++;
            }
        }

    }
    fclose($file);
    rewrite($addedData);
}

function getFormValues($type)
{
    $ad = $_POST["name"];
    $email = $_POST["email"];
    $adres = $_POST["address"];
    $row = $ad . "," . $email . "," . $adres . "\n";
    if ($type == "new") {
        $id = getRowCount();
        $row = $id . "," . $ad . "," . $email . "," . $adres . "\n";
    }
    return $row;
}

function getRowCount()
{
    $linecount = 0;
    $handle = fopen($GLOBALS["file"], "r");
    while (!feof($handle)) {
        $line = fgets($handle);
        $linecount++;
    }
    fclose($handle);
    return $linecount;
}

function rewrite($array)
{
    $dosya = fopen($GLOBALS["file"], "w");
    foreach ($array as $satir) {
        fwrite($dosya, $satir);
    }
    fclose($dosya);
}
