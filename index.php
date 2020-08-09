
<?php include "db.php";
$page=(isset($_GET['page']) ?(int) $_GET['page'] : 1);
$perPage= (isset($_GET['per-page']) && (int)$_GET['per-page'] <= 50?(int) $_GET['per-page'] : 5);
$start = ($page > 1)? ($page * $perPage) - $perPage : 0;
$sql="SELECT * FROM tasks LIMIT ".$start.",".$perPage." ";
$total = $db->query("SELECT * FROM tasks")->num_rows;
$pages = ceil($total / $perPage);
$rows = $db->query($sql);


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
     <h1 >Todo List</h1>
  </div>
   <div class="container">  
     <div class="row">
            <div class="col-md col-md-offset-1">
                <table class="table table-hover">
                    <button type="button" class="btn btn-success" data-target="#myModal" data-toggle="modal">Add Task</button>
                    <button type="button" class="btn btn-secondary " style="float:right;" onclick="print()">Print</button>
                    <hr><br/>
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Add Task</h4>
                            </div>
                            <div class="modal-body">
                                <form action="add.php" method="post">
                                    <div class="form-group">
                                        <label for="">Task Name: </label>
                                        <input type="text" required name="task" class="form-control">
                                    </div>
                                    <input type="submit" name="send" value="add" class="btn btn-success">
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Task</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php while($row=$rows->fetch_assoc()):?>
                                <th scope="row"><?php echo $row['id'] ;?></th><br/>
                                <td class="col-md-10"><?php echo $row['name']  ?></td>
                                <td><a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Edit</a></td>
                                <td><a href="delet.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                            
                            
                        </tr>
                         <?php endwhile;?>
                    </tbody>
                </table>
                
                    <ul class="pagination justify-content-center">
                        <?php for($i = 1 ;$i <= $pages ; $i++): ?>
                        <li class="page-item"><a class="page-link" href="?page=<?php echo $i;?>&per-page=<?php echo $perPage;?>"><?php echo $i;?></a></li>
                        <?php endfor;?>
                    </ul>
                
            </div>
     </div>
   </div> 
</body>
</html>