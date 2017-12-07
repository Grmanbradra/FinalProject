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
    <table class="table table-bordered">
        <tbody>
        <tr>
            <td width="250">id</td>
            <td><?=$data['digit_main'] ?></td>
        </tr>
        <tr>
            <td width="250">ชื่อหมวดหลัก</td>
            <td><?=$data['name_main'] ?></td>
        </tr>
        </tbody>
    </table>
    <br>

    <a href="<?= url('manage_main_cate.php');?>" class="btn btn-success">ย้อนกลับ</a>
</div>

