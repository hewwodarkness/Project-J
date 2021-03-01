


<?php 
require 'libs/rb.php';





R::setup( 'mysql:host=127.0.0.1;dbname=project-j','root', '' ); 

if ( !R::testconnection() )
{
		exit ('Нет соединения с базой данных');
}

session_start();






// R::setup( 'mysql:host=sql2.7m.pl; dbname=reznikchmo_players','reznikchmo_players', 'ilovepony1' ); 

// if ( !R::testconnection() )
// {
//  		exit ('Нет соединения с базой данных');
// }

// session_start();
