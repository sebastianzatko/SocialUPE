<?php
	require_once("./blogic/User.php");
	$user=new b_user();
	if($user->puede("buscar grupos",$_SESSION["permisos"])){
		$buscador="<form class='form-inline' action='search.php' method='GET'><div class='form-inline'><input class='form-control mr-sm-2' name='busqueda' type='search' placeholder='Buscar Grupos' aria-label='Buscar Grupos'><button class='btn btn-outline-light my-2 my-sm-0' type='submit'>Buscar</button></div></form>";
	}else{
		$buscador="";
	}
	
	if($user->puede("manejar usuarios",$_SESSION["permisos"])){
		$users="<li class='px-3 py-2'><a href='users.php'>Usuarios</a></li>";
	}else{
		$users="";
	}
	
	if($user->puede("crear grupos",$_SESSION["permisos"])){
		$creargrupo="<li class='px-3 py-2'><a data-toggle='modal' href='' data-target='#nuevogrupo' >Crear Grupo</a></li>";
		require "blogic/Carrera.php";
		$carreras=new Carrera();
		$lista=$carreras->obtenerCarreras();
		$total="";
		foreach($lista as $item){
			$total=$total."<option value='".$item[0]."' >".$item[1]."</option>";
		}
		$modalcrear="
		<div id='nuevogrupo' class='modal fade'>

						<div class='modal-dialog'>
				
								<div class='modal-content'>
												
										<div class='modal-header'>
												<h3 class='modal-title'>Nuevo Grupo</h3>
												<button type='button' class='close' data-dismiss='modal'>&times;</button>
												
										</div>
										<div class='modal-body'>
												<form accept-charset='UTF-8' action='includes/php/processnewgrupo.php' method='POST' role='form' id='frmCrearGrupo'>
												<fieldset>
													<div class='form-group'>
														<label>Nombre del grupo: </label><input class='form-control' placeholder='Nombre del grupo' name='nombreGrupo' type='text' required>
													</div>
													<div class='form-group'>
														<label>Carrera del grupo:</label>
														<select class='form-control' name='carrera' required >
															".$total."
														</select>
													</div>
													
										</div>
										<div class='modal-footer'>
												<button  type='submit' id='btnCrearGrupo' class='btn btn-lg btn-success btn-block'>Crear nuevo grupo</button>
												</fieldset>
												</form> 
											</div>
										</div>
									</div>
					</div>";
					$scriptcreargrupo="<script src='includes/js/newgroup.js'></script>";
	}else{
		$creargrupo="";
		$modalcrear="";
		$scriptcreargrupo="";
	}
	
	$modalinvitacionesgrupo="";
	
	if($user->puede("publicar en muro principal",$_SESSION["permisos"])){
		$modalpublicacionprincipal="
		<div id='nuevapublicacionprincipal' class='modal fade'>

						<div class='modal-dialog'>
				
								<div class='modal-content'>
												
										<div class='modal-header'>
												<h3 class='modal-title'>Publicar Noticia de la Universidad</h3>
												<button type='button' class='close' data-dismiss='modal'>&times;</button>
												
										</div>
										<div class='modal-body'>
												<form id='formpublicacionprincipal' action='includes/php/processnewpublicacionprincipal.php' method='POST'>
													<fieldset>
														
															<textarea required minlength='5' maxlength='500' cols='64' rows='10' id='publicacionprincipal' name='publicacionprincipal' class='form-control message' style='height: 62px; overflow: hidden;' placeholder='What's on your mind ?'></textarea>
														
													
										</div>
										<div class='modal-footer'>
												<button  type='submit' id='btnCrearpublicacion' class='btn btn-lg btn-success btn-block'>Crear nuevo grupo</button>
												</fieldset>
												</form> 
											</div>
										</div>
									</div>
					</div>";
		
		
		$publicar="<li class='px-3 py-2'><a data-toggle='modal' href='' data-target='#nuevapublicacionprincipal' >Publicar</a></li>";
		$scriptpublicarprincipal="<script src='includes/js/newpublicarprincipal.js'></script>";
		
	}else{
		$modalpublicacionprincipal="";
		$publicar="";
		$scriptpublicarprincipal="";
	}
	
	
	
	$htmlmenu="<nav class='navbar navbar-expand-lg navbar-dark bg-primary ' role='navigation'>
									
					<a class='navbar-brand' href='home.php'>SocialUPE</a>
					<button class='navbar-toggler border-0' type='button' data-toggle='collapse' data-target='#exCollapsingNavbar'>
						&#9776;
					</button>
					<div class='collapse navbar-collapse' id='exCollapsingNavbar'>
						<ul class='nav navbar-nav'>
							<!--<li class='nav-item'><a href='#' class='nav-link'>Ayuda</a></li>-->
							<!---->
								
									
								".$buscador."	
								
							<!---->

						</ul>
						<ul class='nav navbar-nav flex-row justify-content-between ml-auto'>
							<li class='nav-item order-2 order-md-1'><a href='#' class='nav-link' title='settings'><i class='fa fa-cog fa-fw fa-lg'></i></a></li>
							<li class='dropdown order-1'>
								<button type='button' id='dropdownMenu1' data-toggle='dropdown' class='btn btn-outline-secondary dropdown-toggle text-white'>Opciones <span class='caret'></span></button>
								<ul class='dropdown-menu dropdown-menu-right mt-2'>
									".$users."
									
									".$creargrupo."
									
									 <li class='px-3 py-2'>
									
										 <a href='login.php'>Cerrar Sesion</a>
					
									</li>
									
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</nav>";

?>