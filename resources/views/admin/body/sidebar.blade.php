@php

$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();

@endphp


<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
        <div class="user-profile">
			<div class="ulogo">
				 <a href="/dashboard">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">					 	
						  {{-- <img src="{{ asset('backend/images/smancar.png') }}" alt="" style="width: 90px; width: 90px; "> --}}
						  <h3><b>PENENTUAN KRITERIA SISWA BERPRESTASI SMA NEGERI 4 PALU </b> </h3>
					 </div>
				</a>
			</div>
        </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  
		  
		<li class="{{ ($route == 'dashboard')? 'active':'' }}">
          <a href="{{ route('dashboard') }}">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li>  
        
      @if (Auth::user()->role == 'Admin')  
        <li class="treeview {{ ($prefix == '/users')? 'active':'' }}" >
          <a href="#">
            <i data-feather="users"></i>
            <span>Manage User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('user.view') }}"><i class="ti-more"></i>View User</a></li>
            <li><a href="{{ route('user.add') }}"><i class="ti-more"></i>Add User</a></li>
          </ul>
        </li> 
      @endif
		  
        <li class="treeview {{ ($prefix == '/profile')? 'active':'' }}">
          <a href="#">
            <i data-feather="user-check"></i> <span>Manage Profile</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('profile.view') }}"><i class="ti-more"></i>Your Profil</a></li>
            <li><a href="{{ route('password.view') }}"><i class="ti-more"></i>Change Password</a></li>

          </ul>
        </li>

        <li class="treeview {{ ($prefix == '/setup')? 'active':'' }}">
          <a href="#">
            <i data-feather="archive"></i> <span>Setup Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('bobot') }}"><i class="ti-more"></i>Bobot</a></li>
            <li><a href="{{ route('siswa') }}"><i class="ti-more"></i>Siswa</a></li>
            <li><a href="{{ route('school.subject.view') }}"><i class="ti-more"></i>Mata Pelajaran </a></li>
            <li><a href="{{ route('nilai.siswa.view') }}"><i class="ti-more"></i>Nilai siswa</a></li>
            {{-- <li><a href="{{ route('siswa.view.prestasi') }}"><i class="ti-more"></i>Siswa Prestasi</a></li>  --}}
            
            {{-- <li><a href="{{ route('student.class.view') }}"><i class="ti-more"></i>Student Class</a></li>
            <li><a href="{{ route('student.year.view') }}"><i class="ti-more"></i>Student Year</a></li>
            <li><a href="{{ route('student.group.view') }}"><i class="ti-more"></i>Student Group</a></li>
            <li><a href="{{ route('student.shift.view') }}"><i class="ti-more"></i>Student Shift</a></li>
            <li><a href="{{ route('fee.category.view') }}"><i class="ti-more"></i>Fee Category</a></li>
            <li><a href="{{ route('fee.amount.view') }}"><i class="ti-more"></i>Fee Category Amount</a></li>
            <li><a href="{{ route('exam.type.view') }}"><i class="ti-more"></i>Exam Type </a></li>
            <li><a href="{{ route('school.subject.view') }}"><i class="ti-more"></i>Mata Pelajaran </a></li>
            <li><a href="{{ route('assign.subject.view') }}"><i class="ti-more"></i>Assign Subject </a></li>
            <li><a href="{{ route('designation.view') }}"><i class="ti-more"></i>Designation </a></li> --}}

          </ul>
        </li>

        <li class="treeview {{ ($prefix == '/prestasi')? 'active':'' }}">
          <a href="#">
            <i data-feather="award"></i> <span>Siswa Prestasi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('siswa.view.prestasi.ipa') }}"><i class="ti-more"></i>IPA</a></li>
            <li><a href="{{ route('siswa.view.prestasi.ips') }}"><i class="ti-more"></i>IPS</a></li>

          </ul>
        </li>


        {{-- <li class="treeview {{ ($prefix == '/students')? 'active':'' }}">
          <a href="#">
            <i data-feather="briefcase"></i> <span>Setudent Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('student.registration.view') }}"><i class="ti-more"></i>Student Registration</a></li>
            <li><a href="{{ route('roll.generate.view') }}"><i class="ti-more"></i>Roll Generate</a></li>
            <li><a href="{{ route('registration.fee.view') }}"><i class="ti-more"></i>Registration Fee</a></li>
            <li><a href="{{ route('monthly.fee.view') }}"><i class="ti-more"></i>Monthly Fee</a></li>
            <li><a href="{{ route('exam.fee.view') }}"><i class="ti-more"></i>Exam Fee</a></li>

          </ul>
        </li>

        <li class="treeview {{ ($prefix == '/employees')? 'active':'' }}">
          <a href="#">
            <i data-feather="briefcase"></i> <span>Employee Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('employee.registration.view') }}"><i class="ti-more"></i>Employee Registration</a></li>
            <li><a href="{{ route('employee.salary.view') }}"><i class="ti-more"></i>Employee Salary</a></li>
            <li><a href="{{ route('employee.leave.view') }}"><i class="ti-more"></i>Employee Leave</a></li>
            <li><a href="{{ route('employee.attendance.view') }}"><i class="ti-more"></i>Employee Attendance</a></li>
            <li><a href="{{ route('employee.monthly.salary') }}"><i class="ti-more"></i>Employee Monthly Salary</a></li>
          </ul>
        </li> --}}
			  
		 
        {{-- <li class="header nav-small-cap">User Interface</li>
		  
        <li class="treeview">
          <a href="#">
            <i data-feather="grid"></i>
            <span>Components</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
            <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>
            
          </ul>
        </li>
		 --}}
        </li>  
		  
        
      </ul>
    </section>
	
	<div class="sidebar-footer">
		<!-- item-->
	
	</div>
  </aside>