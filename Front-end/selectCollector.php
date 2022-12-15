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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
<?php
include "connection.php";
?>

<body>
    <div class="container">
        <div class="form-group">
            <select name="empNames[]" id="empName" class="post form-control multiple-select2" multiple>
                <?php
                $sql = "SELECT * FROM employee WHERE role='collector'"; // 
                $i = 0;
                $empList = array();
                if ($result = mysqli_query($conn, $sql)) {
                    while ($row = mysqli_fetch_array($result)) {
                        $empList[] = $row['username'];
                ?>
                        <option><?php echo $empList[$i]; ?></option>
                <?php
                        $i++;
                    }
                }
                ?>
            </select>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(".multiple-select2").select2({
            maximumSelectionLength: 2
        });
        $(".multiple-select2").select2({
            placeholder: "Thêm Collector",
            allowClear: true
        });
    </script>
</body>

</html>