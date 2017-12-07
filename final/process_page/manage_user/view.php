<?php

// read data
try {
    $stmt = $conn->prepare("SELECT * FROM user_login WHERE user_id=:id");
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
    <h3 class="card-title"><?=$data['user_name']?></h3>
    <table class="table table-bordered">
        <tbody>
        <tr>
            <td width="250">ลำดับ</td>
            <td><?=$data['user_id'] ?></td>
        </tr>
        <tr>
            <td width="250">ชื่อผู้ใช้งาน</td>
            <td><?=$data['user_name'] ?></td>
        </tr>
        <tr>
            <td width="250">รหัสผ่าน</td>
            <td><?=$data['user_pass'] ?></td>
        </tr>
        <tr>
            <td width="250">อีเมล์</td>
            <td><?=$data['user_email'] ?></td>
        </tr>
        <tr>
            <td width="250">เบอร์โทรศัพท์</td>
            <td><?=$data['user_phone'] ?></td>
        </tr>
        <tr>
            <td width="250">สถานะ</td>
            <td><?=$data['user_status'] ?></td>
        </tr>
        <tr>
            <td width="250">เพศ</td>
            <td><?=$data['user_gender'] ?></td>
        </tr>
        </tbody>
    </table>
    <br>

    <a href="<?= url('manage_user.php');?>" class="btn btn-success">ย้อนกลับ</a>
</div>

