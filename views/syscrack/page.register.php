<?php

$session = \Framework\Application\Container::getObject('session');

if( $session->isLoggedIn() )
{

    $session->updateLastAction();

    Flight::redirect('/game/');

    exit;
}
?>
<html>

    <?php

        Flight::render('syscrack/templates/template.header', array('pagetitle' => 'Syscrack | Register') );
    ?>
    <body>
        <div class="container">

            <?php

                if( isset( $_GET['error'] ) )
                    Flight::render('syscrack/templates/template.alert', array( 'message' => $_GET['error'] ) );
                elseif( isset( $_GET['success'] ) )
                    Flight::render('syscrack/templates/template.alert', array( 'message' => 'Success', 'alert_type' => 'alert-success' ) );
            ?>
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header">
                        <h1>Register</h1>
                    </div>
                    <form method="post">

                        <?php

                            Flight::render('developer/templates/template.form', array('form_elements' => [
                                [
                                    'type'          => 'text',
                                    'name'          => 'username',
                                    'placeholder'   => 'Username'
                                ],
                                [
                                    'type'          => 'password',
                                    'name'          => 'password',
                                    'placeholder'   => 'Password'
                                ],
                                [
                                    'type'          => 'email',
                                    'name'          => 'email',
                                    'placeholder'   => 'Email'
                                ]
                            ]));
                        ?>
                    </form>
                </div>
            </div>

            <?php

                Flight::render('syscrack/templates/template.footer');
            ?>
        </div>
    </body>
</html>
