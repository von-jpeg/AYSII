<?php
    require "header.php";
?>
<html>
<head>

<style>
    img{

        width: 40px;
        height: 40px;
        position: fixed;
        top: 39%;
        left: 60%;

    }

    img:hover {
        hidden: "TRUE";
        
    }

    .hint{

        position: fixed;
        top: 38%;
        left: 65%;

    }
</style>


</head>
<link rel="stylesheet" href="style.css">
    <main>
      <div class="wrapper-main">
            <section class="section-default">
               <?php
                if (isset($_SESSION['userId'])) {
                    echo '<div id="container">
                                    <div id="section_list">  
                                        <div id="header">
                                            <h1>Sections</h1>
                                        </div>
                                        <div id="content2" style="position:relative">
                                            <ul>
                                                <li><a class="selected2" href="createasection.php">Create a Section</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                <div id="upload-gmail">
                                    <form id="gmail-upload" action="SendToGmail2.php" method="POST" enctype="multipart/form-data">
                                        <h1>Send Grades To Students</h1>
                                        <br>
                                        <div id="files">
                                            <input type="file" name="attachment1"/> <br> <br> <br>
                                        </div>
                                        <button type="submit" name="send-gmail">Send Grade</button> 
                                    </form>
                                </div>
                            </div>';
                            // <input type="text" name="Gmail" placeholder="Email"> <br>
                            // <input type="password" name="Password" placeholder="Password">
                ?>
                <ul>
                    <?php
                        require './includes/dbh.inc.php';
                        $username = $_COOKIE['User'];

                        $query = "select distinct sectionname from usersection inner join usermeetsection on usermeetsection.idsection = usersection.idsection where usermeetsection.idUsers = (select idUsers from users where uidUsers = '$username');";
                        
                        //mysqli_query($conn, $sql);
                        

                        if ($result = mysqli_query($conn, $query)) {

                            /* fetch associative array */
                            while ($row = mysqli_fetch_row($result)) {
                                echo "<div id='list-of-sections' style='position:relative'>
                                        <li>$row[0]</li> 
                                      </div>";
                            }
                        
                            /* free result set */
                            mysqli_free_result($result);
                        }


                        mysqli_close($conn);  

                        }
                        else {
                            echo '';
                        }
                    ?>
               </ul>
            </section>
        </div>
    </main>

<?php
    require "footer.php";
?>

</html>