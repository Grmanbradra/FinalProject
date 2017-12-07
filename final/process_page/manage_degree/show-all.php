<?php
// read data
try {
    $sql = "select * from degree";

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
    <h3 class="card-title">ระดับความเชี่ยวชาญ</h3>
    <div class="table-responsive">
        <table class="table table-hover table-bordered" id="sampleTable">
            <thead>
            <tr>
                <th>ลำดับ</th>
                <th>ชื่อระดับความเชี่ยวชาญ</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($data as $val) {
                ?>
                <tr>
                    <td><?=$val['id_degree'] ?></td>
                    <td><?=$val['name_degree'] ?></td>
                    <td>
                        <a class="btn btn-info"
                           href="<?= url('manage_degree.php?action=view&id=' . $val['id_degree']) ?>"><i
                                class="fa fa-eye" aria-hidden="true"></i></a>
                        <a class="btn btn-warning"
                           href="<?= url('manage_degree.php?action=edit&id=' . $val['id_degree']) ?>"><i
                                class="fa fa-edit" aria-hidden="true"></i></a>
                        <a class="btn btn-danger" onclick="confirmDelete(this, event)"
                           href="<?= url('manage_degree.php?action=delete&id=' . $val['id_degree']) ?>"><i
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
