<?php

session_start(); // create PHPSESSID cookies on the client side
require_once "crud.php";
$myDb = new Db("php://input");
$data = $myDb->read();

if ($data["accessStatus"] === "accessingDatabaseFile") {
    // to open access
    $_SESSION["2nd"] = "-nevergonnaletudown";
}

if ($data["accessStatus"] === "closingDatabaseFile") {
    // to close access
    unset($_SESSION["2nd"]);
}

if ($data["accessStatus"] === "logout") {
    if (isset($_SESSION["name"]) && !empty($_SESSION["name"])) {
        unset($_SESSION["name"]);
    }
}

$myDb->setSource("php://output");

if (isset($_SESSION["name"]) && !empty($_SESSION["name"])) {
    // the session status checking when the user navigates between the pages of the website
    $myDb->create(["message" => $_SESSION["name"]]);
} // send result to browser
else {
    $myDb->create(["message" => "no_session"]);
} // send result to browser