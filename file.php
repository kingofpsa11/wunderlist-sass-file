<?php
$lang = "./translate/" . $_SESSION['lang'] . ".txt";
$file = fopen($lang, "r");
$filesize = filesize($lang);
$content = fread($file, filesize($lang));
// $_SESSION['lang'] = $_POST['lang'];
// switch (json_last_error()) {
//     case JSON_ERROR_NONE:
//         echo ' - No errors';
//     break;
//     case JSON_ERROR_DEPTH:
//         echo ' - Maximum stack depth exceeded';
//     break;
//     case JSON_ERROR_STATE_MISMATCH:
//         echo ' - Underflow or the modes mismatch';
//     break;
//     case JSON_ERROR_CTRL_CHAR:
//         echo ' - Unexpected control character found';
//     break;
//     case JSON_ERROR_SYNTAX:
//         echo ' - Syntax error, malformed JSON';
//     break;
//     case JSON_ERROR_UTF8:
//         echo ' - Malformed UTF-8 characters, possibly incorrectly encoded';
//     break;
//     default:
//         echo ' - Unknown error';
//     break;
// }
fclose($file);
?>