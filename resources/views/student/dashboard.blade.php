@extends('master')

@section('title', 'Student')

@section('sidebar')
	 <li class="nav-item">
    <a class="nav-link" href="index.html">
      <i class="fas fa-calendar-alt"></i>
      <span>Schedule</span></a>
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
		Ini Halaman Student
	</h5>
@endsection