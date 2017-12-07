<?php
// read data
try {
    $sql = "SELECT *
            FROM key_degree
            JOIN degree ON degree.id_degree=key_degree.id_degree";

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
    <h3 class="card-title">ข้อมูลคีย์ระดับ</h3>
    <div class="table-responsive">
        <table class="table table-hover table-bordered" id="sampleTable">
            <thead>
            <tr>
                <th>#</th>
                <th>คีย์คำศัพท์</th>
                <th>ระดับความเชี่ยวชาญ</th>
                <th>action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($data as $val) {
                ?>
                <tr>
                    <td><?=$val['id_key_degree'] ?></td>
                    <td><?=$val['keyword_degree'] ?></td>
                    <td><?=$val['name_degree'] ?></td>
                    <td>
                        <a class="btn btn-info"
                           href="<?= url('manage_key_degree.php?action=view&id=' . $val['id_key_degree']) ?>"><i
                                class="fa fa-eye" aria-hidden="true"></i></a>
                        <a class="btn btn-warning"
                           href="<?= url('manage_key_degree.php?action=edit&id=' . $val['id_key_degree']) ?>"><i
                                class="fa fa-edit" aria-hidden="true"></i></a>
                        <a class="btn btn-danger" onclick="confirmDelete(this, event)"
                           href="<?= url('manage_key_degree.php?action=delete&id=' . $val['id_key_degree']) ?>"><i
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
