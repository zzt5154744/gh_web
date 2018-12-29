
    <?php
    include_once "../../start.php";
    Helper::checkLogin();
        include_once ROOT_PATH."model/Company.class.php";
        $company = new Company();

        $com_result = $company->selectMany();

        
        include_once ROOT_PATH."view/admin/about/about.html";