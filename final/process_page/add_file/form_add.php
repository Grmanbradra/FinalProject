<div class="card">
    <h3 class="card-title">กรุณากรอกรายละเอียดของหนังสือ</h3>
    <form action="<?= url('add_file.php?action=insert');?>" method="post" enctype="multipart/form-data">
        <table class="table table-bordered">
            <tbody>
            <tr>
                <td width="250">ชื่อหนังสือ</td>
                <td>
                    <input type="text" name="book_name" style="width: 100%">
                </td>
            </tr>
            <tr>
                <td width="250">ชื่อผู้แต่ง</td>
                <td>
                    <input type="text" name="book_author" style="width: 100%">

                </td>
            </tr>
            <tr>
                <td width="250">ปีที่พิมพ์</td>
                <td>
                    <input type="text" name="book_year" style="width: 100%">
                </td>
            </tr>
            <tr>
                <td width="250">อัพโหลดไฟล์</td>
                <td>
                    <input type="file" name="book_file" style="width: 100%">
                </td>
            </tr>
            </tbody>
        </table>
        <p class="bs-component"><button type="submit" name="submit" class="btn btn-default btn-lg btn-block" href="#">บันทึก</button></p>
    </form>
    <br>

    <a href="<?= url('add_file.php');?>" class="btn btn-success">ย้อนกลับ</a>
</div>

