<div class="card">
    <h3 class="card-title">เพิ่มคำศัพท์</h3>
    <form action="<?= url('manage_keyword.php?action=insert');?>" method="post">
        <table class="table table-bordered">
            <tbody>
            <tr>
                <td width="250">คำศัพท์</td>
                <td>
                    <input type="text" name="keyword" style="width: 100%">

                </td>
            </tr>
            </tbody>
        </table>
        <p class="bs-component"><button type="submit" name="submit" class="btn btn-default btn-lg btn-block" href="#">บันทึก</button></p>
    </form>
    <br>

    <a href="<?= url('manage_keyword.php');?>" class="btn btn-success">ย้อนกลับ</a>
</div>

