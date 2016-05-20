<?php
    require_once "../../System/Classes/Personaje.php";
    require_once "../../System/Classes/Usuario.php";
    require_once "../../System/Classes/Categoria.php";
    require_once "../../System/Classes/Nivel.php";
    require_once "../../System/Classes/Habilidades_Primarias.php";
    require_once "../../System/Classes/Caracteristicas_P.php";
    require_once "../../System/Classes/Categoria_HP.php";
    require_once "../../System/Classes/Personaje_HS.php";
    require_once "../../System/Classes/Habilidades_Secundarias.php";
    require_once "../../System/Classes/Categoria_HS.php";
    require_once "../../System/Classes/Personaje_Objeto.php";
    require_once "../../System/Classes/Objeto.php";
    require_once "../../System/Classes/Tipo.php";
    require_once "../../System/Classes/Objeto_Caracteristica.php";
?>
<script>
    // ask user for name with popup prompt    
    var file = '<?php echo $id_partida.'-'.$nombre ?>';
    var name = '><?php echo $value['nickname']; ?>';
    var color = "<?php if($id_master == $value['id_usuario']){ echo 'c-purple'; }else{ echo 'c-black'; } ?>";

    var chat =  new Chat();
    $(function() {
        instanse = false;
        chat.getState(file); 

        $('#sendie-btn').click(function(e) {
            var text = $('#sendie').val();
            $('#sendie').val('');
            chat.send(text, name, color, file);
        });
        $('#sendie-btnimg').click(function(e) {
            console.log('send Image');
            swal({
                title: "Enviar Imagen!",
                text: "url de la imagen:",
                type: "input",
                showCancelButton: true,
                closeOnConfirm: false,
                inputPlaceholder: "url"
              }, function (inputValue) {
                if (inputValue === false) return false;
                if (inputValue === "") {
                  swal.showInputError("Tienes que pegar aqui una url valida!");
                  return false
                }
                chat.sendimg(inputValue, name, color, file);
                swal("Imagen enviada!", "url: " + inputValue, "success");
              });
            
        });
        $('#sendie').keyup(function(e) {
            var code = (e.keyCode ? e.keyCode : e.which);
            if(code == 13) { //Enter keycode
                var text = $('#sendie').val();
                $('#sendie').val('');
                chat.send(text, name, color, file);
            }
        });
    });
    $(window).load(function() {
        chat.loadxat(file);
        setInterval(myFunction(), 2000);

        function myFunction() {
            setInterval(function(){ chat.update(file); }, 1500);
        }
    });
</script>
<div class="row">
    <ul class="nav nav-tabs nav-justified">
        <li role="presentation" class="active"><a href="#jugadores" aria-controls="jugadores" role="tab" data-toggle="tab">Jugadores</a></li>
        <li role="presentation"><a href="#personajes" aria-controls="personajes" role="tab" data-toggle="tab">Personajes</a></li>
        <li role="presentation"><a href="#objetos" aria-controls="objetos" role="tab" data-toggle="tab">Objetos</a></li>
        <!-- <li role="presentation"><a href="#combate" aria-controls="combate" role="tab" data-toggle="tab">Combate</a></li> -->
        <li role="presentation"><a href="#mapa" aria-controls="mapa" role="tab" data-toggle="tab">Mapa</a></li>
        <li role="presentation"><a href="#diario" aria-controls="diario" role="tab" data-toggle="tab">Diario del master</a></li>
        <!--<li role="presentation" class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            Otros <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
                
                <li role="presentation"><a href="#opc" aria-controls="opc" role="tab" data-toggle="tab">Configuración</a></li>
          </ul>
        </li> -->
    </ul>
</div>
<div class="row" >
    <div class="col-md-12 bgm-white z-depth-1-bottom p-l-0 p-r-0" id="mesa-container">
        <!-- Tab panes -->
        <div class="tab-content ">
            <div role="tabpanel" class="tab-pane fade in active p-l-5 p-r-5 p-t-0" id="jugadores">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel-group m-b-5 m-t-5" id="accordion">
                            <?php
                            $Personaje = new Personaje(); 
                            $return = $Personaje->viewPersonajesPartida($id_partida);
                            $nivel = new Nivel();
                            $usuario = new Usuario();
                            if (!empty($return)) {
                                foreach ($return as $row) {
                                    if($row['id_usuario'] != $partida->getId_Usuario()){
                                    $nombreUsuario = $usuario->return_user($row['id_usuario']);
                                    $categoria = new Categoria(); 
                                    $arrayC = $categoria->viewCar($row['id_categoria']);
                                    $nivel = new Nivel(); 
                                    $arrayN = $nivel->viewNivel($row['nivel']);
                                
                                    echo '<div class="panel panel-default">
                                            <div class="panel-heading">
                                              <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#'.$nombreUsuario['nickname'].'">'.$row['nombre'].' <small>Lvl: '.$row['nivel'].'</small></a>
                                              </h4>
                                            </div>
                                            <div id="'.$nombreUsuario['nickname'].'" class="panel-collapse collapse">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="card m-0 m-b-0">
                                                            <div class="lv-header-alt clearfix m-b-0 bgm-indigo z-depth-1-bottom">
                                                                <h2 class="lvh-label c-white f-18">
                                                                    Ficha del personaje
                                                                    <small class="c-white p-l-5">
                                                                        '.$row['nombre'].'
                                                                    </small>
                                                                </h2>
                                                                <ul class="lv-actions actions">
                                                                    <li class="dropdown">
                                                                        <a href="#" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                                                                            <i class="zmdi zmdi-more-vert c-white"></i>
                                                                        </a>

                                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                                            <li>
                                                                                <a target="_blank" href="../character/mod_personaje.php?id='.$row['id_personaje'].'">Modificar personaje</a>
                                                                            </li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="card-body card-padding p-0">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="pmb-block m-0">
                                                                            <div class="pmbb-body p-l-0">
                                                                                <div class="pmbb-view">
                                                                                    <dl class="dl-horizontal">
                                                                                        <dt class="">Nombre</dt>
                                                                                        <dd class="">'.$row['nombre'].'</dd>
                                                                                    </dl>
                                                                                    <dl class="dl-horizontal">
                                                                                        <dt>Categoria</dt>
                                                                                        <dd>'.$arrayC->getNombre().'</dd>
                                                                                    </dl>
                                                                                    <dl class="dl-horizontal">
                                                                                        <dt>Nivel / Edad</dt>
                                                                                        <dd>'.$row['nivel'].' / '.$row['edad'].'</dd>
                                                                                    </dl>
                                                                                    <dl class="dl-horizontal">
                                                                                        <dt>Sexo</dt>
                                                                                        <dd>'.$row['sexo'].'</dd>
                                                                                    </dl>
                                                                                    <dl class="dl-horizontal">
                                                                                        <dt>Raza</dt>
                                                                                        <dd>'.$row['raza'].'</dd>
                                                                                    </dl>
                                                                                    <dl class="dl-horizontal">
                                                                                        <dt>Pelo / Ojos</dt>
                                                                                        <dd>'.$row['pelo'].' / '.$row['ojos'].'</dd>
                                                                                    </dl>
                                                                                    <dl class="dl-horizontal">
                                                                                        <dt>P.Desarrollo</dt>
                                                                                        <dd>'.$arrayN->getPuntos().'</dd>
                                                                                    </dl>
                                                                                    <dl class="dl-horizontal">
                                                                                        <dt>P.D Restantes</dt>
                                                                                        <dd>'.$row['puntos_totales'].'</dd>
                                                                                    </dl>
                                                                                    <dl class="dl-horizontal">
                                                                                        <dt>Altura / Peso</dt>
                                                                                        <dd>'.$row['altura'].' / '.$row['peso'].'</dd>
                                                                                    </dl>
                                                                                    <dl class="dl-horizontal">
                                                                                        <dt>Apariencia / Tamaño</dt>
                                                                                        <dd>'.$row['apariencia'].' / '.$row['tamanyo'].'</dd>
                                                                                    </dl>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="card m-0">
                                                                <div class="lv-header-alt clearfix m-b-0 bgm-deeppurple z-depth-1-bottom">
                                                                    <h2 class="lvh-label c-white f-18">Caracteristicas</h2>
                                                                </div>
                                                                <div class="card-body card-padding table-responsive p-0">
                                                                    <table class="table b-0 m-0">
                                                                        <thead class="bgm-indigo b-0 c-white">
                                                                            <tr>
                                                                                <th class="text-center">Agi</th>
                                                                                <th class="text-center">Con</th>
                                                                                <th class="text-center">Des</th>
                                                                                <th class="text-center">Fue</th>
                                                                                <th class="text-center">Int</th>
                                                                                <th class="text-center">Per</th>
                                                                                <th class="text-center">Pod</th>
                                                                                <th class="text-center">Vol</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody >
                                                                            <tr> 
                                                                                <th class=\'text-center f-400\'>'.$row['c_AGI'].'</th>
                                                                                <th class=\'text-center f-400\'>'.$row['c_CON'].'</th>
                                                                                <th class=\'text-center f-400\'>'.$row['c_DES'].'</th>
                                                                                <th class=\'text-center f-400\'>'.$row['c_FUE'].'</th>
                                                                                <th class=\'text-center f-400\'>'.$row['c_INT'].'</th>
                                                                                <th class=\'text-center f-400\'>'.$row['c_PER'].'</th>
                                                                                <th class=\'text-center f-400\'>'.$row['c_POD'].'</th>
                                                                                <th class=\'text-center f-400\'>'.$row['c_VOL'].'</th>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="card m-b-0">
                                                                <div class="lv-header-alt clearfix m-b-0 bgm-indigo z-depth-1-bottom">
                                                                    <h2 class="lvh-label  c-white f-18">Habilidades Primarias </h2>
                                                                </div>
                                                                <div class="card-body card-padding table-responsive p-0">
                                                                    <table class="table b-0">
                                                                        <thead class="bgm-blue b-0 c-white">
                                                                            <tr>
                                                                                <th>&nbsp;</th>
                                                                                <th>Base</th>
                                                                                <th>Car</th>
                                                                                <th>Bono</th>
                                                                                <th>Esp</th>
                                                                                <th>Cat</th>
                                                                                <th>Final</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody >';
                                                                            $HP = new Habilidades_Primarias(); 
                                                                            $Caract_p = new Caracteristicas_p(); 
                                                                            $Categoria_HP = new Categoria_HP(); 

                                                                            /*Mostrem totes les hp del personaje, en noms, base, caracteristica, bono, especial, categoria, final*/
                                                                            $contador = 0;
                                                                            while ($contador < 4){
                                                                                $contador++;
                                                                                $arrayHP = $HP->viewHP($contador);
                                                                                switch ($contador) {
                                                                                    case 1:
                                                                                        $hp = $row['ha'];
                                                                                        break;
                                                                                    case 2:
                                                                                        $hp = $row['hp'];
                                                                                        break;
                                                                                    case 3:
                                                                                        $hp = $row['he'];
                                                                                        break;
                                                                                    case 4:
                                                                                        $hp = $row['la'];
                                                                                        break;
                                                                                }
                                                                                if( $contador < 3) {
                                                                                    $arrayCaract_p = $Caract_p->viewCaracteristica($row['c_DES']);
                                                                                }elseif ($contador == 3) {
                                                                                    $arrayCaract_p = $Caract_p->viewCaracteristica($row['c_AGI']);
                                                                                }elseif ($contador == 4) {
                                                                                    $arrayCaract_p = $Caract_p->viewCaracteristica($row['c_FUE']);
                                                                                }
                                                                                $arrayCategoria_HP = $Categoria_HP->viewHP1($row['id_categoria'], $contador);
                                                                                $bonoCategoria = ((int)$arrayCategoria_HP['incr_nv']*(int)$row['nivel']);
                                                                                $coste = $arrayCategoria_HP['coste'];
                                                                                $hp = $hp / $coste;
                                                                                $HAfinal = (int)$hp + (int)$arrayCaract_p + (int)$bonoCategoria;
                                                                                $is0 = false;
                                                                                if($hp < 0){
                                                                                    $is0 = true;
                                                                                }
                                                                                if(!$is0){
                                                                                    echo "<tr>
                                                                                    <th class='f-400'>".$arrayHP->getNombre()."</th>
                                                                                    <th class='f-400'>".$hp."</th>
                                                                                    <th class='f-400'>".$arrayHP->getCaracteristica()."</th>
                                                                                    <th class='f-400'>".$arrayCaract_p."</th>
                                                                                    <th class='f-400'>0</th>
                                                                                    <th class='f-400'>".$bonoCategoria."</th>
                                                                                    <th class='f-700 c-green'>".$HAfinal."</th></tr>";
                                                                                }else{
                                                                                    echo "<tr>
                                                                                    <th class='f-400'>".$arrayHP->getNombre()."</th>
                                                                                    <th class='f-400'>".$hp."</th>
                                                                                    <th class='f-400'>".$arrayHP->getCaracteristica()."</th>
                                                                                    <th class='f-400'>".$arrayCaract_p."</th>
                                                                                    <th class='f-400'>0</th>
                                                                                    <th class='f-400'>".$bonoCategoria."</th>
                                                                                    <th class='f-700 c-red'>".$HAfinal."</th></tr>";
                                                                                }
                                                                            }
                                                                        echo '</tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="card m-0">
                                                                <div class="lv-header-alt clearfix m-b-0 bgm-indigo z-depth-1-bottom">
                                                                    <h2 class="lvh-label  c-white f-18">Habilidades Secundarias </h2>
                                                                </div>
                                                                <div class="card-body card-padding table-responsive p-0 card-body-partida">
                                                                    <table class="table b-0">
                                                                        <thead class="bgm-blue b-0 c-white">
                                                                            <tr>
                                                                                <th></th>
                                                                                <th>Base</th>
                                                                                <th>Caract</th>
                                                                                <th>Bono</th>
                                                                                <th>Esp</th>
                                                                                <th>Cat</th>
                                                                                <th>Final</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody >';
                                                                            /*Mostrem totes les hs del personaje, en noms, base, caracteristica, bono, especial, categoria, final*/
                                                                            $personaje_hs = new Personaje_HS();
                                                                            $personaje_hs = $personaje_hs->viewPersonaje_HS($row['id_personaje']);
                                                                            foreach ($personaje_hs as $row_hs){
                                                                                $hs_value = $row_hs->getValor(); // valor de la hs
                                                                                $hs_id = $row_hs->getId_HS();  // id de la hs

                                                                                $HS = new Habilidades_Secundarias();
                                                                                $HS = $HS->view_HS($hs_id);

                                                                                $hs_name = $HS->getNombre(); // Nombre de la hs
                                                                                $hs_car = $HS->getCaracteristica(); // Nombre de la caracteristica AGI ... etc

                                                                                $hs_base = $row['c_'.$hs_car]; // Base de la caracteristica del pj

                                                                                $Caract_p = new Caracteristicas_p();
                                                                                $hs_bono = $Caract_p->viewCaracteristica($hs_base);

                                                                                $Categoria_HS = new Categoria_HS();
                                                                                $arrayCat_HS = $Categoria_HS->viewHS1($row['id_categoria'], $hs_id);
                                                                                $hs_incrlv = (int)$arrayCat_HS['incr_nv']; // incremento categoria
                                                                                if($hs_incrlv == null){
                                                                                    $hs_incrlv = 0; 
                                                                                }
                                                                                $hs_catfin = $hs_incrlv * $row['nivel']; // incremento categoria * level

                                                                                $hs_final = $hs_value + $hs_bono + $hs_catfin; // Suma final

                                                                                $is0 = false;
                                                                                if($hs_value <= 0){ //si la base es 0 el valor final sera 0
                                                                                    $hs_final = 0;
                                                                                    $is0 = true;
                                                                                }
                                                                                if(!$is0){
                                                                                    echo '  <tr>
                                                                                            <th class="f-400">'.$hs_name.'</th>
                                                                                            <th class="f-400">'.$hs_value.'</th>
                                                                                            <th class="f-400">'.$hs_car.'</th>
                                                                                            <th class="f-400">'.$hs_bono.'</th>
                                                                                            <th class="f-400">0</th>
                                                                                            <th class="f-400">'.$hs_catfin.'</th>
                                                                                            <th class="f-700 c-green">'.$hs_final.'</th>
                                                                                        </tr>';
                                                                                }else{
                                                                                    echo '  <tr>
                                                                                            <th class="f-400">'.$hs_name.'</th>
                                                                                            <th class="f-400">'.$hs_value.'</th>
                                                                                            <th class="f-400">'.$hs_car.'</th>
                                                                                            <th class="f-400">'.$hs_bono.'</th>
                                                                                            <th class="f-400">0</th>
                                                                                            <th class="f-400">'.$hs_catfin.'</th>
                                                                                            <th class="f-700 c-red">'.$hs_final.'</th>
                                                                                        </tr>';
                                                                                }


                                                                            }
                                                                        echo '</tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card m-0">
                                                        <div class="lv-header-alt clearfix m-b-0 bgm-blue z-depth-1-bottom">
                                                            <h2 class="lvh-label c-white f-18">Inventario</h2>
                                                        </div>
                                                        <div class="card-body card-padding table-responsive p-0 card-body-partida">
                                                            <table class="table b-0">
                                                                <thead class="bgm-lightblue b-0 c-white">
                                                                    <tr>
                                                                        <!--Fer una select de Objeto, Personaje?, Personaje_Objeto -->
                                                                        <th>Nombre</th>
                                                                        <th>Tipo</th>
                                                                        <th>Peso</th>
                                                                        <th>Valor</th>
                                                                        <th>Cantidad</th>
                                                                        <th>Daño</th>
                                                                        <th>TA</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody >';
                                                                    $Personaje_Objeto = new Personaje_Objeto();
                                                                    $Personaje_Objeto = $Personaje_Objeto->viewObjPerson($row['id_personaje']);
                                                                    if($Personaje_Objeto != null){
                                                                       /*Agafem totes les id_objeto que te el pj mitjançant id_personaje*/
                                                                        foreach ($Personaje_Objeto as $rowpo){
                                                                            //per cada id_objeto select a objeto where id_objeto = id_objeto;
                                                                            $id_objeto = $rowpo->getId_Objeto();
                                                                            $cantidad = $rowpo->getCantidad();    //cantidad del objeto

                                                                            //mostrem el nom, pes, valor, id_tipus, id_objeto_caracteristica=1(danyo), (TA).
                                                                            $objeto = new Objeto();
                                                                            $objeto = $objeto->viewObj($id_objeto);     //select * del objeto

                                                                            $nombre_objeto = $objeto[0]->getNombre();  //nombre del objeto
                                                                            $peso = $objeto[0]->getPeso(); //peso del objeto
                                                                            $precio = $objeto[0]->getPrecio(); //precio del objeto
                                                                            $id_tipo = $objeto[0]->getId_Tipo();

                                                                            $tipo = new Tipo();
                                                                            $tipo = $tipo->view_nombre($id_tipo);
                                                                            $nombre_tipo = $tipo->getNombre(); //nombre del tipo de objeto (Arma)


                                                                            if($id_tipo == '2' || $id_tipo == '3') {
                                                                                $Caracteristicas_Objeto = new Objeto_Caracteristica();

                                                                                $Caracteristicas_Objeto_Arma = $Caracteristicas_Objeto->selectArmaValor($id_objeto);
                                                                                $danyo = $Caracteristicas_Objeto_Arma->getValor();

                                                                                $Caracteristicas_Objeto_Armadura = $Caracteristicas_Objeto->selectArmaduraValor($id_objeto);
                                                                                $TA = $Caracteristicas_Objeto_Armadura->getValor();
                                                                            }else{
                                                                                $danyo = 0;
                                                                                $TA = 0;
                                                                            }


                                                                            if(empty($TA)){
                                                                                $TA = 0;
                                                                            }else if(empty($danyo)){
                                                                                $danyo = 0;
                                                                            }

                                                                            echo '  <tr>
                                                                                    <th class="f-400">'.$nombre_objeto.'</th>
                                                                                    <th class="f-400">'.$nombre_tipo.'</th>
                                                                                    <th class="f-400">'.$peso.'</th>
                                                                                    <th class="f-400">'.$precio.'</th>
                                                                                    <th class="f-400">'.$cantidad.'</th>
                                                                                    <th class="f-400">'.$danyo.'</th>
                                                                                    <th class="f-400">'.$TA.'</th>
                                                                                </tr>';
                                                                        } 
                                                                    }else{
                                                                        echo '  <tr>
                                                                                    <th class="f-400"> ??? </th>
                                                                                    <th class="f-400"> ??? </th>
                                                                                    <th class="f-400"> ??? </th>
                                                                                    <th class="f-400"> ??? </th>
                                                                                    <th class="f-400"> ??? </th>
                                                                                    <th class="f-400"> ??? </th>
                                                                                    <th class="f-400"> ??? </th>
                                                                                </tr>';
                                                                    }
                                                                echo '</tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>';
                                        }
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade p-0" id="personajes">
                 <div class="row">
                    <div class="col-md-12">
                        <div class="card m-0">
                            <div class="lv-header-alt clearfix m-b-0 bgm-blue z-depth-1-bottom">
                                <h2 class="lvh-label c-white f-18">Npc's</h2>
                            </div>
                            <div class="card-body card-padding table-responsive p-0 card-body-partida">
                                <table class="table b-0">
                                    <thead class="bgm-lightblue b-0 c-white">
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Nivel</th>
                                            <th>Categoria</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody >
                                        <?php
                                        require_once "../../System/Classes/Personaje.php";
                                        require_once "../../System/Classes/Usuario.php";
                                        require_once "../../System/Classes/Categoria.php"; 
                                        $personajes = new Personaje();
                                        $personajes = $personajes->viewPNJ($value['id_usuario'], $id_partida);
                                        if (!empty($personajes)) {
                                            foreach ($personajes as $row) {
                                                $id_cat = $row->getId_Categoria();
                                                $categoria = new Categoria();
                                                $categoria = $categoria->viewCar($id_cat);
                                                $cat = $categoria->getNombre();
                                                $fakeidpart = $row->getId_Partida();
                                                $fakeidnpcs = $row->getId_Personaje();
                                                if($fakeidpart == $id_partida){
                                                    echo "<tr >
                                                    <td class='text-capitalize text-success'>".$row->getNombre()."</td>
                                                    <td class='text-capitalize text-success'>".$row->getNivel()."</td>
                                                    <td class='text-capitalize text-success'>".$cat."</td>
                                                    <td>
                                                        <label class='m-r-10 p-0'>
                                                                <a target='_blank' href=view_personaje.php?id_personaje=".$fakeidnpcs."&id_partida=".$fakeidpart.">
                                                                    <i class='zmdi zmdi-eye c-black f-16 c-amber'></i>
                                                                </a>
                                                        </label>

                                                    </td>";
                                                }else{
                                                    echo "<tr >
                                                    <td class='text-capitalize text-success'>".$row->getNombre()."</td>
                                                    <td class='text-capitalize text-success'>".$row->getNivel()."</td>
                                                    <td class='text-capitalize text-success'>".$cat."</td>
                                                    <td>
                                                        &nbsp;
                                                    </td>";
                                                }

                                            }
                                        }

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade p-0" id="objetos">
                 <div class="row">
                    <div class="col-md-12">
                        <div class="card m-0">
                            <div class="lv-header-alt clearfix m-b-0 bgm-orange z-depth-1-bottom">
                                <h2 class="lvh-label  c-white f-18">Objetos</h2>
                                <ul class="lv-actions actions">
                                    <li class="dropdown">
                                        <a href="#" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                                            <i class="zmdi zmdi-more-vert c-white"></i>
                                        </a>

                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li>
                                                <a target="_blank" href="../character/new_objeto.php?id_partida=<?php echo $id_partida ?>">Nuevo</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body card-padding table-responsive p-0">
                                <table class="table b-0">
                                    <thead class="bgm-amber b-0 c-white">
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Categoría</th>
                                            <th>Valor (MC)</th>
                                            <th>Peso</th>
                                        </tr>
                                    </thead>
                                    <tbody >
                                        <?php
                                        require_once "../../System/Classes/Partida_Objeto.php";
                                        require_once "../../System/Classes/Objeto.php";
                                        require_once "../../System/Classes/Tipo.php";

                                        $partida_objeto = new Partida_Objeto();
                                        $id_objeto = $partida_objeto->view_Objetos_Partida($id_partida);

                                        $tipo = new Tipo();
                                        /*Seleccionem la id de partida i busquem els seus objectes propis de partida*/
                                        foreach ($id_objeto as $row) {
                                            $objeto1 = new Objeto(); 
                                            $objeto1 = $objeto1->viewObj($row->getId_Objeto());

                                            /*Per a cada objecte mostrem el contingut que volem*/
                                            foreach ($objeto1 as $row2) {
                                                echo "<tr >
                                                    <td>".strval($row2->getNombre())."</td>";

                                                /*Per saber el nom del id_tipo hem de fer una select*/
                                                $tipoNombre = $tipo->view_nombre($row2->getId_Tipo());
                                                echo "
                                                    <td>".strval($tipoNombre->getNombre())."</td>
                                                    <td>".strval($row2->getPrecio())."</td>
                                                    <td>".strval($row2->getPeso())."</td>
                                                    </tr>";
                                            }
                                        }


                                        $objeto = new Objeto(); 
                                        $objeto = $objeto->viewObjetosPublicos();

                                        /*Mostrem tots els objectes que siguin public*/
                                        foreach ($objeto as $row) {
                                            echo "<tr >
                                                <td>".strval($row->getNombre())."</td>";

                                            /*Per saber el nom del id_tipo hem de fer una select*/
                                            $tipoNombre = $tipo->view_nombre($row->getId_Tipo());
                                            echo "
                                                <td>".strval($tipoNombre->getNombre())."</td>
                                                <td>".strval($row->getPrecio())."</td>
                                                <td>".strval($row->getPeso())."</td>
                                                </tr>";
                                        }

                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade p-l-15 p-r-15" id="combate">
                 <div class="row">
                    <div class="col-md-12">
                        <h1>Combate</h1>
                        <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade p-0" id="mapa">
                <div id='map'></div>
                <div class="alert bgm-dark m-t-0 m-b-0" id="latlong" style="border-radius: 0px;">
                        <p>Latitude: <input class="form-control disabled" type="text" id="latbox" name="lat" value="0"></p>
                        <p>Longitude: <input class="form-control disabled" type="text" id="lngbox" name="lng" value="0"></p>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade p-l-15 p-r-15" id="diario">
                 <div class="row">
                    <div class="col-md-12">
                        <h1>Diario del master
                            <span class="m-l-15">
                                <button class="btn btn-primary btn-sm hec-button waves-effect btn-xs m-0">Editar!</button>
                                <button class="btn btn-success btn-sm hec-save waves-effect btn-xs m-0" style="display: none;">Guardar</button>
                            </span>
                        </h1>
                        <div class="html-editor-click m-b-10" style="display: block;">
                            <?php
                                if($diario != null){
                                    echo $diario;
                                }else{
                                    echo '<br>';
                                } 
                            ?>
                        </div>
                        <div class="m-b-10">
                            
                        </div>
                        <script>
                            $(document).ready(function() {
                                //Edit
                                $('body').on('click', '.hec-button', function(){
                                    $('.html-editor-click').summernote({
                                        height: 300,
                                        minHeight: null,             // set minimum height of editor
                                        maxHeight: null,
                                        focus: true
                                        
                                    });
                                    $('.hec-save').show();
                                })

                                //Save
                                $('body').on('click', '.hec-save', function(){
                                    $('.html-editor-click').code();
                                    $('.html-editor-click').destroy();
                                    $('.hec-save').hide();
                                    var diario = $('.html-editor-click').html();
                                    $.ajax({
                                        url: "../../System/Protocols/Partida_Diario.php",
                                        type: "POST",
                                        data: {
                                            id: <?php echo $id_partida ?>,
                                            datos: diario
                                        },
                                        dataType: "html",
                                        success: function (data) {
                                            console.log(data);
                                        }
                                    });
                                    $.notify({
                                            // options
                                            message: 'Content Saved Successfully!'
                                    },{
                                            // settings
                                            type: 'inverse',
                                            delay: 4000,
                                            offset : {
                                                    y: 100,
                                                    x: 20
                                            }
                                    });
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade p-l-15 p-r-15" id="opc">
                 <div class="row">
                    <div class="col-md-12">
                        <h1>Configuración de la partida</h1>
                        <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkkbD7741_-gMF83eHjO5tgzW5kvx8fj8" type="text/javascript"></script>
<script>
    $(document).ready(function(){
        initMap();
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
              center: {lat: 0, lng: 0},
              zoom: 2,
              streetViewControl: false,
              mapTypeControl: false,
              mapTypeControlOptions: {
                    mapTypeIds: ['anima']
                    //mapTypeIds: ['anima']
              }
            });
            var moonMapType = new google.maps.ImageMapType({
              getTileUrl: function(coord, zoom) {
                                        // Don't load tiles for repeated maps
                                        var tileRange = 1 << zoom;
                                        if ( coord.y < 0 || coord.y >= tileRange || coord.x < 0 || coord.x >= tileRange )
                                                return null;

                                        // Load the tile for the requested coordinate
                                        var file = '../../Public/img/output' + '/tile_' + zoom + '_' + coord.x + '-' +coord.y + '.png';

                                        return file;
              },
              tileSize: new google.maps.Size(256, 256),
              maxZoom: 4,
              minZoom: 2,
              radius: 1738000,
              name: 'anima'
            });
            map.mapTypes.set('anima', moonMapType);
            map.setMapTypeId('anima');
                                // Marcador
                                var marker = new google.maps.Marker({
                                        position: {lat: 0, lng: 0},
                                        draggable: true,
                                        map: 'anima',
                                        title: "Your location"
                                });
                                marker.setMap(map);
                                google.maps.event.addListener(marker, 'dragend', function (event) {
                                        document.getElementById("latbox").value = this.getPosition().lat();
                                        document.getElementById("lngbox").value = this.getPosition().lng();
                                });






        }
        // Normalizes the coords that tiles repeat across the x axis (horizontally)
        // like the standard Google map tiles.
        function getNormalizedCoord(coord, zoom) {
                var y = coord.y;
                var x = coord.x;
                // tile range in one direction range is dependent on zoom level
                // 0 = 1 tile, 1 = 2 tiles, 2 = 4 tiles, 3 = 8 tiles, etc
                var tileRange = 100 << zoom;
                // don't repeat across y-axis (vertically)
                if (y < 0 || y >= tileRange) {
                  return null;
                }
                // repeat across x-axis
                if (x < 0 || x >= tileRange) {
                  x = (x % tileRange + tileRange) % tileRange;
                }
                return {x: x, y: y};
        }
    });
</script>

