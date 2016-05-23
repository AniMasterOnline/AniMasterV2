<!-- Admin Panel -- Header content box -->
<?php 
$title='Index';
$migas='#Home|../index.php#Admin Panel';
include "../Public/layouts/head.php";?>
<!-- Body content box -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card m-b-5">
                <div class="lv-header-alt clearfix m-b-0 bgm-deeppurple z-depth-1-bottom ">
                    <h2 class="lvh-label c-white f-18"><?php echo 'Hola, '.$value['nickname']; ?></h2>
                    <ul class="lv-actions actions">
                        <li>
                            <a data-toggle="tooltip" data-placement="right" title="Gestiona los objetos y npc's publicos">
                                <i class="zmdi zmdi-info c-white"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="lv-header-alt clearfix m-b-0 bgm-orange z-depth-1-bottom">
                    <h2 class="lvh-label  c-white f-18">Objetos</h2>
                    <ul class="lv-actions actions">
                        <li>
                            <a data-toggle="tooltip" data-placement="right" title="Todos los objetos que se muestran son publicos">
                                <i class="zmdi zmdi-info c-white"></i>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                                <i class="zmdi zmdi-more-vert c-white"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a href="new_objeto.php">Nuevo</a>
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
                                <th>Peso (Kg)</th>
                            </tr>
                        </thead>
                        <tbody >
                            <?php
                            require_once "../System/Classes/Partida_Objeto.php";
                            require_once "../System/Classes/Objeto.php";
                            require_once "../System/Classes/Tipo.php";
                            
                            $partida_objeto = new Partida_Objeto();
                            $tipo = new Tipo();
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
        
        <div class="col-md-6">
            <div class="card">
                <div class="lv-header-alt clearfix m-b-0 bgm-blue z-depth-1-bottom">
                    <h2 class="lvh-label c-white f-18">Npc's</h2>
                    <ul class="lv-actions actions">
                        <li>
                            <a data-toggle="tooltip" data-placement="right" title="Todos los npc's que se muestran son publicos">
                                <i class="zmdi zmdi-info c-white"></i>
                            </a>
                        </li>
                        <!--<li class="dropdown">
                            <a href="#" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                                <i class="zmdi zmdi-more-vert c-white"></i>
                            </a>

                             <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a href="#">Nuevo</a>
                                </li>
                                <li>
                                    <a href="#">Eliminar</a>
                                </li>
                            </ul> 
                        </li>-->
                    </ul>
                </div>
                <div class="card-body card-padding table-responsive p-0">
                    <table class="table b-0">
                        <thead class="bgm-lightblue b-0 c-white">
                            <tr>
                                <th>Nombre</th>
                                <th>Nivel</th>
                                <th>Categoria</th>
                            </tr>
                        </thead>
                        <tbody >
                            <?php
                            require_once "../System/Classes/Personaje.php";
                            require_once "../System/Classes/Categoria.php"; 
                            $personajes = new Personaje();
                            $id_parNull = null;
                            $id_master = 1;
                            $personajes = $personajes->viewPNJ($id_master, $id_parNull);
                            if (!empty($personajes)) {
                                foreach ($personajes as $row) {
                                    $id_cat = $row->getId_Categoria();
                                    $categoria = new Categoria();
                                    $categoria = $categoria->viewCar($id_cat);
                                    $cat = $categoria->getNombre();
                                    echo "<tr >
                                        <td class='text-capitalize text-success'>".$row->getNombre()."</td>
                                        <td class='text-capitalize text-success'>".$row->getNivel()."</td>
                                        <td class='text-capitalize text-success'>".$cat."</td>
                                        </tr >";
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
<?php include "../Public/layouts/footer.php";?> 
