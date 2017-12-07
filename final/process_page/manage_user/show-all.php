<?php
// read data
try {
    $stmt = $conn->prepare("SELECT * FROM categories_water");
    $stmt->execute();

    $data = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    $data = [];
}
$conn = null;
?>
<div class="card">
    <h3 class="card-title">View All</h3>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>ชื่อชนิด</th>
                <th>ระดับค่ามาตารฐาน pH</th>
                <th>action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($data as $val) {
                ?>
                <tr>
                    <td><?= $val['water_id'] ?></td>
                    <td><?= $val['water_name'] ?></td>
                    <td><?= $val['water_range'] ?></td>
                    <td>
                        <a class="btn btn-info"
                           href="<?= url('manage_user.php?action=view&id=' . $val['water_id']) ?>"><i
                                class="fa fa-eye" aria-hidden="true"></i></a>
                        <a class="btn btn-warning"
                           href="<?= url('manage_user.php?action=edit&id=' . $val['water_id']) ?>"><i
                                class="fa fa-edit" aria-hidden="true"></i></a>
                        <a class="btn btn-danger" onclick="confirmDelete(this, event)"
                           href="<?= url('manage_user.php?action=delete&id=' . $val['water_id']) ?>"><i
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
