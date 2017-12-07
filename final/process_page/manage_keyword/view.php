<?php

// read data
try {
    $stmt = $conn->prepare("SELECT * FROM key_category WHERE id_key=:id");
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
    <h3 class="card-title"><?=$data['keyword']?></h3>
    <table class="table table-bordered">
        <tbody>
        <tr>
            <td width="250">ลำดับ</td>
            <td><?=$data['id_key'] ?></td>
        </tr>
        <tr>
            <td width="250">คำศัพท์</td>
            <td><?=$data['keyword'] ?></td>
        </tr>
        </tbody>
    </table>
    <br>

    <a href="<?= url('manage_keyword.php');?>" class="btn btn-success">ย้อนกลับ</a>
</div>

