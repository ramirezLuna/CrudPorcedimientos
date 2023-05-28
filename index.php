<?php
// include database connection file
require_once'dbconfig.php';
// Code for record deletion
if(isset($_REQUEST['del']))
{
//Get row id
$rid=intval($_GET['del']);
//Qyery for deletion
$sql =mysqli_query($con,"call Deleteemployees('$rid')");

echo "<script>alert('Record deleted');</script>";
// Code for redirection
echo "<script>window.location.href='index.php'</script>";
}
?>

<?php
// include database connection file
require_once 'dbconfig.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>crud </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">

    </style>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://getbootstrap.com/dist/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>crud</h3>
                <hr />
                <a href="insert.php"><button class="btn btn-primary"> Insert Record</button></a>
                <div class="table-responsive">
                    <table id="mytable" class="table table-bordred table-striped">
                        <thead>
                            <th>#</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>

                            <?php
                            $sql = mysqli_query($con, "call GetAllEmployees()");
                            $cnt = 1;
                            $row = mysqli_num_rows($sql);
                            if ($row > 0) {
                                while ($result = mysqli_fetch_array($sql)) {
                            ?>
                                    <tr>
                                        <td><?php echo htmlentities($cnt); ?></td>
                                        <td><?php echo htmlentities($result['name']); ?></td>
                                        <td><?php echo htmlentities($result['age']); ?></td>

                                        <td><a href="update.php?id=<?php echo htmlentities($result['employeeId']); ?>"><button class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></button></a></td>

                                        <td><a href="index.php?del=<?php echo htmlentities($result['employeeId']); ?>"><button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');"><span class="glyphicon glyphicon-trash"></span></button></a></td>
                                    </tr>

                                <?php
                                    // for serial number increment
                                    $cnt++;
                                }
                            } else { ?>
                                <tr>
                                    <td colspan="9" style="color:red; font-weight:bold;text-align:center;"> No Record found</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>