<?php
    include('./config.php');
    $data = file_get_contents("php://input");
    $mydata = json_decode($data, true);
    $category_name = $mydata['cname'];

    mysqli_autocommit($conn, false);
    $transflag = false;

    if($category_name != '')
    {
        $category_name = ucwords(strtolower($category_name));
        $category_name = trim(preg_replace('/\s+/',' ', $category_name));

        $checkForCategory = "SELECT COUNT(1) as noofrecord FROM categories WHERE category_name = '{$category_name}'";
        $result_checkForCategory = mysqli_query($conn, $checkForCategory);

        if($result_checkForCategory)
        {
            $row = $result_checkForCategory->fetch_assoc();
            $noofrecord = $row['noofrecord'];
            if($noofrecord == 0)
            {

            }
            else if($noofrecord == 1)
            {

            }
            else
            {
                
            }
            $query = "INSERT INTO CATEGORIES (category_name) VALUES ('".$category_name."')";
            $result = mysqli_query($conn, $query);

            if($result)
            {
                $transflag = true;

                if($transflag)
                {
                    if(mysqli_commit($conn))
                    {
                        mysqli_autocommit($conn, true);
                        echo true;
                    }
                    else
                    {
                        mysqli_autocommit($conn, true);
                        
                    }
                }
                else
                {
                    mysqli_autocommit($conn, true);
                }
            }
            else
            {
                mysqli_autocommit($conn, true);
                die false;
            }
        }
        else
        {
            mysqli_autocommit($conn, true);
            die false;
        }
    }
    else
    {
        mysqli_autocommit($conn, true);
        die false;
    }
?>