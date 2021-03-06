<?php


    use Framework\Application\Container;
    use Framework\Syscrack\Game\Computer;
    use Framework\Syscrack\Game\Log;
    use Framework\Syscrack\Game\Utilities\PageHelper;

    $computer = new Computer();

    $pagehelper = new PageHelper();

    $log = new Log();

    $session = Container::getObject('session');

    if( $session->isLoggedIn() )
    {

        $session->updateLastAction();
    }

    $currentcomputer = $computer->getComputer( $computer->getCurrentUserComputer() );
?>

<!DOCTYPE html>
<html>

    <?php

        Flight::render('syscrack/templates/template.header', array('pagetitle' => 'Syscrack | Game') );
    ?>
    <body>
        <div class="container">

            <?php

                Flight::render('syscrack/templates/template.navigation');
            ?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" style="cursor: hand" onclick="window.location.href = '/game/computer/'">
                        <span class="badge"><?=$currentcomputer->type?></span> <?=$currentcomputer->ipaddress?>
                    </h1>
                </div>

                <?php

                    Flight::render('syscrack/templates/template.computer.actions', array( 'computer' => $computer ) );
                ?>

                <div class="col-lg-8">
                    
                    <?php
                    
                        Flight::render('syscrack/templates/template.log', array( 'ipaddress' => $currentcomputer->ipaddress, 'log' => $log, 'hideoptions' => true ))
                    ?>

                    <div class="btn-group-vertical" style="width: 100%;">
                        <button class="btn btn-danger" type="button" onclick="window.location.href = '/computer/actions/clear'">
                            <span class="glyphicon glyphicon-alert" aria-hidden="true"></span> Clear Log
                        </button>
                        <button class="btn btn-success" type="button" onclick="window.location.href = '/computer/log'">
                            <span class="glyphicon glyphicon-circle-arrow-down" aria-hidden="true"></span> Refresh Log
                        </button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <?php

                        Flight::render('syscrack/templates/template.footer', array('breadcrumb' => true ) );
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>