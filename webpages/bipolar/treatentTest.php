<?php
include_once("../php/session.php");
$patient = $db->prepare("SELECT `treatment` FROM `DoctorInformation` WHERE `Username` = :username");
$patient->bindParam(":username", $user_check);
$patient->execute();
$type = $patient->fetchObject();
echo json_encode($type, JSON_FORCE_OBJECT);



?>
<!DOCTYPE HTML>
<head>
    <script src="https://code.jquery.com/jquery-3.4.0.js" integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/3.0.1/mustache.js"></script>
    <link rel="icon" type="image/png" href="https://esof423.cs.montana.edu/group1/the_clinic/webpages/images/favicon.ico">
</head>
<html>
<body >
<body onload="loadUser()">
<div id="target">Loading...</div>
<script id="template" type="x-tmpl-mustache">
{{#treatment}}
Hello {{ name }}!
{{/treatment}}
</script>

<script src="../js/treatment/treatmentGen.js"></script>

</body>

</html>
