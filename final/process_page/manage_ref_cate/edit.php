<?php

// read data
try {
    $stmt = $conn->prepare("SELECT * FROM ref_category WHERE id_ref_cate=:id");
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    $data = $stmt->fetch();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    $data = null;
}

?>
<div class="card">
    <h3 class="card-title">แก้ไขความสัมพันธ์ของข้อมูล ID : <?=$data['id_ref_cate']?></h3>
    <form action="<?= url('manage_ref_cate.php?action=update&id='.$data['id_ref_cate']);?>" method="post">
        <table class="table table-bordered">
            <tbody>
            <tr>
                <td width="250">หมวดหมู่หลัก</td>
                <td>
                    <select name="main_category" id="main_category">
                        <option value="">-- กรุณาใส่ข้อมูล --</option>
                        <?php
                        $sql = "select * from main_category";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $main = $stmt->fetchAll();
                        foreach($main as $value) {
                            echo '<option value="'.$value['digit_main'].'"  '.($value["digit_main"] == $data["digit_main"] ? 'selected' : '').'>'
                                .$value['digit_main'] .' - '.$value['name_main'] .'</option>';
                        }
                        ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td width="250">หมวดหมู่ย่อย</td>
                <td>
                    <select name="sub_category" id="sub_category">
                        <option value="">-- กรุณาใส่ข้อมูล --</option>
                        <?php
                        $sql = "select * from sub_category";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $main = $stmt->fetchAll();
                        foreach($main as $value) {
                            echo '<option value="'.$value['digit_sub'].'"  '.($value["digit_sub"] == $data["digit_sub"] ? 'selected' : '').'>'
                                .$value['digit_sub'] .' - '.$value['name_sub'] .'</option>';
                        }
                        ?>
                    </select>
                </td>
            </tr>


            <tr>
                <td width="250">คีย์คำศัพท์</td>
                <td>
                    <select name="key_category" id="key_category">
                        <option value="">-- กรุณาใส่ข้อมูล --</option>
                        <?php
                        $sql = "select * from key_category";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $main = $stmt->fetchAll();
                        foreach($main as $value) {
                            echo '<option value="'.$value['id_key'].'"  '.($value["id_key"] == $data["id_key"] ? 'selected' : '').'>'
                                .$value['id_key'] .' - '.$value['keyword'] .'</option>';
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

    <a href="<?= url('manage_ref_cate.php');?>" class="btn btn-success">ย้อนกลับ</a>
</div>

<?php $conn = null; ?>