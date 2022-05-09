<?php

require "database.php";

$id = $_GET["id"];

$statement = $conn->prepare("DELETE FROM contacts WHERE id = :id");
$statement->execute([":id" => $id]);

header("Location: index.php");