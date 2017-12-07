<?php

// success
if(isset($_SESSION['notification']['success'])) {
    ?>
    <script>
        swal(
            'Success!',
            '<?=$_SESSION['notification']['success']?>',
            'success'
        )
    </script>
    <?php
    unset($_SESSION['notification']['success']);
}

// error
if(isset($_SESSION['notification']['error'])) {
    ?>
    <script>
        swal(
            'Error!',
            '<?=$_SESSION['notification']['error']?>',
            'error'
        )
    </script>
    <?php
    unset($_SESSION['notification']['error']);
}

// warning
if(isset($_SESSION['notification']['warning'])) {
    ?>
    <script>
        swal(
            'Warning!',
            '<?=$_SESSION['notification']['warning']?>',
            'warning'
        )
    </script>
    <?php
    unset($_SESSION['notification']['warning']);
}

// info
if(isset($_SESSION['notification']['info'])) {
    ?>
    <script>
        swal(
            'Info!',
            '<?=$_SESSION['notification']['info']?>',
            'info'
        )
    </script>
    <?php
    unset($_SESSION['notification']['info']);
}