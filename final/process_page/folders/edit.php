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
    <form action="<?= url('folders.php?action=update&id='.$data['water_id']);?>" method="post">
        <table class="table table-bordered">
            <tbody>
            <tr>
                <td width="250">id</td>
                <td>
                    <input type="text" name="water_id" value="<?=$data['water_id'] ?>" style="width: 100%">
                </td>
            </tr>
            <tr>
                <td width="250">ชื่อชนิด</td>
                <td>
                    <input type="text" name="water_name" value="<?=$data['water_name'] ?>" style="width: 100%">

                </td>
            </tr>
            <tr>
                <td width="250">ระดับค่ามาตารฐาน pH</td>
                <td>
                    <input type="text" name="water_rang" value="<?=$data['water_range'] ?>" style="width: 100%">
                </td>
            </tr>
            </tbody>
        </table>
        <p class="bs-component"><button type="submit" name="submit" class="btn btn-default btn-lg btn-block" href="#">บันทึก</button></p>
    </form>
    <br>

    <a href="<?= url('folders.php');?>" class="btn btn-success">ย้อนกลับ</a>
</div>

