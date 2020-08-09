
<?php include "db.php";
$id=(int)$_GET['id'];
$sql="SELECT * FROM tasks WHERE id=$id";
$rows = $db->query($sql);
$row = $rows-> fetch_assoc();
if(isset($_POST['send'])){
    $task=htmlspecialchars($_POST['task']);
    $sql="UPDATE tasks SET name='$task' WHERE id = '$id'";
    $db->query($sql);
    header("location: index.php");

}

?>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<link rel="stylesheet" href="index.css">
<title></title>
</head>
<body>
   <div class="headline">
     <h1 >Update List</h1>
  </div>
   <div class="container">  
     <div class="row">
            <div class="col-md col-md-offset-1">
                <table class="table">
                    <hr><br/>
                                <form  method="post">
                                    <div class="form-group">
                                        <label for="">Task Name: </label>
                                        <input type="text" value="<?php echo $row['name'];?>" required name="task" class="form-control">
                                    </div>
                                    <input type="submit" name="send" value="Update" class="btn btn-success">&nbsp;
                                    <a href="index.php" class='btn btn-warning'>Back</a>
                                </form>
                </table>
            </div>
     </div>
   </div> 
</body>
</html>