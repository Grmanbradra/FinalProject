<?php
// read data
try {
    $stmt = $conn->prepare("SELECT * FROM key_category");
    $stmt->execute();

    $data = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    $data = [];
}
$conn = null;
?>
<div class="card">
    <h3 class="card-title">คำศัพท์</h3>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>ลำดับ</th>
                <th>คำศัพท์</th>
                <th>action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($data as $val) {
                ?>
                <tr>
                    <td><?= $val['id_key'] ?></td>
                    <td><?= $val['keyword'] ?></td>
                    <td>
                        <a class="btn btn-info"
                           href="<?= url('manage_keyword.php?action=view&id=' . $val['id_key']) ?>"><i
                                class="fa fa-eye" aria-hidden="true"></i></a>
                        <a class="btn btn-warning"
                           href="<?= url('manage_keyword.php?action=edit&id=' . $val['id_key']) ?>"><i
                                class="fa fa-edit" aria-hidden="true"></i></a>
                        <a class="btn btn-danger" onclick="confirmDelete(this, event)"
                           href="<?= url('manage_keyword.php?action=delete&id=' . $val['id_key']) ?>"><i
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
