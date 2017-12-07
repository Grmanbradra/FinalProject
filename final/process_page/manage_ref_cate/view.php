<?php

// read data
try {
    $stmt = $conn->prepare("SELECT *
            FROM ref_category AS rc
            JOIN main_category mc ON rc.digit_main = mc.digit_main
            JOIN sub_category sc ON rc.digit_sub = sc.digit_sub
            JOIN key_category category ON rc.id_key = category.id_key 
            WHERE id_ref_cate=:id");
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
    <h3 class="card-title">ความสัมพันธ์ของข้อมูล ID : <?=$data['id_ref_cate']?></h3>
    <table class="table table-bordered">
        <tbody>
        <tr>
            <td width="250">id</td>
            <td><?=$data['id_ref_cate'] ?></td>
        </tr>
        <tr>
            <td width="250">รหัสหมวดหลัก</td>
            <td><?=$data['digit_main'] ?></td>
        </tr>
        <tr>
            <td width="250">ชื่อหมวดหลัก</td>
            <td><?=$data['name_main'] ?></td>
        </tr>
        <tr>
            <td width="250">รหัสหมวดย่อย</td>
            <td><?=$data['digit_sub'] ?></td>
        </tr>
        <tr>
            <td width="250">ชื่อหมวดย่อย</td>
            <td><?=$data['name_sub'] ?></td>
        </tr>

        <tr>
            <td width="250">รหัสคีย์คำศัพท์</td>
            <td><?=$data['id_key'] ?></td>
        </tr>
        <tr>
            <td width="250">ชื่อคีย์คำศัพท์</td>
            <td><?=$data['keyword'] ?></td>
        </tr>

        </tbody>
    </table>
    <br>

    <a href="<?= url('manage_ref_cate.php');?>" class="btn btn-success">ย้อนกลับ</a>
</div>

