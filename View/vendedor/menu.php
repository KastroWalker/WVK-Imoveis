<?php
    function menu($titulo1, $link1, $titulo2, $link2){
        echo ("
            <nav class='navbar navbar-expand-lg navbar-light bg-light border-bottom'>
                <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
                    <span class='navbar-toggler-icon'></span>
                </button>

                <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                    <ul class='navbar-nav'>
                        <li class='nav-item'>
                                    <a class='nav-link' href='$link1'><strong>$titulo1</strong></a>
                            </li>
                            <li class='nav-item'>
                                    <a class='nav-link' href='$link2'><strong>$titulo2</strong></a>
                            </li> 
                    </ul>
                </div>
            </nav>
        ");
    }

    function slideBar($img, $icons, $home, $cliente, $aluguel, $imoveis, $usuario, $sair){
        echo ("
            <div class='bg-dark' id='sidebar-wrapper'>
            <div class='sidebar-heading' style='color: white;'><img src='$img' style='margin-right: 5px; margin-bottom: 5px; width: 20px; height: 20px;'></img>WVK Imóveis</div>
                <div class='list-group list-group-flush'>
                    <a href='$home' class='list-group-item list-group-item-action bg-dark' style='color: white;'>Home</a>
                    <a href='$cliente' class='list-group-item list-group-item-action bg-dark' style='color: white;'>
                    <img src='$icons[0]' style='margin-right: 5px; margin-bottom: 5px;'></img>
                    Clientes
                    </a>
                    <a href='$aluguel' class='list-group-item list-group-item-action bg-dark' style='color: white;'>
                    <img src='$icons[1]' style='margin-right: 5px; margin-bottom: 5px;'></img>
                    Aluguel
                    </a>
                    <a href='$imoveis' class='list-group-item list-group-item-action bg-dark' style='color: white;'>
                    <img src='$icons[2]' style='margin-right: 5px; margin-bottom: 5px;'></img>
                    Imoveis
                    </a>
                    <a href='$usuario' class='list-group-item list-group-item-action bg-dark' style='color: white;'>
                    <img src='$icons[3]' style='margin-right: 5px; margin-bottom: 5px;'></img>
                    Usuário
                    </a>
                    <a href='$sair' class='list-group-item list-group-item-action bg-dark' style='color: white;'>
                    <img src='$icons[4]' style='margin-right: 5px; margin-bottom: 5px;'></img>
                    Sair
                    </a>
                </div>
            </div>
        ");
    }

    function mostra_turno(){
        date_default_timezone_set('America/Fortaleza');
        $date = date('H');
        $date = (int)$date;
        if($date >= 0 && $date <= 12){
            echo "Bom Dia.";
        }else if($date > 12 && $date < 18){
            echo "Boa Tarde.";
        }else if($date >= 18 && $date <= 23){
            echo "Boa Noite.";
        }
    }
?>