<?php

session_start(); // create cookies on the client side
require_once "crud.php";
(new Safe())->accessControl(); // check if it's safe to open access to database file

$myDb = new Db("php://input");
$data = $myDb->read();
$myDb->setSource("database.json");
$alldata = $myDb->read();
$data["login"] = $myDb->cleardata($data["login"]);
$data["password"] = $myDb->hash($data);

if (!$myDb->isFieldUnique($data, "login")) {
    // searching for the same login
    $loginMessage = "this login is already taken!";
} elseif (!$myDb->isFieldUnique($data, "email")) {
    // searching for the same email
    $emailMessage = "this email is already taken!";
} else {
    $myDb->update($data);
}

$myDb->setSource("php://output");
$myDb->create([
    "loginMessage" => $loginMessage ?? "",
    "emailMessage" => $emailMessage ?? "",
]); // send result to browser