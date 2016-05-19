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
    
    $personaje = new Personaje();
    $return = $personaje->viewPersonajeUsuario($value['id_usuario'], $id_partida);
    $id_personaje = $return['id_personaje'];
    $name_personaje = $return['nombre'];
?>
<script>
    // ask user for name with popup prompt    
    var file = '<?php echo $id_partida.'-'.$nombre ?>';
    var name = '><?php echo $value['nickname'].' / '.$name_personaje; ?>';
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
        $('#sel1-but').click(function(e) {
            var txt = $( "#sel1 option:selected" ).text();
            var val = $( "#sel1 option:selected" ).val();
            console.log(txt+' '+val);
            chat.sendhs(txt, val, name, color, file);
        });
        $('#sel2-but').click(function(e) {
            var txt = $( "#sel2 option:selected" ).text();
            var val = $( "#sel2 option:selected" ).val();
            console.log(txt+' '+val);
            chat.sendhp(txt, val, name, color, file);
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
        <li role="presentation" class="active"><a href="#personaje" aria-controls="personaje" role="tab" data-toggle="tab">Personaje</a></li>
        <li role="presentation"><a href="#habilidades" aria-controls="habilidades" role="tab" data-toggle="tab">Habilidades</a></li>
        <li role="presentation"><a href="#combate" aria-controls="combate" role="tab" data-toggle="tab">Combate</a></li>
        <li role="presentation"><a href="#equipo" aria-controls="equipo" role="tab" data-toggle="tab">Equipo</a></li>
        <li role="presentation"><a href="#mapa" aria-controls="mapa" role="tab" data-toggle="tab">Mapa</a></li>        
    </ul>
</div>
<div class="row" >
    <div class="col-md-12 bgm-white z-depth-1-bottom p-l-0 p-r-0" id="mesa-container">
        <!-- Tab panes -->
        <div class="tab-content ">
            <div role="tabpanel" class="tab-pane fade in active p-0" id="personaje">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card m-0 m-b-0">
                            <div class="lv-header-alt clearfix m-b-0 bgm-indigo z-depth-1-bottom">
                                <h2 class="lvh-label c-white f-18">
                                    Ficha del personaje
                                    <small class="c-white p-l-5">
                                        <?php 
                                            echo $name_personaje;
                                        ?>
                                    </small></h2>
                                <ul class="lv-actions actions">
                                    <li class="dropdown">
                                        <a href="#" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                                            <i class="zmdi zmdi-more-vert c-white"></i>
                                        </a>

                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li>
                                                <a <?php echo 'href="../character/mod_personaje.php?id='.$id_personaje.'"';?>>Modificar personaje</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body card-padding p-0">
                                <?php
                                    /*Mostrem tots els camps del personaje*/
                                    if (!empty($return)) {
                                        echo "<tr> ";
                                        $categoria = new Categoria(); 
                                        $arrayC = $categoria->viewCar($return['id_categoria']);
                                        $nivel = new Nivel(); 
                                        $arrayN = $nivel->viewNivel($return['nivel']);
                                    }

                                ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="pmb-block m-0">
                                            <div class="pmbb-body p-l-0">
                                                <div class="pmbb-view">
                                                    <dl class="dl-horizontal">
                                                        <dt class="">Nombre</dt>
                                                        <dd class=""><?php echo $name_personaje;?></dd>
                                                    </dl>
                                                    <dl class="dl-horizontal">
                                                        <dt>Categoria</dt>
                                                        <dd><?php echo $arrayC->getNombre();?></dd>
                                                    </dl>
                                                    <dl class="dl-horizontal">
                                                        <dt>Nivel / Edad</dt>
                                                        <dd><?php echo $return['nivel'].' / '.$return['edad'];?></dd>
                                                    </dl>
                                                    <dl class="dl-horizontal">
                                                        <dt>Sexo</dt>
                                                        <dd><?php echo $return['sexo'];?></dd>
                                                    </dl>
                                                    <dl class="dl-horizontal">
                                                        <dt>Raza</dt>
                                                        <dd><?php echo $return['raza'];?></dd>
                                                    </dl>
                                                    <dl class="dl-horizontal">
                                                        <dt>Pelo / Ojos</dt>
                                                        <dd><?php echo $return['pelo'].' / '.$return['ojos'];?></dd>
                                                    </dl>
                                                    <dl class="dl-horizontal">
                                                        <dt>P.Desarrollo</dt>
                                                        <dd><?php echo $arrayN->getPuntos();?></dd>
                                                    </dl>
                                                    <dl class="dl-horizontal">
                                                        <dt>P.D Restantes</dt>
                                                        <dd><?php echo $return['puntos_totales'];?></dd>
                                                    </dl>
                                                    <dl class="dl-horizontal">
                                                        <dt>Altura / Peso</dt>
                                                        <dd><?php echo $return['altura'].' / '.$return['peso'];?></dd>
                                                    </dl>
                                                    <dl class="dl-horizontal">
                                                        <dt>Apariencia / Tamaño</dt>
                                                        <dd><?php echo $return['apariencia'].' / '.$return['tamanyo'];?></dd>
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
            </div>
            <div role="tabpanel" class="tab-pane fade p-0" id="habilidades">
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
                                        <?php
                                        /*Mostrem totes les caracteristiques del personaje*/
                                        if (!empty($return)) {
                                            echo "  <tr> 
                                                        <th class='text-center f-400'>".$return['c_AGI']."</th>
                                                        <th class='text-center f-400'>".$return['c_CON']."</th>
                                                        <th class='text-center f-400'>".$return['c_DES']."</th>
                                                        <th class='text-center f-400'>".$return['c_FUE']."</th>
                                                        <th class='text-center f-400'>".$return['c_INT']."</th>
                                                        <th class='text-center f-400'>".$return['c_PER']."</th>
                                                        <th class='text-center f-400'>".$return['c_POD']."</th>
                                                        <th class='text-center f-400'>".$return['c_VOL']."</th>
                                                    </tr>";
                                        }

                                        ?>
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
                                    <tbody >
                                        <?php
                                        $HP = new Habilidades_Primarias(); 
                                        $Caract_p = new Caracteristicas_p(); 
                                        $Categoria_HP = new Categoria_HP(); 

                                        /*Mostrem totes les hp del personaje, en noms, base, caracteristica, bono, especial, categoria, final*/
                                        if (!empty($return)) {
                                                $contador = 0;
                                                while ($contador < 4){
                                                    $contador++;
                                                    $arrayHP = $HP->viewHP($contador);
                                                    switch ($contador) {
                                                        case 1:
                                                            $hp = $return['ha'];
                                                            break;
                                                        case 2:
                                                            $hp = $return['hp'];
                                                            break;
                                                        case 3:
                                                            $hp = $return['he'];
                                                            break;
                                                        case 4:
                                                            $hp = $return['la'];
                                                            break;
                                                    }
                                                    if( $contador < 3) {
                                                        $arrayCaract_p = $Caract_p->viewCaracteristica($return['c_DES']);
                                                    }elseif ($contador == 3) {
                                                        $arrayCaract_p = $Caract_p->viewCaracteristica($return['c_AGI']);
                                                    }elseif ($contador == 4) {
                                                        $arrayCaract_p = $Caract_p->viewCaracteristica($return['c_FUE']);
                                                    }
                                                    $arrayCategoria_HP = $Categoria_HP->viewHP1($return['id_categoria'], $contador);
                                                    $bonoCategoria = ((int)$arrayCategoria_HP['incr_nv']*(int)$return['nivel']);
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

                                        }
                                        ?>
                                    </tbody>
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
                                    <tbody >
                                        <?php
                                        /*Mostrem totes les hs del personaje, en noms, base, caracteristica, bono, especial, categoria, final*/
                                        $personaje_hs = new Personaje_HS();
                                        $personaje_hs = $personaje_hs->viewPersonaje_HS($id_personaje);
                                        foreach ($personaje_hs as $row){
                                            $hs_value = $row->getValor(); // valor de la hs
                                            $hs_id = $row->getId_HS();  // id de la hs
                                            
                                            $HS = new Habilidades_Secundarias();
                                            $HS = $HS->view_HS($hs_id);
                                            
                                            $hs_name = $HS->getNombre(); // Nombre de la hs
                                            $hs_car = $HS->getCaracteristica(); // Nombre de la caracteristica AGI ... etc
                                            
                                            $hs_base = $return['c_'.$hs_car]; // Base de la caracteristica del pj
                                            
                                            $Caract_p = new Caracteristicas_p();
                                            $hs_bono = $Caract_p->viewCaracteristica($hs_base);
                                            
                                            $Categoria_HS = new Categoria_HS();
                                            $arrayCat_HS = $Categoria_HS->viewHS1($return['id_categoria'], $hs_id);
                                            $hs_incrlv = (int)$arrayCat_HS['incr_nv']; // incremento categoria
                                            if($hs_incrlv == null){
                                                $hs_incrlv = 0; 
                                            }
                                            $hs_catfin = $hs_incrlv * $return['nivel']; // incremento categoria * level
                                            
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
                                        
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade p-l-0" id="combate">
                 <div class="row">
                    <div class="col-md-12">
                        <div class="card m-0">
                            <div class="lv-header-alt clearfix m-b-0 bgm-amber z-depth-1-bottom">
                                <h2 class="lvh-label c-white f-18">Tirada de habilidades secundarias</h2>
                            </div>
                            <div class="card-body card-padding table-responsive p-0">
                                <div class="form-group p-15">
                                    <select class="form-control m-b-10" id="sel1">
                                    <?php
                                        foreach ($personaje_hs as $row){
                                            $hs_value = $row->getValor(); // valor de la hs
                                            $hs_id = $row->getId_HS();  // id de la hs

                                            $HS = new Habilidades_Secundarias();
                                            $HS = $HS->view_HS($hs_id);

                                            $hs_name = $HS->getNombre(); // Nombre de la hs
                                            $hs_car = $HS->getCaracteristica(); // Nombre de la caracteristica AGI ... etc

                                            $hs_base = $return['c_'.$hs_car]; // Base de la caracteristica del pj

                                            $Caract_p = new Caracteristicas_p();
                                            $hs_bono = $Caract_p->viewCaracteristica($hs_base);

                                            $Categoria_HS = new Categoria_HS();
                                            $arrayCat_HS = $Categoria_HS->viewHS1($return['id_categoria'], $hs_id);
                                            $hs_incrlv = (int)$arrayCat_HS['incr_nv']; // incremento categoria
                                            if($hs_incrlv == null){
                                                $hs_incrlv = 0; 
                                            }
                                            $hs_catfin = $hs_incrlv * $return['nivel']; // incremento categoria * level

                                            $hs_final = $hs_value + $hs_bono + $hs_catfin; // Suma final

                                            if($hs_value <= 0){ //si la base es 0 el valor final sera 0
                                                $hs_final = -30;
                                            }
                                            echo '<option value="'.$hs_final.'">'.$hs_name.'</option>';
                                        }

                                    ?>
                                    </select>
                                    <button class="btn btn-success p-l-15 p-r-15 z-depth-1" id="sel1-but">Tirar dados</button>
                                </div>
                            </div>
                        </div>
                        <div class="card m-0">
                            <div class="lv-header-alt clearfix m-b-0 bgm-red z-depth-1-bottom">
                                <h2 class="lvh-label c-white f-18">Tirada de habilidades primarias</h2>
                            </div>
                            <div class="card-body card-padding table-responsive p-0">
                                <div class="form-group p-15">
                                    <select class="form-control m-b-10" id="sel2">
                                    <?php
                                        $HP = new Habilidades_Primarias(); 
                                        $Caract_p = new Caracteristicas_p(); 
                                        $Categoria_HP = new Categoria_HP(); 

                                        /*Mostrem totes les hp del personaje, en noms, base, caracteristica, bono, especial, categoria, final*/
                                        if (!empty($return)) {
                                                $contador = 0;
                                                while ($contador < 3){
                                                    $contador++;
                                                    $arrayHP = $HP->viewHP($contador);
                                                    switch ($contador) {
                                                        case 1:
                                                            $hp = $return['ha'];
                                                            break;
                                                        case 2:
                                                            $hp = $return['hp'];
                                                            break;
                                                        case 3:
                                                            $hp = $return['he'];
                                                            break;
                                                    }
                                                    if( $contador < 3) {
                                                        $arrayCaract_p = $Caract_p->viewCaracteristica($return['c_DES']);
                                                    }elseif ($contador == 3) {
                                                        $arrayCaract_p = $Caract_p->viewCaracteristica($return['c_AGI']);
                                                    }
                                                    $arrayCategoria_HP = $Categoria_HP->viewHP1($return['id_categoria'], $contador);
                                                    $bonoCategoria = ((int)$arrayCategoria_HP['incr_nv']*(int)$return['nivel']);
                                                    $coste = $arrayCategoria_HP['coste'];
                                                    $hp = $hp / $coste;
                                                    $HAfinal = (int)$hp + (int)$arrayCaract_p + (int)$bonoCategoria;
                                                    
                                                    echo '<option value="'.$HAfinal.'">'.$arrayHP->getNombre().'</option>';
                                        
                                                }
                                        }
                                        ?>
                                    </select>
                                    <button class="btn btn-success p-l-15 p-r-15 z-depth-1" id="sel2-but">Tirar dados</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade p-0" id="equipo">
                 <div class="row">
                    <div class="col-md-12">
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
                                    <tbody >
                                        <?php
                                        $Personaje_Objeto = new Personaje_Objeto();
                                        $Personaje_Objeto = $Personaje_Objeto->viewObjPerson($id_personaje);
                                        if($Personaje_Objeto != null){
                                           /*Agafem totes les id_objeto que te el pj mitjançant id_personaje*/
                                            foreach ($Personaje_Objeto as $row){
                                                //per cada id_objeto select a objeto where id_objeto = id_objeto;
                                                $id_objeto = $row->getId_Objeto();
                                                $cantidad = $row->getCantidad();    //cantidad del objeto

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
                                                    $danyo = $Caracteristicas_Objeto_Arma->getValor(); //select de danyo

                                                    $Caracteristicas_Objeto_Armadura = $Caracteristicas_Objeto->selectArmaduraValor($id_objeto);
                                                    $TA = $Caracteristicas_Objeto_Armadura->getValor(); //select de TA
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

                                        
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
                var tileRange = 1 << zoom;
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

