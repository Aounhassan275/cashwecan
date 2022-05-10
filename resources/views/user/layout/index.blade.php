<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>USER PANEL | CASH WE CAN</title>
    <link rel="shortcut icon" type="image/png" href="{{asset('front/image/favicon.png')}}">
	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{asset('user_asset/global_assets/css/icons/icomoon/styles.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('user_asset/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('user_asset/assets/css/bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('user_asset/assets/css/layout.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('user_asset/assets/css/components.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('user_asset/assets/css/colors.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('user_asset/assets/css/toastr.css')}}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->
	

	<!-- Core JS files -->
	<script src="{{asset('user_asset/global_assets/js/main/jquery.min.js')}}"></script>
	<script src="{{asset('user_asset/global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('user_asset/global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{asset('user_asset/global_assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>
	<script src="{{asset('user_asset/global_assets/js/plugins/extensions/jquery_ui/interactions.min.js')}}"></script>

	<script src="{{asset('user_asset/global_assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>
	<script src="{{asset('user_asset/global_assets/js/demo_pages/form_select2.js')}}"></script>

	<script src="{{asset('user_asset/global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
    <script src="{{asset('user_asset/global_assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
    
	<script src="{{asset('user_asset/global_assets/js/plugins/visualization/d3/d3.min.js')}}"></script>
	<script src="{{asset('user_asset/global_assets/js/plugins/visualization/d3/d3_tooltip.js')}}"></script>
	<script src="{{asset('user_asset/global_assets/js/plugins/forms/styling/switchery.min.js')}}"></script>
	<script src="{{asset('user_asset/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js')}}"></script>
	<script src="{{asset('user_asset/global_assets/js/plugins/ui/moment/moment.min.js')}}"></script>
	<script src="{{asset('user_asset/global_assets/js/plugins/pickers/daterangepicker.js')}}"></script>

	<script src="{{asset('user_asset/assets/js/app.js')}}"></script>
	<script src="{{asset('user_asset/global_assets/js/demo_pages/datatables_basic.js')}}"></script>
	<script src="{{asset('user_asset/global_assets/js/demo_pages/form_layouts.js')}}"></script>
	<script src="{{asset('user_asset/global_assets/js/demo_pages/dashboard.js')}}"></script>
	<!-- /theme JS files -->
	
	<!-- Theme JS files -->
	<script src="{{asset('user_asset/global_assets/js/plugins/editors/summernote/summernote.min.js')}}"></script>
	<script src="{{asset('user_asset/global_assets/js/demo_pages/editor_summernote.js')}}"></script>
	<!-- /theme JS files -->

	@yield('styles')
</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-dark">
		<div class="navbar-brand">
			<a href="{{url('/')}}" class="text-light">
				<h1 class="m-0"><b>USER PANEL MENU</b></h1>
    <!--            <img src="{{asset('2.jpeg')}}" style="width: 207px;-->
    <!--height: 46px;" alt="">-->
			</a>
		</div>

		<div class="d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>
			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-paragraph-justify3"></i>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="navbar-mobile">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
						<i class="icon-paragraph-justify3"></i>
					</a>
				</li>
			</ul>

			<span class="badge bg-success ml-md-3 mr-md-auto">Cash Wallet : $ {{Auth::user()->cash_wallet}}</span>
			<span class="badge bg-teal ml-md-3 ">
				{{Auth::user()->type}}
			</span>
			<ul class="navbar-nav">



				<li class="nav-item dropdown dropdown-user">
					<a href="" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
						<img src="{{asset(Auth::user()->image)}}" class="rounded-circle mr-2" height="34" alt="">
						<span>{{Auth::user()->name}}</span>
					</a>

					<div class="dropdown-menu dropdown-menu-right">
						{{-- <div class="dropdown-divider"></div> --}}
						<a href="{{route('user.user.index')}}" class="dropdown-item"><i class="icon-cog5"></i> Account settings</a>
						<a href="{{route('user.logout')}}" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center">
				<a href="#" class="sidebar-mobile-main-toggle">
					<i class="icon-arrow-left8"></i>
				</a>
				Navigation
				<a href="#" class="sidebar-mobile-expand">
					<i class="icon-screen-full"></i>
					<i class="icon-screen-normal"></i>
				</a>
			</div>
			<!-- /sidebar mobile toggler -->


			<!-- Sidebar content -->
			<div class="sidebar-content">

				<!-- User menu -->
				<div class="sidebar-user">
					<div class="card-body">
						<div class="media">
							<div class="mr-3">
								<a href="#"><img src="{{asset(Auth::user()->image)}}" width="38" height="38" class="rounded-circle" alt=""></a>
							</div>

							<div class="media-body">
							<div class="media-title font-weight-semibold">{{Auth::user()->name}}</div>
								<div class="font-size-xs opacity-50">CASHWECAN Inc.
								</div>
							</div>

							<div class="ml-3 align-self-center">
								<a href="{{route('user.user.index')}}" class="text-white"><i class="icon-cog3"></i></a>
							</div>
						</div>
					</div>
				</div>
				<!-- /user menu -->


				<!-- Main navigation -->
				<div class="card card-sidebar-mobile">
					<ul class="nav nav-sidebar" data-nav-type="accordion">
					    
							<!-- Main -->
						<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">User Panel</div> <i class="icon-menu" title="Main"></i></li>
						<li class="nav-item">
							<a href="{{route('user.dashboard.index')}}" class="nav-link {{Request::is('user/dashboard')?'active':''}}">
								<i class="icon-home4"></i>
								<span>Dashboard</span>
							</a>
						</li>
						<li class="nav-item nav-item-submenu {{Request::is('user/package*')?'nav-item-open':''}}">
							<a href="#" class="nav-link"><i class="icon-store"></i> <span>Package</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="Layouts" style="{{Request::is('user/package*')?'display:block':''}}">
								<li class="nav-item"><a href="{{route('user.package.index')}}" class="nav-link {{Request::is('user/package')?'active':''}}">Buy New Package</a></li>
								<li class="nav-item"><a href="{{route('user.package.history')}}" class="nav-link {{Request::is('user/package/history')?'active':''}}">Package History</a></li>
							</ul>
						</li>
						{{-- <li class="nav-item nav-item-submenu {{Request::is('user/pin*')?'nav-item-open':''}}">
							<a href="#" class="nav-link"><i class="icon-coin-dollar"></i> <span>Pin</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="Layouts" style="{{Request::is('user/pin*')?'display:block':''}}">
								<li class="nav-item"><a href="{{route('user.pin.index')}}" class="nav-link {{Request::is('user/pin')?'active':''}}">Create Own Pin</a></li>
								<li class="nav-item"><a href="{{route('user.pin.used')}}" class="nav-link {{Request::is('user/pin/used')?'active':''}}">Pin You Used</a></li>
							</ul>
						</li> --}}
						<li class="nav-item nav-item-submenu {{Request::is('user/withdraw*')?'nav-item-open':''}}">
							<a href="#" class="nav-link"><i class="icon-cart-remove"></i> <span>Withdraw</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="Layouts" style="{{Request::is('user/withdraw*')?'display:block':''}}">
								<li class="nav-item"><a href="{{route('user.withdraw.create')}}" class="nav-link {{Request::is('user/withdraw/create')?'active':''}}">Create</a></li>
								<li class="nav-item"><a href="{{route('user.withdraw.index')}}" class="nav-link {{Request::is('user/withdraw')?'active':''}}">History</a></li>
							</ul>
						</li>
						<li class="nav-item nav-item-submenu {{Request::is('user/earning*')?'nav-item-open':''}}">
							<a href="#" class="nav-link"><i class="icon-credit-card2"></i> <span>Earning</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="Layouts" style="{{Request::is('user/earning*')?'display:block':''}}">
								<li class="nav-item"><a href="{{route('user.earning.direct_income')}}" class="nav-link {{Request::is('user/earning/direct_income')?'active':''}}">Direct</a></li>
								<li class="nav-item"><a href="{{route('user.earning.direct_team_income')}}" class="nav-link {{Request::is('user/earning/direct_team_income')?'active':''}}">Direct Team</a></li>
								<li class="nav-item"><a href="{{route('user.earning.upline_income')}}" class="nav-link {{Request::is('user/earning/upline_income')?'active':''}}">Upline</a></li>
								<li class="nav-item"><a href="{{route('user.earning.down_line_income')}}" class="nav-link {{Request::is('user/earning/down_line_income')?'active':''}}">Downline</a></li>
								<li class="nav-item"><a href="{{route('user.earning.upline_placement_income')}}" class="nav-link {{Request::is('user/earning/upline_placement_income')?'active':''}}">Upline Placement</a></li>
								<li class="nav-item"><a href="{{route('user.earning.down_line_placement_income')}}" class="nav-link {{Request::is('user/earning/down_line_placement_income')?'active':''}}">Downline Placement</a></li>
								<li class="nav-item"><a href="{{route('user.earning.trade_income')}}" class="nav-link {{Request::is('user/earning/trade_income')?'active':''}}">Trade</a></li>
								<li class="nav-item"><a href="{{route('user.earning.ranking_income')}}" class="nav-link {{Request::is('user/earning/ranking_income')?'active':''}}">Ranking</a></li>
								<li class="nav-item"><a href="{{route('user.earning.associated_income')}}" class="nav-link {{Request::is('user/earning/associated_income')?'active':''}}">Associated</a></li>
							</ul>
						</li>
						<li class="nav-item">
							<a href="{{route('user.report.overall_earning')}}" class="nav-link {{Request::is('user/report/overall_earning')?'active':''}}">
								<i class="icon-reading"></i>
								<span>Overall Earning Report</span>
							</a>
						</li>	
						<li class="nav-item">
							<a href="{{route('user.deposit.index')}}" class="nav-link {{Request::is('user/deposit')?'active':''}}">
								<i class="icon-cart2"></i>
								<span>Deposit</span>
							</a>
						</li>	
						<li class="nav-item nav-item-submenu {{Request::is('user/refer*')?'nav-item-open':''}}">
							<a href="#" class="nav-link"><i class="icon-users4"></i> <span>Referral</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="Layouts" style="{{Request::is('user/refer*')?'display:block':''}}">
								<li class="nav-item"><a href="{{route('user.refer.index')}}" class="nav-link {{Request::is('user/refer')?'active':''}}">Direct Referral</a></li>
								<li class="nav-item"><a href="{{route('user.tree.show')}}" class="nav-link {{Request::is('user/refer/tree')?'active':''}}">Your Tree</a></li>
							</ul>
						</li>
						<li class="nav-item">
							<a href="{{route('user.balance_transfer.index')}}" class="nav-link {{Request::is('user/balance_transfer')?'active':''}}">
								<i class="icon-transmission"></i>
								<span>Balance Transfer</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{route('user.transcation.index')}}" class="nav-link {{Request::is('user/transcation')?'active':''}}">
								<i class="icon-tab"></i>
								<span>Transcations</span>
							</a>
						</li>	
						<li class="nav-item nav-item-submenu {{Request::is('user/product*')?'nav-item-open':''}}">
							<a href="#" class="nav-link"><i class="icon-stack3"></i> <span>Product</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="Layouts" style="{{Request::is('user/product*')?'display:block':''}}">
								<li class="nav-item"><a href="{{route('user.product.create')}}" class="nav-link {{Request::is('user/product.create')?'active':''}}">Add Products</a></li>
								<li class="nav-item"><a href="{{route('user.product.index')}}" class="nav-link {{Request::is('user/product')?'active':''}}">Manage</a></li>
							</ul>
						</li>
						<li class="nav-item">
							<a href="{{route('user.chat.index')}}" class="nav-link {{Request::is('user/chat')?'active':''}}">
								<i class="icon-mail-read"></i>
								<span>Chat</span>
							</a>
						</li>
						
						<!-- /page kits -->

						
					</ul>
				</div>
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->
			
		</div>
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header page-header-light">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
					<h4><a href="{{route('user.dashboard.index')}}"><i class="icon-arrow-left52 mr-2"></i></a> <span class="font-weight-semibold">@yield('title')</span></h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

					<div class="header-elements d-none">
						<div class="d-flex justify-content-center">

							<a href="#" class="btn btn-float mt-3">
								<h4><span id="ct" class="font-weight-semibold"></span></h4>
							</a>
						</div>
					</div>
				</div>
			</div>
			<!-- /page header -->


			<!-- Content area -->
			<div class="content">

				@yield('contents')

			</div>
			<!-- /content area -->


			<!-- Footer -->
			<div class="navbar navbar-expand-lg navbar-light">
				<div class="text-center d-lg-none w-100">
					<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
						<i class="icon-unfold mr-2"></i>
						Footer
					</button>
				</div>

				<div class="navbar-collapse collapse" id="navbar-footer">
					<span class="navbar-text ml-lg-auto">
						
					</span>
				</div>
			</div>
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->


	<script src="{{asset('user_asset/assets/js/toastr.js')}}"></script>
	@toastr_render
	@yield('scripts')
</body>
</html>
