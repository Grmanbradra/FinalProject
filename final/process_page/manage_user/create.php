<div class="card">
    <h3 class="card-title">เพิ่มผู้ใช้งาน</h3>
    <form action="<?= url('manage_user.php?action=insert');?>" method="post">
        <table class="table table-bordered">
            <tbody>
            <tr>
                <td width="250">ชื่อผู้ใช้งาน</td>
                <td>
                    <input type="text" name="user_name" style="width: 100%">
                </td>
            </tr>
            <tr>
                <td width="250">รหัสผ่าน</td>
                <td>
                    <input type="password" name="user_pass" style="width: 100%">

                </td>
            </tr>
            <tr>
                <td width="250">อีเมล์</td>
                <td>
                    <input type="text" name="user_email" style="width: 100%">
                </td>
            </tr>
            <tr>
                <td width="250">เบอร์โทรศัพท์</td>
                <td>
                    <input type="text" name="user_phone" style="width: 100%">
                </td>
            </tr>
            <tr>
                <td width="250">เพศ</td>
                <td>
                    <input type="text" name="user_gender" style="width: 100%">
                </td>
            </tr>
            </tbody>
        </table>
        <p class="bs-component"><button type="submit" name="submit" class="btn btn-default btn-lg btn-block" href="#">บันทึก</button></p>
    </form>
    <br>

    <a href="<?= url('manage_user.php');?>" class="btn btn-success">ย้อนกลับ</a>
</div>

