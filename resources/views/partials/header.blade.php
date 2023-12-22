<!-- BEGIN HEADER-->
<header id="header" style="background: #0f1f31" >
	<div class="headerbar">
		<div class="headerbar-left">
			<ul class="header-nav header-nav-options">
				<li class="header-nav-brand" >
					<div class="brand-holder">
						<a href="javascript:void(0)">
							<span class="text-lg text-bold text-primary">Auditor <strong>Plus</strong></span>
						</a>
					</div>
				</li>
			</ul>
		</div>
		<div class="title-fac">
			<div class="col-sm-4 div-img-right" style="">
				<img src="{{ asset('img/logo_fac.png') }}">
			</div>
			<div class="col-sm-4">				
				<h5 class="tittleHeadFAC">FUERZA AÉREA COLOMBIANA</h5>
				<h5 class="subTittleHeadFAC">Jefatura de Operaciones Logisticas / SECAD</h5>				
			</div>
			<div class="col-sm-4 div-img-left">
				<img src="{{ asset('img/logo_secad.png') }}">
			</div>
		</div>
		<div class="headerbar-right">
			<ul class="header-nav header-nav-profile">
				<li class="dropdown">
					<a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
						<span class="profile-info">							
							{{ auth()->user()->nombre_completo }}
							<small>SECAD-FAC</small>							
						</span>
					</a>
					<ul class="dropdown-menu animation-dock">
						<li class="dropdown-header">Configuración</li>
						<li><a href="javascript:void(0)">Mi Perfil</a></li>
						<li class="divider"></li>
						<div class="panel-footer">
							<form action="{{ route('logout') }}" method="POST">
								{{csrf_field()}}
								<button class="btn btn-danger btn-xs btn-block">Cerrar sessión</button>
							</form>
						</div>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</header>
<!-- END HEADER-->