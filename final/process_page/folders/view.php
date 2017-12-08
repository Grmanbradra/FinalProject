<?php

// read data
try {
    $sql = "SELECT f.name_file, f.author_file, f.year_file, main.name_main, sub.name_sub, deg.name_degree
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
$conn = null;
?>
<div class="card">
    <h3 class="card-title"><?=$data['name_file']?> (<?=$data['author_file']?>) </h3>
    <table class="table table-bordered">
        <tbody>
        <tr>
            <td width="250">ชื่อไฟล์</td>
            <td><?=$data['name_file'] ?></td>
        </tr>
        <tr>
            <td width="250">ชื่อผู้แต่ง</td>
            <td><?=$data['author_file'] ?></td>
        </tr>
        <tr>
            <td width="250">ปีที่พิมพ์</td>
            <td><?=$data['year_file'] ?></td>
        </tr>
        <tr>
            <td width="250">หมวดหลัก</td>
            <td><?=$data['name_main'] ?></td>
        </tr>
        <tr>
            <td width="250">หมวดรอง</td>
            <td><?=$data['name_sub'] ?></td>
        </tr>
        <tr>
            <td width="250">ระดับความเชี่ยวชาญ</td>
            <td><?=$data['name_degree'] ?></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">
                <h3>Preview PDF</h3>

                <p> ... . . . file  ..... . . </p>
            </td>
        </tr>
        </tbody>
    </table>
    <br>

    <a href="<?= url('folders.php');?>" class="btn btn-success">ย้อนกลับ</a>
</div>

