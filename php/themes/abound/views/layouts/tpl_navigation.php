<script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/Actions.js' ></script>
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
    <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
     
          <!-- Be sure to leave the brand out there if you want it shown -->
          <a class="brand" href="#"><img width="40" style="margin-right: 10px;" src="<?php echo Yii::app()->request->baseUrl; ?>/img/general/logo-autosencuotas-gris.png"><small>Administrador de Sitios</small></a>
          
          <div class="nav-collapse">
			<?php $this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=>array('class'=>'pull-right nav'),
                    'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
					'itemCssClass'=>'item-test',
                    'encodeLabel'=>false,

                    'items'=>array(
                        
                        array('label'=>'Sitios', 'url'=>array('Sitios/admin')),
                        array('label'=>'Marcas', 'url'=>array('Marca/admin')),
                        array('label'=>'Chat', 'url'=>array('chat/admin')),
                        array('label'=>'Modelos <span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                              'items'=>array(
                                array('label'=>'Lista de Modelos', 'url'=>array('Modelo/admin')),
                                array('label'=>'Fichas Técnica', 'url'=>array('FichaTecnica/admin')),
                                array('label'=>'Equipamientos', 'url'=>array('Equipamientos/admin')),
                                array('label'=>'Colores', 'url'=>array('Colores/admin')),
                        )),

                        array('label'=>'Concesionarios <span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                              'items'=>array(
                                array('label'=>'Nuevo', 'url'=>array('Concesionarios/create')),
                                array('label'=>'Administrar', 'url'=>array('Concesionarios/admin')),
                                array('label'=>'Promos', 'url'=>array('Promos/admin')),
                        )),


                        array('label'=>'Publicaciones <span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                              'items'=>array(
                                array('label'=>'Lista de AC', 'url'=>array('PublicacionesAC/admin')),
                                array('label'=>'Lista Gral.', 'url'=>array('Publicaciones/admin')),
                                array('label'=>'Me Gusta.', 'url'=>array('MegustaPublicacion/admin')),
                                array('label'=>'Limpiar cache', 'url'=>array('Default/UpdateCache')),
                                array('label'=>'Actualizar Base', 'url'=>array('Default/UpdateBase')),
                                array('label'=>'Admin Facebook', 'url'=>array('Default/AdminFace')),
                        )),


                        array('label'=>'Planes <span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                              'items'=>array(
                                array('label'=>'Planes AC', 'url'=>array('TipoPlanAc/admin')),
                                array('label'=>'Planes Gral.', 'url'=>array('TipoPlan/admin')),
                        )),


                     
                        array('label'=>'Login', 'url'=>array('Default/login'), 'visible'=>Yii::app()->user->isGuest),
                        array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('Default/logout'), 'visible'=>!Yii::app()->user->isGuest),
                    ),
                )); ?>
    	</div>
    </div>
	</div>
</div>

