<div class="card">
    <h3 class="card-title">เพิ่มข้อมูลชนิดของน้ำ</h3>
    <form action="<?= url('manage_main_cate.php?action=insert');?>" method="post">
        <table class="table table-bordered">
            <tbody>
            <tr>
                <td width="250">ชื่อหมวดหลัก</td>
                <td>
                    <input type="text" name="name_main" style="width: 100%">

                </td>
            </tr>
            </tbody>
        </table>
        <p class="bs-component"><button type="submit" name="submit" class="btn btn-default btn-lg btn-block" href="#">บันทึก</button></p>
    </form>
    <br>

    <a href="<?= url('manage_main_cate.php');?>" class="btn btn-success">ย้อนกลับ</a>
</div>

