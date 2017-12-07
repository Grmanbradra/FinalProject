<?php
// read data
try {
    $stmt = $conn->prepare("SELECT * FROM user_login");
    $stmt->execute();

    $data = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    $data = [];
}
$conn = null;
?>
<div class="card">
    <h3 class="card-title">ผู้ใช้งาน</h3>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>ลำดับ</th>
                <th>ชื่อผู้ใช้</th>
                <th>รหัสผ่าน</th>
                <th>อีเมล์</th>
                <th>เบอร์โทรศัพท์</th>
                <th>สถานะ</th>
                <th>เพศ</th>
                <th>action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $count_user = 1;
            foreach ($data as $val) {
                ?>
                <tr>
                    <td><?= $count_user++;?></td>
                    <td><?= $val['user_name'] ?></td>
                    <td><?= $val['user_pass'] ?></td>
                    <td><?= $val['user_email'] ?></td>
                    <td><?= $val['user_phone'] ?></td>
                    <td><?= $val['user_status'] ?></td>
                    <td><?= $val['user_gender']?></td>
                    <td>
                        <a class="btn btn-info"
                           href="<?= url('manage_user.php?action=view&id=' . $val['user_id']) ?>"><i
                                class="fa fa-eye" aria-hidden="true"></i></a>
                        <a class="btn btn-warning"
                           href="<?= url('manage_user.php?action=edit&id=' . $val['user_id']) ?>"><i
                                class="fa fa-edit" aria-hidden="true"></i></a>
                        <a class="btn btn-danger" onclick="confirmDelete(this, event)"
                           href="<?= url('manage_user.php?action=delete&id=' . $val['user_id']) ?>"><i
                                class="fa fa-remove" aria-hidden="true"></i></a>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div> <!-- end card -->
