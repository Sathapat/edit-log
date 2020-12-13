<?php 
    include('class.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col display-4 text-center">
                <?php echo $_SESSION['name']; ?>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col ">
                <input type="text" id="txt" class="form-control w-50" placeholder="Search">
            </div>
            <div class="col text-right">
                <button class="btn btn-warning" onclick="window.location.href='log.php'">View Log</button>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
            <table class="table table-bordered">
                <thead>
                    <th>id</th>
                    <th>date</th>
                    <th>time</th>
                    <th>name</th>
                    <th>tel</th>
                    <th>edit</th>
                    <th>delete</th>
                </thead>
            <?php 
                $fetch = new DBcon();
                $sql = $fetch->fetch();
                while($row = mysqli_fetch_array($sql)){
            ?>
        <tbody>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['time']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['tel']; ?></td>
                <td><button class="btn btn-warning" onclick="window.location.href='edit.php?id=<?php echo $row['id']; ?>'">edit</button></a></td>
            <td><button class="btn btn-danger" value="<?php echo $row['id']; ?>">delete</button></a></td>
            </tr>
        </tbody>
        <?php } ?>
    </table>
            </div>
        </div>
    </div>
</body>
</html>
<script>
    
    $('document').ready(function(){
        $('#txt').keyup(function(){
            let txt = $('#txt').val();
            if(txt != ''){
                $.ajax({
                    url: 'process.php',
                    method: 'post',
                    data:{
                        'send': 1,
                        'txt':txt
                    },
                    success:function(res){
                        $('tbody').html(res);
                    }
                });
            }else if(txt == ''){
                $.ajax({
                    url: 'process.php',
                    method: 'post',
                    data:{
                        'send': 2,
                        'txt':txt
                    },
                    success:function(res){
                        $('tbody').html(res);
                    }
                });
            }
            
        });
    });

</script>