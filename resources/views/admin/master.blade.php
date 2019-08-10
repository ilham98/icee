@extends('master')

@section('title')
  Admin | 
@endsection

@section('sidebar')
	<hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item {{ url()->current() === url('/dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

       <hr class="sidebar-divider my-0">

      <li class="nav-item {{ url()->current() === url('/news') ? 'active' : '' }}">
        <a class="nav-link" href="/news">
          <i class="fas fa-newspaper"></i>
          <span>News</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">


      <li class="nav-item {{ url()->current() === url('/students') ? 'active' : '' }}">
        <a class="nav-link" href="/students">
          <i class="fas fa-users"></i>
          <span>Student</span></a>
      </li>

       <hr class="sidebar-divider my-0">

      <li class="nav-item {{ url()->current() === url('/teachers') ? 'active' : '' }}">
        <a class="nav-link" href="/teachers">
          <i class="fas fa-user-friends"></i>
          <span>Teacher</span></a>
      </li>

       <hr class="sidebar-divider my-0">

      <li class="nav-item {{ url()->current() === url('/schedules') ? 'active' : '' }}">
        <a class="nav-link" href="/schedules" >
          <i class="fas fa-calendar-alt"></i>
          <span>Schedules</span></a>
      </li>

       <hr class="sidebar-divider my-0">

      <li class="nav-item {{ url()->current() === url('/schedule-registration') ? 'active' : '' }}">
        <a class="nav-link" href="/schedule-registration" >
          <i class="fab fa-wpforms"></i>
          <span>Schedule Regristation</span></a>
      </li>

       <hr class="sidebar-divider my-0">

      <li class="nav-item {{ url()->current() === url('/student-attendance') ? 'active' : '' }}">
        <a class="nav-link" href="/student-attendance">
          <i class="fas fa-clipboard-list"></i>
          <span>Student Attendance</span></a>
      </li>

      <hr class="sidebar-divider my-0">

      <li class="nav-item {{ url()->current() === url('/teacher-level') ? 'active' : '' }}">
        <a class="nav-link" href="/teacher-level">
          <i class="fas fa-clipboard-list"></i>
          <span>Teacher Level</span></a>
      </li>

      <li class="nav-item {{ url()->current() === url('/configurations') ? 'active' : '' }}">
        <a class="nav-link" href="/configurations">
          <i class="fas fa-clipboard-list"></i>
          <span>Configurations</span></a>
      </li>
@endsection

@section('content')