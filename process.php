<?php
    include_once('class.php');
    $db = new DBcon();

    if(isset($_POST['send']) == 1){
        $txt = $_POST['txt'];
        $sql = $db->search($txt);

        while($row = mysqli_fetch_assoc($sql)){
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['date']."</td>";
            echo "<td>".$row['time']."</td>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['tel']."</td>";
            ?>
            <!-- <input type="hidden" id="id" value="<?php echo $row['id']; ?>"> -->
            <td><button class="btn btn-warning" onclick="window.location.href='edit.php?id=<?php echo $row['id']; ?>'">edit</button></a></td>
            <td><button class="btn btn-danger" value="<?php echo $row['id']; ?>">delete</button></a></td>
            <?php
            echo "</tr>";
            }
    }
    else if(isset($_POST['send']) == 2){
        $sql = $db->fetch();

        while($row = mysqli_fetch_assoc($sql)){
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['date']."</td>";
            echo "<td>".$row['time']."</td>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['tel']."</td>";
            ?>
            <!-- <input type="hidden" id="id" value="<?php echo $row['id']; ?>">
            <td><button class="btn btn-warning" onclick="edit()">edit</button></a></td>
            <td><button class="btn btn-danger" onclick="delete1()">delete</button></a></td> -->
            <?php
            echo "</tr>";
            }
    }
    
    
   


if(isset($_POST['delete_id'])){
    $delete_id = $_POST['delete_id'];
    $delete = new DBcon();
    $sql = $delete->delete($delete_id);
    if($sql){
        echo "<script>window.confirm('จะลบจริงหรอ')</script>";
    }
}

if(isset($_POST['edit'])){
    $user = $_SESSION['name'];
    $id = $_POST['id'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $name = $_POST['name'];
    $tel = $_POST['tel'];

    $edit = new DBcon();
    $sql = $edit->edit($id, $date, $time, $name, $tel, $user);
    if($sql){
        echo "<script>alert('แก้ไขเรียบร้อย');</script>";
        echo "<script>window.location.href='index.php';</script>";
    }

}

?>

<script>

        $('.btn-danger').click(function(){
            let id = $(this).attr('value');
            let $element = $(this).parent();
            $.ajax({
                url: 'process.php',
                method: 'post',
                data:{
                    'delete_id': id
                },
                success: function(res){
                    element.hide(1000);
                }
            });
        });


</script>

