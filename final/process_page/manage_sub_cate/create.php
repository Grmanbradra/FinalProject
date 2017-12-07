<div class="card">
    <h3 class="card-title">เพิ่มข้อมูลชนิดของน้ำ</h3>
    <form action="<?= url('manage_sub_cate.php?action=insert');?>" method="post">
        <table class="table table-bordered">
            <tbody>
            <tr>
                <td width="250">id</td>
                <td>
                    <input type="text" name="water_id" style="width: 100%">
                </td>
            </tr>
            <tr>
                <td width="250">ชื่อชนิด</td>
                <td>
                    <input type="text" name="water_name" style="width: 100%">

                </td>
            </tr>
            <tr>
                <td width="250">ระดับค่ามาตารฐาน pH</td>
                <td>
                    <input type="text" name="water_rang" style="width: 100%">
                </td>
            </tr>
            </tbody>
        </table>
        <p class="bs-component"><button type="submit" name="submit" class="btn btn-default btn-lg btn-block" href="#">บันทึก</button></p>
    </form>
    <br>

    <a href="<?= url('manage_sub_cate.php');?>" class="btn btn-success">ย้อนกลับ</a>
</div>

