<?
$db = new PDO("sqlite:app/db/pages");
$result = $db->query('SELECT * FROM content ORDER BY datetime ASC');

$content = array();

foreach($result as $row)
	$content[$row['section']] = $row['data'];

$content = (object)$content;
include 'app/views/about/index.php';

?>