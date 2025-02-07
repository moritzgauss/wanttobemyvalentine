<?php
$data = json_decode(file_get_contents("php://input"), true);
$email = $data["email"];
$date = $data["date"];

$subject = "Terminbestätigung für Valentinstag";
$message = "Hallo! Dein Termin wurde erfolgreich für den $date bestätigt. Wir freuen uns!";
$headers = "From: valentinstag@deinewebsite.de";

if (mail($email, $subject, $message, $headers)) {
  http_response_code(200);
  echo json_encode(["message" => "E-Mail erfolgreich gesendet."]);
} else {
  http_response_code(500);
  echo json_encode(["message" => "E-Mail konnte nicht gesendet werden."]);
}
?>