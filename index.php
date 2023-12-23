

      <?php
      include "in_header.php" ?>
        
    </style>
    <title>Document</title>
</head>
<body>
     <header id="header">
        <div id="logo">
        <h1>INSERT hh PHOTOS</h1>
        </div>
     </header>

     <div id="inputform">
    <div id="maincard">
    <div id="formitems">

    
    <form method="post" action="add.post.php" enctype="multipart/form-data">
    
    
    <!-- <input type="file" accept="image/*" capture="camera" id="imageInput">
                <button onclick="uploadImage()">Upload Image</button> -->


          <div class="inputwhat"><label>Enter Title </label></div>
          <div><input type="text" id="textinput" name="title"></div>
          <br>
          <div class="inputwhat"><label>Enter description</label></div>
          <!-- <td><input type="text" name="description" id="describe"></td> -->
          <div><textarea name="description" id="describe" cols="20" rows="5"></textarea></div>
          <br>
          <div class="inputwhat"><label>Insert Image</label></div>
          <div><input type="file" name="image" id="imageinput"></div>  
          <br> <br>
          <input type="submit" name="submit" value="submit" id="submit">
    
    </div>
    </div>
    </div>
    </form>
    
   
     <!-- display posts -->
     <div id= "up">
        <h1>Uploaded photos</h1>
 
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
            
        <div class="photos">
           
        <?php foreach ($result as $row) { ?>
         
            <div class="card">
            <h3><?php echo $row['title']; ?></h3>
            <br>
            <p><?php  echo $row['description']; ?></p> 
            <br> 
            <img src="uploads/<?php echo $row['imgURL']; ?>" alt="uploaded_img" id="imageuploaded">  
            <div class="delete">
            <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this image?')">Delete</a>
            </div>
        </div>
        <?php } ?>
        </div >
      
        </div> 

   
        
    
</body>
</html>








