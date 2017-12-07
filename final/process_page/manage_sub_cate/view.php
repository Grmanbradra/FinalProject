<?php

// read data
try {
    $stmt = $conn->prepare("SELECT * FROM categories_water WHERE water_id=:id");
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
    <h3 class="card-title"><?=$data['water_name']?></h3>
    <table class="table table-bordered">
        <tbody>
        <tr>
            <td width="250">id</td>
            <td><?=$data['water_id'] ?></td>
        </tr>
        <tr>
            <td width="250">ชื่อชนิด</td>
            <td><?=$data['water_name'] ?></td>
        </tr>
        <tr>
            <td width="250">ระดับค่ามาตารฐาน pH</td>
            <td><?=$data['water_range'] ?></td>
        </tr>
        </tbody>
    </table>
    <br>

    <a href="<?= url('manage_sub_cate.php');?>" class="btn btn-success">ย้อนกลับ</a>
</div>

