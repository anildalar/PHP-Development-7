<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PHP</title>
    </head>
    <body>
        <?php 
            //echo 'Good Morning';
            //1. Check if the student data is comming
            if(isset($_GET['addstudentcourse'])){
                //True
                echo 'Yes';
                //1. DB Connection Open
                $conn = mysqli_connect('localhost','root','','my_db');

                //Security
                //Always Filter/Sanitize the Incomming data and store to a local variable
                
                // /mysqli_real_escape_string(connection, escapestring)
                $name = mysqli_real_escape_string($conn, $_GET['name']);
                $contact = mysqli_real_escape_string($conn,$_GET['contact']);
                $course = mysqli_real_escape_string($conn,$_GET['course']);

                //2. Build the sql query

                /**
                 * INSERT INTO table_name (column1, column2, column3, ...)VALUES (value1, value2, value3, ...);
                 */
                $sql  = "INSERT INTO students_tbl(`name`,`contact`,`course`)VALUES('$name','$contact','$course')";

                ///3. Execute the query
                mysqli_query($conn,$sql);

                //4. Display the result
                echo 'Student Data inserted Successfully';

                //5. DB Connection Close
                mysqli_close($conn);
            }

            //1. Check if teacher data is comming
            if(isset($_GET['addteachercourse'])){
                echo 'YEs Teacher';
                 //True
                 echo 'Yes';
                 //1. DB Connection Open
                 $conn = mysqli_connect('localhost','root','','my_db');
 
                 //Security
                 //Always Filter/Sanitize the Incomming data and store to a local variable
                 
                 // /mysqli_real_escape_string(connection, escapestring)
                 $name = mysqli_real_escape_string($conn, $_GET['name']);
                 $contact = mysqli_real_escape_string($conn,$_GET['contact']);
                 $course = mysqli_real_escape_string($conn,$_GET['course']);
                 $noe = mysqli_real_escape_string($conn,$_GET['noe']);
 
                 //2. Build the sql query
 
                 /**
                  * INSERT INTO table_name (column1, column2, column3, ...)VALUES (value1, value2, value3, ...);
                  */
                 echo $sql  = "INSERT INTO teacher_tbl(`name`,`contact`,`course`,`noe`)VALUES('$name','$contact','$course','$noe')";
 
                 ///3. Execute the query
                 mysqli_query($conn,$sql);
 
                 //4. Display the result
                 echo 'Teacher Data inserted Successfully';
 
                 //5. DB Connection Close
                 mysqli_close($conn);

            }
            
        ?> 
       <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="GET">
            <div>
                <label for="name">Student Name</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div>
                <label for="contact">Student Contact</label>
                <input type="number" name="contact" id="contact" required>
            </div>
            <div>
                <label for="course">Student Course</label>
                <select name="course" id="course" required>
                    <option value="php">PHP</option>
                    <option value="js">Javascript</option>
                    <option value="py">Python</option>
                </select>
            </div>
            <input type="submit" name="addstudentcourse">
       </form> 
       <br>
       <br>
       <hr>
       <br>
       <br>
       <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="GET">
            <div>
                <label for="name">teacher Name</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div>
                <label for="contact">teacher Contact</label>
                <input type="number" name="contact" id="contact" required>
            </div>
            <div>
                <label for="course">teacher Course</label>
                <select name="course" id="course" required>
                    <option value="php">PHP</option>
                    <option value="js">Javascript</option>
                    <option value="py">Python</option>
                </select>
            </div>
            <div>
                <label for="noe">teacher Number of Experience</label>
                <input type="number" name="noe" id="noe" required>
            </div>
            <input type="submit" name="addteachercourse">
       </form> 
    </body>
</html>