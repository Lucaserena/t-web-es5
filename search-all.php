<?php include ("top.html");
if (isset($_REQUEST["firstname"]) && isset($_REQUEST["lastname"])){
$name = $_REQUEST["firstname"];
$surname = $_REQUEST["lastname"];
?>
 <h1> Results for <?=  $name ?> <?=  $surname ?> </h1>
 <table>
     <tr>
        <th> # </th>
        <th class="center"> Title </th>
        <th class="right"> Year </th>
     </tr>
 <?php
  $count=0;

  $db = new PDO("mysql:dbname=imdb_small; host=localhost", "root" , "");

$rows = $db -> query ("SELECT * FROM movies m JOIN (roles r JOIN actors a ON r.actor_id= a.id)ON m.id=r.movie_id
                       WHERE a.last_name = '$surname' AND a.first_name = '$name' ORDER BY year");
  foreach ($rows as $row){
      $count++;
      ?>
      <tr>
        <td class= "left"> <?= $count ?> </td>
        <td class= "center"> <?= $row["name"] ?> </td>
	    <td class="right"> <p> <?= $row["year"] ?> </p> </td>
	 </tr>

   <?php } ?>
  </table>
<?php
 } ?>

 <?php
 include ("bottom.html");
  ?>