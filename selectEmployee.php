<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskJanitor</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<?php
        include "connect_db.php";
    ?>
<body>
    <div class="container">
            <div class="form-group">
                <select name="empName" id="empName" class="post">
                <?php
                $sql="SELECT * FROM employee WHERE status='free' AND role='collector'";
                $i=1;
                $empList=array();
                if ($result=mysqli_query($connect, $sql))
                {
                    while ($row=mysqli_fetch_array($result))
                    {
                        $empList[]=$row['username'];
                        echo $empList[$i];
                        ?>
                        <option><?php echo $empList[$i-1];?></option>
                        <?php
                        $i++;
                    }
                }
                ?>
                </select>
            </div>
    </div>
</body>
</html>
