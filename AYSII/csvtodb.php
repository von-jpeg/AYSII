

<?php  
$connect = mysqli_connect("localhost", "root", "", "excel");


   $handle = fopen('.\\Download.csv', "r");
   while($data = fgetcsv($handle))
   {            
                $item1 = $data[0];  
                $item2 = $data[1];
                
                $query = "insert into excel values (0, '$data[0]', '$data[1]');";
                echo $query;
                mysqli_query($connect, $query);
   }
   fclose($handle);
   
   //header('Location: createasection.php');
 

?>  




<!-- <!DOCTYPE html>  
<html>  
 <head>  
  <title>Webslesson Tutorial</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
 </head>  
 <body>  
  <h3 align="center">How to Import Data from CSV File to Mysql using PHP</h3><br />
  <form method="post" enctype="multipart/form-data">
   <div align="center">  
    <label>Select CSV File:</label>
    <input type="file" name="file" />
    <br />
    <input type="submit" name="submit" value="Import" class="btn btn-info" />
   </div>
  </form>
 </body>  
</html> -->