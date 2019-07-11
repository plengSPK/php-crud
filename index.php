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
    <?php require_once 'process.php' ?>
    <div class="row justify-content-center">
        <form action="process.php" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="Enter your name">
            </div>

            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" name="location" class="form-control" value="Enter your location">
            </div>

            <div class="form-group">        
                <button class="btn btn-primary" type="submit" name="save">Save</button>
            </div>
        </form>
    </div>    
</body>
</html>