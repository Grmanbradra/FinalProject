<?php

// read data
try {
    $stmt = $conn->prepare("SELECT * FROM main_category WHERE digit_main=:id");
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    $data = $stmt->fetch();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    $data = null;
}
$conn = null;
?>
<div class="card">
    <h3 class="card-title"><?=$data['name_main']?></h3>
    <form action="<?= url('manage_main_cate.php?action=update&id='.$data['digit_main']);?>" method="post">
        <table class="table table-bordered">
            <tbody>
            <tr>
                <td width="250">id</td>
                <td>
                    <input type="text" name="digit_main" disabled value="<?=$data['digit_main'] ?>" style="width: 100%">
                </td>
            </tr>
            <tr>
                <td width="250">ชื่อหมวดหลัก</td>
                <td>
                    <input type="text" name="name_main" value="<?=$data['name_main'] ?>" style="width: 100%">

                </td>
            </tr>
            </tbody>
        </table>
        <p class="bs-component"><button type="submit" name="submit" class="btn btn-default btn-lg btn-block" href="#">บันทึก</button></p>
    </form>
    <br>

    <a href="<?= url('manage_main_cate.php');?>" class="btn btn-success">ย้อนกลับ</a>
</div>

