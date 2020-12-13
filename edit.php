<?php include('class.php'); ?>
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
            <div class="d-flex flex-row">
                <button class="btn btn-danger" onclick="window.history.back()">Back</button>
                <button class="btn btn-warning" id="edit_btn">Edit</button>
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
                </thead>
            <?php 
                $fetch_onerecord = new DBcon();
                $id = $_GET['id'];
                $sql = $fetch_onerecord->fetch_onerecord($id);
                while($row = mysqli_fetch_array($sql)){
            
            ?>
        <tbody>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><input type="text" value="<?php echo $row['date']; ?>" id="date_txt"></td>
                <td><input type="text" value="<?php echo $row['time']; ?>" id="time_txt"></td>
                <td><input type="text" value="<?php echo $row['name']; ?>" id="name_txt"></td>
                <td><input type="text" value="<?php echo $row['tel']; ?>" id="tel_txt"></td>
                <input type="hidden" value="<?php echo $row['id']; ?>" id="id_txt">
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
        $('#edit_btn').click(function(){
            let id = $('#id_txt').val();
            let date = $('#date_txt').val();
            let time = $('#time_txt').val();
            let name = $('#name_txt').val();
            let tel = $('#tel_txt').val();
            $.ajax({
                url: 'process.php',
                method: 'post',
                data:{
                    'edit': 1,
                    'id':id,
                    'date':date,
                    'time':time,
                    'name':name,
                    'tel':tel
                },
                success: function(res){
                    window.location.href='index.php'
                }
            });
        });
    });
    
    

</script>