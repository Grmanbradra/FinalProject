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
    <form action="<?= url('manage_user.php?action=update&id='.$data['user_id']);?>" method="post">
        <table class="table table-bordered">
            <tbody>
            <tr>
                <td width="250">ลำดับ</td>
                <td>
                    <input type="text" name="water_id" value="<?=$data['user_id'] ?>" style="width: 100%" readonly>
                </td>
            </tr>
            <tr>
                <td width="250">ชื่อผู้ใช้งาน</td>
                <td>
                    <input type="text" name="user_name" value="<?=$data['user_name'] ?>" style="width: 100%">

                </td>
            </tr>
            <tr>
                <td width="250">รหัสผ่าน</td>
                <td>
                    <input type="text" name="user_pass" value="<?=$data['user_pass'] ?>" style="width: 100%">
                </td>
            </tr>
            <tr>
                <td width="250">อีเมล์</td>
                <td>
                    <input type="text" name="user_email" value="<?=$data['user_email'] ?>" style="width: 100%">
                </td>
            </tr>
            <tr>
                <td width="250">เบอร์โทรผ่าน</td>
                <td>
                    <input type="text" name="user_phone" value="<?=$data['user_phone'] ?>" style="width: 100%">
                </td>
            </tr>
            <tr>
                <td width="250">สถานะ</td>
                <td>
                    <input type="text" name="user_status" value="<?=$data['user_status'] ?>" style="width: 100%">
                </td>
            </tr>
            <tr>
                <td width="250">เพศ</td>
                <td>
                    <input type="text" name="user_gender" value="<?=$data['user_gender'] ?>" style="width: 100%">
                </td>
            </tr>
            </tbody>
        </table>
        <p class="bs-component"><button type="submit" name="submit" class="btn btn-default btn-lg btn-block" href="#">บันทึก</button></p>
    </form>
    <br>

    <a href="<?= url('manage_user.php');?>" class="btn btn-success">ย้อนกลับ</a>
</div>

