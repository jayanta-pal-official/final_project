<?php
include ("common.fn.admin.php");
if ($_REQUEST['act'] == 'edit') {
    editTemplate($conn);
} elseif ($_REQUEST['act'] == 'delete') {
    deleteTemplate($conn);
}
?>