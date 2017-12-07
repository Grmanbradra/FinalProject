<?php
// read data
try {
    $sql = "SELECT rc.id_ref_cate, mc.name_main, sc.name_sub, category.keyword
            FROM ref_category AS rc
            JOIN main_category mc ON rc.digit_main = mc.digit_main
            JOIN sub_category sc ON rc.digit_sub = sc.digit_sub
            JOIN key_category category ON rc.id_key = category.id_key
";

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $data = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    $data = [];
}
$conn = null;

?>
<div class="card">
    <h3 class="card-title">ความสัมพันธ์ของข้อมูล</h3>
    <div class="table-responsive">
        <table class="table table-hover table-bordered" id="sampleTable">
            <thead>
            <tr>
                <th>ID</th>
                <th>คีย์คำศัพท์</th>
                <th>หมวดหมู่หลัก</th>
                <th>หมวดหมู่ย่อย</th>
                <th>action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($data as $val) {
                ?>
                <tr>
                    <td><?=$val['id_ref_cate'] ?></td>
                    <td><?=$val['keyword'] ?></td>
                    <td><?=$val['name_main'] ?></td>
                    <td><?=$val['name_sub'] ?></td>
                    <td>
                        <a class="btn btn-info"
                           href="<?= url('manage_ref_cate.php?action=view&id=' . $val['id_ref_cate']) ?>"><i
                                class="fa fa-eye" aria-hidden="true"></i></a>
                        <a class="btn btn-warning"
                           href="<?= url('manage_ref_cate.php?action=edit&id=' . $val['id_ref_cate']) ?>"><i
                                class="fa fa-edit" aria-hidden="true"></i></a>
                        <a class="btn btn-danger" onclick="confirmDelete(this, event)"
                           href="<?= url('manage_ref_cate.php?action=delete&id=' . $val['id_ref_cate']) ?>"><i
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
