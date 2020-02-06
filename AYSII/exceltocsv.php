
<?php
//include ("includes/createasection.inc.php");
require_once('C:/xampp/htdocs/Aysii/phpexcel/Classes/PHPExcel.php');
 
//Usage:

 $infile = $_FILES['excel-file']['tmp_name'];
 $outfile = "Download.csv";
 $fileType = PHPExcel_IOFactory::identify($infile);
 $objReader = PHPExcel_IOFactory::createReader($fileType);
 
 $objReader->setReadDataOnly(true);   
 $objPHPExcel = $objReader->load($infile);    
 
 $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');
 $objWriter->save($outfile);
 
 saveToDB($_POST['section-name']);
header("location: .\csvtodb.php");
//  

?>



<?php 
    function saveToDB($sectionName){


        require 'includes/dbh.inc.php';
        $sectionname = $sectionName;
        $username = $_COOKIE['User'];
        $selectStatement = "select idsection from usersection where sectionname = '$sectionname';";
        
        $result = mysqli_query($conn, $selectStatement);
        if (mysqli_num_rows($result)==0){
            $sql = "insert into usersection values (0, '$sectionname');";
            mysqli_query($conn, $sql);
        }
        $sql = "INSERT INTO usermeetsection VALUES (0, (SELECT idUsers FROM users WHERE uidUsers = '$username'), (SELECT idsection FROM usersection WHERE sectionname= '$sectionname'));";
        
        mysqli_query($conn, $sql);
    
        mysqli_close($conn);  
      
        


    }



?>
