<?php

// read data
try {
    $sql = "SELECT f.id_file, f.name_file, f.author_file, f.year_file, main.name_main, sub.name_sub, deg.name_degree, ref.id_ref_cate, ref.id_degree
            FROM file_data AS f 
            JOIN ref_file ref ON f.id_file=ref.id_file
            JOIN degree deg ON ref.id_degree=deg.id_degree
            JOIN ref_category rec ON ref.id_ref_cate=rec.id_ref_cate
            JOIN main_category main ON main.digit_main=rec.digit_main
            JOIN sub_category sub ON sub.digit_sub=rec.digit_sub
            WHERE ref.id_user = :user_id AND f.id_file = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->bindValue(':user_id', $_SESSION['user']['id']);
    $stmt->execute();

    $data = $stmt->fetch();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    $data = null;
}

?>
<div class="card">
    <h3 class="card-title"><?=$data['name_file']?> (<?=$data['author_file']?>) </h3>
    <form action="<?= url('folders.php?action=update&id='.$data['id_file']);?>" method="post">
        <table class="table table-bordered">
            <tbody>
            <tr>
                <td width="250">ชื่อไฟล์</td>
                <td>
                    <input type="text" name="name_file" value="<?=$data['name_file'] ?>" style="width: 100%">
                </td>
            </tr>
            <tr>
                <td width="250">ชื่อผู้แต่ง</td>
                <td>
                    <input type="text" name="author_file" value="<?=$data['author_file'] ?>" style="width: 100%">
                </td>
            </tr>
            <tr>
                <td width="250">ปีที่พิมพ์</td>
                <td>
                    <input type="text" name="year_file" value="<?=$data['year_file'] ?>" style="width: 100%">
                </td>
            </tr>
            <tr>
                <td width="250">หมวดหมู่</td>
                <td>
                    <select name="id_ref_cate" id="id_ref_cate">
                        <option value="">-- กรุณาใส่ข้อมูล --</option>
                        <?php
                        $sql = "select * 
                                from ref_category rc 
                                JOIN main_category mc ON rc.digit_main = mc.digit_main
                                JOIN sub_category sc ON rc.digit_sub = sc.digit_sub
                                ORDER BY mc.digit_main";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $main = $stmt->fetchAll();
                        foreach($main as $value) {
                            echo '<option value="'.$value['id_ref_cate'].'"  '.($value["id_ref_cate"] == $data["id_ref_cate"] ? 'selected' : '').'>'
                                .$value['digit_main'] .' - '.$value['name_main'] .'( '. $value['digit_sub'] .' - '.$value['name_sub'] .')'.'</option>';
                        }
                        ?>
                    </select>
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

    <a href="<?= url('folders.php');?>" class="btn btn-success">ย้อนกลับ</a>
</div>

<?php $conn = null; ?>