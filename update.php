<?php
// include database connection file
require_once 'dbconfig.php';
if (isset($_POST['update'])) {
    // Get the row id
    $rid = intval($_GET['id']);
    // Posted Values
    $name = $_POST['name'];
    $age = $_POST['age'];


    // Store Procedure for Updation
    $sql = mysqli_query($con, "call sp_update('$name','$age')");
    // Mesage after updation
    echo "<script>alert('Record Updated successfully');</script>";
    // Code for redirection
    echo "<script>window.location.href='index.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PHP CURD Operation using Stored Procedure </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <h3>Update Record | PHP CRUD Operations using Stored Procedure</h3>
                <hr />
            </div>
        </div>

        <?php
        // Get the userid
        $userid = intval($_GET['id']);
        $sql = mysqli_query($con, "call UpdateEmployees('$userid')");
        while($result = mysqli_fetch_array($sql))
        {
        ?>
            <form name="insertrecord" method="post">
                <div class="row">
                    <div class="col-md-4"><b>Name</b>
                        <input type="text" name="firstname" value="<?php echo htmlentities($result['name']); ?>" class="form-control" required>
                    </div>
                    <div class="col-md-4"><b>age</b>
                        <input type="text" name="lastname" value="<?php echo htmlentities($result['age']); ?>" class="form-control" required>
                    </div>
                </div>

            <?php } ?>

            <div class="row" style="margin-top:1%">
                <div class="col-md-8">
                    <input type="submit" name="update" value="Update">
                </div>
            </div>
            </form>
    </div>
    </div>

</body>

</html>