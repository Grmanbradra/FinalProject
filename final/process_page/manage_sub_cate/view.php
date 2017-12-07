<?php

// read data
try {
    $stmt = $conn->prepare("SELECT *
            FROM sub_category AS sub
            JOIN main_category AS main ON sub.digit_main=main.digit_main
            WHERE digit_sub=:id");
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
    <h3 class="card-title"><?=$data['name_sub']?></h3>
    <table class="table table-bordered">
        <tbody>
        <tr>
            <td width="250">รหัสหมวดหมู้ย่อย</td>
            <td><?=$data['digit_sub'] ?></td>
        </tr>
        <tr>
            <td width="250">ชื่อหมวดหมู่ย่อย</td>
            <td><?=$data['name_sub'] ?></td>
        </tr>
        <tr>
            <td width="250">รหัสหมวดหมู้หลัก</td>
            <td><?=$data['digit_main'] ?></td>
        </tr>
        <tr>
            <td width="250">ชื่อหมวดหมู้หลัก</td>
            <td><?=$data['name_main'] ?></td>
        </tr>
        </tbody>
    </table>
    <br>

    <a href="<?= url('manage_sub_cate.php');?>" class="btn btn-success">ย้อนกลับ</a>
</div>

