<!-- Vertical -->
<style>
	.nav {
	position: relative;
	margin: 0px;
	width: 260px;
    background: #fff;
    height: 100%;
}
.nav ul {
	list-style: none;
	margin: 0;
	padding: 0;
}
.nav ul li {
  /* Sub Menu */
}
.nav ul li a {
	display: block;
	padding: 10px 15px;
	color: #fff;
	text-decoration: none;
	-webkit-transition: 0.2s linear;
	-moz-transition: 0.2s linear;
	-ms-transition: 0.2s linear;
	-o-transition: 0.2s linear;
	transition: 0.2s linear;
}
.nav ul li a:hover {
	background: #1d4f71;
	color: #fff;
}
.nav ul li a .fa {
	width: 16px;
	text-align: center;
	margin-right: 5px;
	float:right;
}
.nav ul li a .fa.left {
	width: 16px;
	text-align: center;
	margin-right: 7px;
	vertical-align: bottom;
	float:left;
}
.nav ul ul {
	background: rgba(0, 0, 0, 0.2);
}
.nav ul li ul li a {
	
	border-left: 4px solid transparent;
	padding: 10px 20px;
}
.nav ul li ul li a:hover {
	border-left: 4px solid #3498db;
}
</style>


<div class='nav animated bounceInDown bg-dark h-100 d-inline-block' >
	<ul>
		<li><a href="<?php echo $home.'app/investigadores'; ?>"><i class="fa fa-home left"></i> Inicio</a></li>
		<li class='sub-menu'><a href="#">Catálogos <div class='fa fa-caret-down right'></div></a>
			<ul id="submenu-catalogos">
				<li><a href="<?php echo $home.'app/semestre'; ?>">Semestre</a></li>
				<li><a href="<?php echo $home.'estudiantes'; ?>">Aspirantes</a></li>
				<li><a href="<?php echo $home.'estudiantes'; ?>">Estudiantes</a></li>
				<li><a href="<?php echo $home.'investigadores'; ?>">Investigadores</a></li>
				<li><a href="<?php echo $home.'proyectos'; ?>">Proyectos</a></li>
			</ul>
		</li>
		<li class='sub-menu'><a href='#'>Proyecto<div class='fa fa-caret-down right'></div></a>
			<ul>
				<li><a href="<?php echo $home.'app/investigadores/proyecto'; ?>">Mis Proyectos</a></li>
			</ul>
		</li>
		<li class='sub-menu'><a href='#message'>Help<div class='fa fa-caret-down right'></div></a>
			<ul>
				<li><a href='#settings'>FAQ's</a></li>
				<li><a href='#settings'>Submit a Ticket</a></li>
				<li><a href='#settings'>Network Status</a></li>
			</ul>
		</li>
		<li class="align-bottom"><a href="<?php echo $home.'ingreso/logout.php'; ?>"><i class="fa fa-power-off left"></i> Salir</a></li>
	</ul>
</div>
<script>
        $('.sub-menu ul').hide();
        $(".sub-menu a").click(function () {
            $(this).parent(".sub-menu").children("ul").slideToggle("100");
            $(this).find(".right").toggleClass("fa-caret-up fa-caret-down");
        });
 </script>