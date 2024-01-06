		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="{{ asset('backend/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">Rukada</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="{{ route('admin.dashboard') }}" class="">
						<div class="parent-icon"><i class='bx bx-home-circle'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
				</li>


				<li class="menu-label">Product Management</li>
				 <!-- Brand Menu Items -->
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bxs-package'></i>
						</div>
						<div class="menu-title">Brand</div>
					</a>
					<ul>
						<li> 
							<a href="{{ route('brand.manage') }}"><i class="bx bx-right-arrow-alt"></i>Manage Brands</a>
						</li>
						<li> 
							<a href="{{ route('brand.create') }}"><i class="bx bx-right-arrow-alt"></i>Add New Brand</a>
						</li>
					</ul>
				</li>

				<!-- Category Menu Items -->
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-category'></i>
						</div>
						<div class="menu-title">Category</div>
					</a>
					<ul>
						<li> 
							<a href="{{ route('category.manage') }}"><i class="bx bx-right-arrow-alt"></i>Manage Category</a>
						</li>
						<li> 
							<a href="{{ route('category.create') }}"><i class="bx bx-right-arrow-alt"></i>Add New Category</a>
						</li>
					</ul>
				</li>

				<!-- Product Menu Items -->
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-shopping-bag'></i>
						</div>
						<div class="menu-title">Product</div>
					</a>
					<ul>
						<li> 
							<a href="app-emailbox.html"><i class="bx bx-right-arrow-alt"></i>Manage Product</a>
						</li>
						<li> 
							<a href="app-chat-box.html"><i class="bx bx-right-arrow-alt"></i>Add New Product</a>
						</li>
					</ul>
				</li>


				<li class="menu-label">Marketing Tools</li>

				<!-- Coupon code Menu Items -->
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bxs-coupon'></i>
						</div>
						<div class="menu-title">Coupon code</div>
					</a>
					<ul>
						<li> 
							<a href="app-emailbox.html"><i class="bx bx-right-arrow-alt"></i>Manage Coupon</a>
						</li>
						<li> 
							<a href="app-chat-box.html"><i class="bx bx-right-arrow-alt"></i>Add New Coupon</a>
						</li>
					</ul>
				</li>

				<!-- Advertisement Menu Items -->
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-slideshow'></i>
						</div>
						<div class="menu-title">Advertisement</div>
					</a>
					<ul>
						<li> 
							<a href="app-emailbox.html"><i class="bx bx-right-arrow-alt"></i>Manage Advertisements</a>
						</li>
						<li> 
							<a href="app-chat-box.html"><i class="bx bx-right-arrow-alt"></i>Add New Advertisement</a>
						</li>
					</ul>
				</li>

				<!-- Customers list Menu Items -->
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-user-voice'></i>
						</div>
						<div class="menu-title">Customers</div>
					</a>
					<ul>
						<li> 
							<a href="app-emailbox.html"><i class="bx bx-right-arrow-alt"></i>All Customer</a>
						</li>
					</ul>
				</li>

				
				<li class="menu-label">Order Management</li>
				<!-- Customers list Menu Items -->
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-bar-chart-alt'></i>
						</div>
						<div class="menu-title">Order</div>
					</a>
					<ul>
						<li> 
							<a href="app-emailbox.html"><i class="bx bx-right-arrow-alt"></i>Manage Orders</a>
						</li>
					</ul>
				</li>

				<!-- Wishlist list Menu Items -->
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-bookmark-heart"></i>
						</div>
						<div class="menu-title">Wishlist</div>
					</a>
					<ul>
						<li> 
							<a href="app-emailbox.html"><i class="bx bx-right-arrow-alt"></i>Manage Wishlist</a>
						</li>
					</ul>
				</li>


				<li class="menu-label">Shipping Management</li>
				<!-- Country Menu Items -->
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-current-location'></i>
						</div>
						<div class="menu-title">Country</div>
					</a>
					<ul>
						<li> 
							<a href="{{ route('country.create') }}"><i class="bx bx-right-arrow-alt"></i>Add New Country</a>
						</li>
						<li> 
							<a href="{{ route('country.manage') }}"><i class="bx bx-right-arrow-alt"></i>Manage All Country</a>
						</li>
					</ul>
				</li>

				<!-- District Menu Items -->
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-map-pin'></i>
						</div>
						<div class="menu-title">District</div>
					</a>
					<ul>
						<li> 
							<a href="{{ route('district.create') }}"><i class="bx bx-right-arrow-alt"></i>Add New District</a>
						</li>
						<li> 
							<a href="{{ route('district.manage') }}"><i class="bx bx-right-arrow-alt"></i>Manage District</a>
						</li>
					</ul>
				</li>

				<!-- State Menu Items -->
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-store-alt'></i>
						</div>
						<div class="menu-title">State</div>
					</a>
					<ul>
						<li> 
							<a href="{{ route('state.create') }}"><i class="bx bx-right-arrow-alt"></i>Add New State</a>
						</li>
						<li> 
							<a href="{{ route('state.manage') }}"><i class="bx bx-right-arrow-alt"></i>Manage States</a>
						</li>
					</ul>
				</li>


				<li class="menu-label">Platform Setting</li>
				<!-- Platform Setting -->
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-cog'></i>
						</div>
						<div class="menu-title">Setting</div>
					</a>
					<ul>
						<li> 
							<a href="app-chat-box.html">
							    <i class="bx bx-right-arrow-alt"></i>General Settings
						   </a>
						</li>
						<li> 
							<a href="app-emailbox.html">
								<i class="bx bx-right-arrow-alt"></i>Currency Settings
							</a>
						</li>
						<li> 
							<a href="app-emailbox.html">
								<i class="bx bx-right-arrow-alt"></i>Social Media
							</a>
						</li>
					</ul>
				</li>


				<li class="menu-label">Reports</li>
				<!-- Reports  -->
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bxs-report'></i>
						</div>
						<div class="menu-title">Report</div>
					</a>
					<ul>
						<li> 
							<a href="app-chat-box.html">
								<i class="bx bx-right-arrow-alt"></i>Selling Reports
						</a>
						</li>
						<li> 
							<a href="app-emailbox.html">
								<i class="bx bx-right-arrow-alt"></i>Product Reports
							</a>
						</li>
					</ul>
				</li>
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->