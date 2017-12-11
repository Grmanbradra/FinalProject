<?php
// read data
try {
    $sql = "SELECT f.id_file, f.name_file, f.author_file, f.year_file, main.name_main, sub.name_sub, deg.name_degree
            FROM file_data AS f 
            LEFT JOIN ref_file ref ON f.id_file=ref.id_file
            LEFT JOIN degree deg ON ref.id_degree=deg.id_degree
            LEFT JOIN ref_category rec ON ref.id_ref_cate=rec.id_ref_cate
            LEFT JOIN main_category main ON main.digit_main=rec.digit_main
            LEFT JOIN sub_category sub ON sub.digit_sub=rec.digit_sub
            WHERE ref.id_user = :user_id";

    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':user_id', $_SESSION['user']['id']);
    $stmt->execute();

    $data = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    $data = [];
}
$conn = null;

?>
<div class="card">
    <h3 class="card-title">คลังข้อมูล</h3>
    <div class="table-responsive">
        <table class="table table-hover table-bordered" id="sampleTable">
            <thead>
            <tr>
                <th>ชื่อไฟล์</th>
                <th>ชื่อผู้แต่ง</th>
                <th>ปีที่พิมพ์</th>
                <th>หมวดหลัก</th>
                <th>หมวดรอง</th>
                <th>ระดับ</th>
                <th>action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($data as $val) {
                ?>
                <tr>
                    <td><?=$val['name_file'] ?></td>
                    <td><?=$val['author_file'] ?></td>
                    <td><?=$val['year_file'] ?></td>
                    <td><?=$val['name_main'] ?></td>
                    <td><?=$val['name_sub'] ?></td>
                    <td><?=$val['name_degree'] ?></td>
                    <td>
                        <a class="btn btn-info"
                           href="<?= url('folders.php?action=view&id=' . $val['id_file']) ?>"><i
                                class="fa fa-eye" aria-hidden="true"></i></a>
                        <a class="btn btn-warning"
                           href="<?= url('folders.php?action=edit&id=' . $val['id_file']) ?>"><i
                                class="fa fa-edit" aria-hidden="true"></i></a>
                        <a class="btn btn-danger" onclick="confirmDelete(this, event)"
                           href="<?= url('folders.php?action=delete&id=' . $val['id_file']) ?>"><i
                                class="fa fa-remove" aria-hidden="true"></i></a>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div> <!-- end card -->
