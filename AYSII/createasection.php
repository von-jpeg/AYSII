<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="This is where you register to sign-in to the website">
        <meta name="keywords" content="Educational Purposes, Ateneo de Davao Senior High School, AdDU, AdDU SHS, Helpful, Home,">
        <title>Create a Section</title>
        <link rel="stylesheet" type="text/css" href="style2.css">



    </head>

    <body>
        <div id="container">
            <div id="header">
                <h1>Create a Section</h1>
            </div>
            <form action="exceltocsv.php" method="POST" enctype="multipart/form-data">
                <div id="main">
                    <h2>Section Name:</h2>
                    <div id="section-combobox">
                        <select name="section-name" style="width: 70%; text-align-last:right; padding-right: 70px; ">
                    </div>      
                       <?php
                        require './includes/dbh.inc.php';

                        $query = "select * from usersection;";
                        
                        //mysqli_query($conn, $sql);
                        

                        if ($result = mysqli_query($conn, $query)) {

                            /* fetch associative array */
                            while ($row = mysqli_fetch_row($result)) {
                                echo "<option value='$row[1]'>$row[1]</option>";
                            }
                        
                            /* free result set */
                            mysqli_free_result($result);
                        }
                       ?>
                    </select>
                    <br>
                    <h2>Upload List of Students:</h2>
                    <div id="excel-file">
                        <input type="file" name="excel-file">
                    </div>
                    <br><br><br>
                    <button type="submit">Create Section</button>
                    <br><br>
                    <div id="backtohome">
                    <a class="back-to-home" href="index.php">Back to Home</a>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>