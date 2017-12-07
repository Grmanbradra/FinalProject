<?php

// read data
try {
    $stmt = $conn->prepare("SELECT * FROM key_degree
                  JOIN degree ON degree.id_degree=key_degree.id_degree WHERE id_key_degree=:id");
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    $data = $stmt->fetch();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    $data = null;
}

?>
<div class="card">
    <h3 class="card-title"><?=$data['keyword_degree']?></h3>
    <form action="<?= url('manage_key_degree.php?action=update&id='.$data['id_key_degree']);?>" method="post">
        <table class="table table-bordered">
            <tbody>
            <tr>
                <td width="250">คีย์คำศัพท์</td>
                <td>
                    <input type="text" name="keyword_degree" value="<?=$data['keyword_degree'] ?>" style="width: 100%">

                </td>
            </tr>
            <tr>
                <td width="250">ระดับความเชี่ยวชาญ</td>
                <td>
                    <select name="id_degree" id="id_degree">
                        <option value="">-- กรุณาใส่ข้อมูล --</option>
                        <?php
                        $sql = "select * from degree";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $main = $stmt->fetchAll();
                        foreach($main as $value) {
                            echo '<option value="'.$value['id_degree'].'"  '.($value["id_degree"] == $data["id_degree"] ? 'selected' : '').'>'
                                .$value['id_degree'] .' - '.$value['name_degree'] .'</option>';
                        }
                        ?>
                    </select>
                </td>
            </tr>
            </tbody>
        </table>
        <p class="bs-component"><button type="submit" name="submit" class="btn btn-default btn-lg btn-block" href="#">บันทึก</button></p>
    </form>
    <br>

    <a href="<?= url('manage_key_degree.php');?>" class="btn btn-success">ย้อนกลับ</a>
</div>

<?php $conn = null; ?>