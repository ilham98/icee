@extends('master')

@section('title', 'Teacher')

@section('sidebar')
	<li class="nav-item active">
	    <a class="nav-link" href="index.html">
	      <i class="fas fa-fw fa-tachometer-alt"></i>
	      <span>Dashboard</span></a>
	  </li>

	   <hr class="sidebar-divider my-0">

	  <li class="nav-item">
	    <a class="nav-link" href="index.html">
	      <i class="fas fa-calendar-alt"></i>
	      <span>Schedule</span></a>
	  </li>

	   <hr class="sidebar-divider my-0">

	  <li class="nav-item">
	    <a class="nav-link" href="index.html">
	      <i class="fas fa-clipboard-list"></i>
	      <span>Attedance</span></a>
	  </li>

	  <hr class="sidebar-divider my-0">

	   <li class="nav-item">
	    <a class="nav-link" href="index.html">
	      <i class="fas fa-clipboard-list"></i>
	      <span>Assignment</span></a>
	  </li>
@endsection

@section('content')
	<h5>
		Ini Halaman Teacher
	</h5>
@endsection