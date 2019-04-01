<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);

if(!$update)
{
  exit;
}

$message = isset($update['message']) ? $update['message'] : "";
$messageId = isset($message['message_id']) ? $message['message_id'] : "";
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$senderId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$date = isset($message['date']) ? $message['date'] : "";
$text = isset($message['text']) ? $message['text'] : "";
$text = trim($text);
$text = strtolower($text);

header("Content-Type: application/json");
$answer = '';
header("Content-Type: application/json");
$response = '';

$answers = array (
"L’unico capolavoro è vivere",
"Sei così bell* che fa male guardarti!",
"Sei sempre incantevole, ed i tuoi sorrisi sono i più belli e dolci che abbia mai visto!",
"Sei unapersona fantastica",
"Le prospettive sono buone",
"Andrà tutto per il meglio",
"La giornata prendera una piega inaspettata",
"Mangia un gelato e tutto andrà per il meglio",
"puoi farcela, sei una persona forte",
"Prenditi del tempo per te, te lo meriti",
"si",
);



if(strpos($text, "/start") === 0 || $text=="ciao")
{
	$response = "Ciao $firstname, benvenuto! \n
		prova a scrivere: 		-sono triste \n
						-stupiscimi \n
						-fammi un complimento\n
						oppure: puoi rallegrarmi?\n";
}
elseif($text=="sono triste")
{
	$response = "non esserlo, sei forte";
}
elseif($text=="fammi un complimento")
{
	$response = "sei una persona straordinaria";
}
elseif($text=="stupiscimi")
{
	$response = "sarà una giornata bellissima";

}
else if
{(strlen($text)>0 && substr($text, -1, 1)=='?')
{
// Da qui mandi la risposta
$answer = $answers[rand(0, count($answers)-1)];
}}

$parameters = array('chat_id' => $chatId, "text" => $answer);
$parameters = array('chat_id' => $chatId, "text" => $response);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);

