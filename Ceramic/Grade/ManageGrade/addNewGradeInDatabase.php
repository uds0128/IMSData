<?php
    include('./config.php');

    $gradetext = $_POST['gradetext'];

    mysqli_begin_transaction($conn, MYSQLI_TRANS_START_READ_WRITE);
    $findIfRecordExists = mysqli_query($conn, "SELECT COUNT(1) AS noofrecord from Grades where GradeText = '".$gradetext."'");

    if($findIfRecordExists)
    {
        $row = $findIfRecordExists->fetch_assoc();
        $noofrecord = $row['noofrecord'];

        if($noofrecord == 1 )
        {
            echo '0'; // 0 ==> Record Exists For Given Grade Text
        }
        else if($noofrecord == 0)
        {
            $insertIntoGrades = mysqli_query($conn, "INSERT INTO Grades (GradeText) Values ('".$gradetext."')");
            if($insertIntoGrades)
            {
                if(!mysqli_commit($conn))
                {
                    echo "-3"; // -3 ==> Commit Failuer
                }
                else
                {
                    echo "1"; // 1 ==> Succesfully Inserted
                }
            }
            else
            {
                echo "-2";//  -2 ==> Failes To Insert Into Grades
            }
        }
        else
        {
            echo "-4"; // -4 ==> Other Then 0 and 1 Record found for GradeText
        }
    }
    else
    {
        echo "-1"; // -1 ==> Error In finding grade text exists or not in Data base
    }

?>