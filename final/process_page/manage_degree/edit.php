<?php

// read data
try {
    $stmt = $conn->prepare("SELECT * FROM degree WHERE id_degree=:id");
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
    <form action="<?= url('manage_degree.php?action=update&id='.$data['id_degree']);?>" method="post">
        <table class="table table-bordered">
            <tbody>
            <tr>
                <td width="250">id</td>
                <td>
                    <input type="text" name="water_id" value="<?=$data['id_degree'] ?>" style="width: 100%" readonly>
                </td>
            </tr>
            <tr>
                <td width="250">ชื่อชนิด</td>
                <td>
                    <input type="text" name="name_degree" value="<?=$data['name_degree'] ?>" style="width: 100%">

                </td>
            </tr>
            </tbody>
        </table>
        <p class="bs-component"><button type="submit" name="submit" class="btn btn-default btn-lg btn-block" href="#">บันทึก</button></p>
    </form>
    <br>

    <a href="<?= url('manage_degree.php');?>" class="btn btn-success">ย้อนกลับ</a>
</div>

