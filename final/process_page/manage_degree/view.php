<?php

// read data
try {
    $stmt = $conn->prepare("SELECT * FROM degree WHERE 	id_degree=:id");
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
    <h3 class="card-title"><?=$data['name_degree']?></h3>
    <table class="table table-bordered">
        <tbody>
        <tr>
            <td width="250">id</td>
            <td><?=$data['id_degree'] ?></td>
        </tr>
        <tr>
            <td width="250">ชื่อระดับ</td>
            <td><?=$data['name_degree'] ?></td>
        </tr>
        </tbody>
    </table>
    <br>

    <a href="<?= url('manage_degree.php');?>" class="btn btn-success">ย้อนกลับ</a>
</div>

