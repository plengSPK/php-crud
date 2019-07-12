<?php require_once 'process.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>    
    <title>PHP CRUD</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
    <?php if(isset($_SESSION['message'])): ?>
        <div class="alert alert-<?= $_SESSION['msg_type']; ?>">
        <?php 
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        ?>
        </div>        
    <?php endif; ?>
    <div class="container">
        <?php
            $result = $conn->query("SELECT * FROM data");

            //pre_r($result);            
            function pre_r($array){
                echo '<pre>';
                print_r($array);
                echo '</pre>';
            }
        ?>
        <div class="row justify-content-center">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Location</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['location']; ?></td>
                    <td>
                        <a href="index.php?edit=<?php echo $row['id'] ?>" class="btn btn-info">Edit</a>
                        <a href="process.php?delete=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>

            </table>
        </div>

        <div class="row justify-content-center">
            <form action="process.php" method="POST">
                <input type="hidden" name="id" value="<?= $id; ?>">
                
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="<?=$name;?>" placeholder="Enter your name">
                </div>

                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" name="location" class="form-control" value="<?=$location;?>" placeholder="Enter your location">
                </div>

                <div class="form-group">     
                    <?php if($update == true): ?>   
                        <button class="btn btn-primary" type="submit" name="update">Update</button>
                    <?php else: ?>
                        <button class="btn btn-primary" type="submit" name="save">Save</button>
                    <?php endif; ?>
                </div>
            </form>
        </div>    
    </div>
</body>
</html>