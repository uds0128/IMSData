<?php
    include('./config.php');

    $gradeid = $_POST['gradeid'];
    $gradetext = $_POST['gradetext'];

    if($gradeid != '' && $gradetext != '')
    {
        $cheackforgradetext = mysqli_query($conn, "SELECT COUNT(1) AS noofrecord FROM Grades WHERE GradeText = '".$gradetext."'");
        if($cheackforgradetext)
        {
            $row = $cheackforgradetext->fetch_assoc();
            $noofrecord = $row['noofrecord'];

            if($noofrecord == 0)
            {
                mysqli_begin_transaction($conn, MYSQLI_TRANS_START_READ_WRITE);
                $editgradetext = mysqli_query($conn, "UPDATE Grades SET GradeText = '".$gradetext."' WHERE GradeId = ".$gradeid);
                if($editgradetext)
                {
                    if(!mysqli_commit($conn))
                    {
                        echo "-4"; // -4 ==> Commit Failure
                    }
                    else
                    {
                        echo "1";
                    }
                }
                else
                {
                    echo "-3"; // -3 ==> Error In Updating Grade Text
                }
            }
            else if($noofrecord == 1)
            {
                echo '-5'; // -4 ==> Same Grade Text Available In Database
            }
            else
            {
                echo '-6'; // -5 ==> Error In finding No Of Record
            }
        }
        else
        {
            echo "-2"; // -2 ==> Error In Cheacking For Same value available in Database or not
        }
    }
    else
    {
        echo '-1'; // -1 => Parameter Empty
    }
?>