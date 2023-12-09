<?php
require "creds.php";
require "../sso/common.php";
validate_token("https://infotoast.org/dns/get_ip.php");
if (get_user_level() < 2) {
    http_response_code(403);
    die("premiumrequired");
}

$conn = mysqli_connect(get_database_host(), get_database_username(), get_database_password(), get_database_db());
if ($conn->connect_error) {
    http_response_code(500);
    die("dbconn");
}

$sql = $conn->prepare("SELECT * FROM log ORDER BY timestamp DESC;");
$sql->execute();
if ($result = $sql->get_result()) {
    $row = $result->fetch_assoc();
    echo $row["ip"];
} else {
    http_response_code(500);
    die("noresults");
}
