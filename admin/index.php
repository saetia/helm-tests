<?
ini_set('display_errors', 1);
error_reporting(E_ALL);
if (isset($_POST['whoa'])){


  try {

  $db = new PDO("sqlite:../app/db/pages");
  $insert = "INSERT INTO `content` (`page_id`, `data`, `datetime`, `approved`) VALUES (1, '".$_POST['whoa']."', '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."')";
  $stmt = $db->query($insert);
  $result = $db->query('SELECT * FROM `content` GROUP BY `section` ORDER BY `datetime` DESC');

  foreach($result as $row) {

  	echo '<br><br>';
        echo "Id: " . $row['id'] . "\n";
        echo "section: " . $row['section'] . "\n";
        echo "data: " . $row['data'] . "\n";
        echo "updated: " . $row['approved'] . "\n";
        echo "<br><br>";
      }

  } catch(PDOException $e){
  	echo $e->getMessage();
  }









    include_once "Text/Diff.php";
    include_once "Text/Diff/Renderer.php";
    include_once "Text/Diff/Renderer/inline.php";

    // define files to compare
    $file1 = "../tmp/data1.txt";
    $file2 = "../tmp/data2.txt";

    // perform diff, print output
    $diff = &new Text_Diff(file($file1), file($file2));
    $renderer = &new Text_Diff_Renderer_inline();

    
    echo $renderer->render($diff);













}

?>

<h1>Admin</h1>

<form action="/admin/" method="post">
  <textarea name="whoa"></textarea>
  <button type="submit">save</button>
</form>
