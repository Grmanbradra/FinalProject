<?php

try {

    $stmt = $conn->prepare("SELECT * FROM file_data ORDER BY id_file DESC");
    $stmt->execute();
    $data = $stmt->fetch();

    // go to process
//    $api = new WebAPI($conn, "Image Processing in C.pdf basic Foundations medium");
    $api = new WebAPI($conn, $data['name_file']);

//    echo "<pre>";
//    var_dump($data);
//    var_dump($api->process());
    $webApi = ($api->process());

    $stmt = $conn->prepare("SELECT * FROM degree WHERE id_degree=:id");
    $stmt->bindValue(":id", $webApi['id_degree']);
    $stmt->execute();
    $degree = $stmt->fetch();

    $stmt = $conn->prepare("SELECT *
                            FROM ref_category
                            JOIN main_category mc ON ref_category.digit_main = mc.digit_main
                            JOIN sub_category sc ON ref_category.digit_sub = sc.digit_sub
                            WHERE id_ref_cate=:id
                            ORDER BY mc.digit_main");
    $stmt->bindValue(":id", $webApi['id_ref_cate']);
    $stmt->execute();
    $category_sub = $stmt->fetch();

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    $data = null;
}
$conn = null;
?>
<div class="card">
    <h3 class="card-title">ยืนยันการจัดหมวดหมู่</h3>
    <form action="<?= url('add_file.php?action=update&id='.$data['id_file']);?>" method="post">
        <table class="table table-bordered">
            <tbody>
            <tr>
                <td width="250">หมวดหมู่</td>
                <td>
                    <input type="text" disabled name="sub_id"
                           value="<?=$category_sub['digit_main'].'-'.$category_sub['name_main'].'  ('.$category_sub['digit_sub'].'-'.$category_sub['name_sub'].')' ?>" style="width: 100%">
                </td>
            </tr>
            <tr>
                <td width="250">ระดับความเชี่ยวชาญ</td>
                <td>
                    <input type="text" disabled name="water_name" value="<?=$degree['name_degree'] ?>" style="width: 100%">

                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;"> ------- ต้องการแก้ไข -------- </td>
            </tr>
            <tr>
                <td width="250">หมวดหมู่</td>
                <td>
                    <input type="text" name="water_rang" style="width: 100%">
                </td>
            </tr>
            <tr>
                <td width="250">ระดับความเชี่ยวชาญ</td>
                <td>
                    <input type="text" name="water_rang" style="width: 100%">
                </td>
            </tr>
            </tbody>
        </table>
        <p class="bs-component"><button type="submit" name="submit" class="btn btn-default btn-lg btn-block" href="#">บันทึก</button></p>
    </form>
    <br>

    <a href="<?= url('add_file.php');?>" class="btn btn-success">ย้อนกลับ</a>
</div>

