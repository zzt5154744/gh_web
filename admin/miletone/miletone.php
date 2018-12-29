
    <?php
    include_once "../../start.php";
    Helper::checkLogin();
        include_once ROOT_PATH."model/Milestone.class.php";
        $miestone = new Milestone();

        $com_result = $miestone->selectMany();

        include_once ROOT_PATH."view/admin/miletone/miletone.html";