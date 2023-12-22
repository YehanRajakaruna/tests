<?php
      include "in_header.php" ?>


 <!-- display posts -->
 <div>
        <h1>Uploaded photos</h1>
</div>
        <br>




            <?php
            include("db_con.php");

            $sql = "SELECT * FROM `ShowDetails`";
            $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();

            // while ($row = array_shift($result)){
            ?>  




            
       