<?php
	require_once("./blogic/User.php");
	$user=new b_user();
	if($user->puede("buscar grupos",$_SESSION["permisos"])){
		$buscador="<form class='form-inline'><div class='form-inline'><input class='form-control mr-sm-2' type='search' placeholder='Buscar Grupos' aria-label='Buscar Grupos'><button class='btn btn-outline-light my-2 my-sm-0' onclick='location.href = 'search.php';' type='submit'>Buscar</button></div></form>";
	}else{
		$buscador="";
	}
	
	if($user->puede("manejar usuarios",$_SESSION["permisos"])){
		$users="<li class='px-3 py-2'><a href='users.php'>Usuarios</a></li>";
	}else{
		$users="";
	}
	
	if($user->puede("crear grupos",$_SESSION["permisos"])){
		$creargrupo="<li class='px-3 py-2'><a href='newgroup.php'>Crear Grupo</a></li>";
	}else{
		$creargrupo="";
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