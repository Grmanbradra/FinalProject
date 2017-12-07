<div class="card">
    <h3 class="card-title">เพิ่มข้อมูลชนิดของน้ำ</h3>
    <form action="<?= url('manage_sub_cate.php?action=insert');?>" method="post">
        <table class="table table-bordered">
            <tbody>
            <tr>
                <td width="250">ชื่อหมวดหมู่ย่อย</td>
                <td>
                    <input type="text" name="name_sub" style="width: 100%">

                </td>
            </tr>
            <tr>
                <td width="250">หมวดหมู่หลัก</td>
                <td>
                    <select name="digit_main" id="digit_main">
                        <option value="">-- กรุณาใส่ข้อมูล --</option>
                        <?php
                        $sql = "select * from main_category";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $main = $stmt->fetchAll();
                        foreach($main as $value) {
                            echo '<option value="'.$value['digit_main'].'">'
                                .$value['digit_main'] .' - '.$value['name_main'] .'</option>';
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

    <a href="<?= url('manage_sub_cate.php');?>" class="btn btn-success">ย้อนกลับ</a>
</div>

