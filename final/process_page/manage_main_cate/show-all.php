<?php
// read data
try {
    $sql = "SELECT * FROM main_category";

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
    <h3 class="card-title">คลังข้อมูล</h3>
    <div class="table-responsive">
        <table class="table table-hover table-bordered" id="sampleTable">
            <thead>
            <tr>
                <th>#</th>
                <th>ชื่อหมวดหลัก</th>
                <th>action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($data as $val) {
                ?>
                <tr>
                    <td><?=$val['digit_main'] ?></td>
                    <td><?=$val['name_main'] ?></td>
                    <td>
                        <a class="btn btn-info"
                           href="<?= url('manage_main_cate.php?action=view&id=' . $val['digit_main']) ?>"><i
                                class="fa fa-eye" aria-hidden="true"></i></a>
                        <a class="btn btn-warning"
                           href="<?= url('manage_main_cate.php?action=edit&id=' . $val['digit_main']) ?>"><i
                                class="fa fa-edit" aria-hidden="true"></i></a>
                        <a class="btn btn-danger" onclick="confirmDelete(this, event)"
                           href="<?= url('manage_main_cate.php?action=delete&id=' . $val['digit_main']) ?>"><i
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
