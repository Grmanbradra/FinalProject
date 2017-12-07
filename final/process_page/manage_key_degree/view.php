<?php

// read data
try {
    $stmt = $conn->prepare("SELECT * FROM key_degree
                    JOIN degree d ON key_degree.id_degree = d.id_degree
                    WHERE id_key_degree=:id");
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
    <h3 class="card-title"><?=$data['keyword_degree']?></h3>
    <table class="table table-bordered">
        <tbody>
        <tr>
            <td width="250">ID - คำที่บอกระดับ</td>
            <td><?=$data['id_key_degree'] ?></td>
        </tr>
        <tr>
            <td width="250">คำที่บอกระดับ</td>
            <td><?=$data['keyword_degree'] ?></td>
        </tr>
        <tr>
            <td width="250">ID - ระดับความเชี่ยวชาญ</td>
            <td><?=$data['id_degree'] ?></td>
        </tr>
        <tr>
            <td width="250">ระดับความเชี่ยวชาญ</td>
            <td><?=$data['name_degree'] ?></td>
        </tr>
        </tbody>
    </table>
    <br>

    <a href="<?= url('manage_key_degree.php');?>" class="btn btn-success">ย้อนกลับ</a>
</div>

