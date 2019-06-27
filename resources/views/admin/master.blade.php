@extends('master')

@section('title')
  Admin | 
@endsection

@section('sidebar')
	<hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

       <hr class="sidebar-divider my-0">

      <li class="nav-item">
        <a class="nav-link" href="/admin/news">
          <i class="fas fa-newspaper"></i>
          <span>News</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">


      <li class="nav-item">
        <a class="nav-link" href="index.html">
          <i class="fas fa-users"></i>
          <span>Student</span></a>
      </li>

       <hr class="sidebar-divider my-0">

      <li class="nav-item">
        <a class="nav-link" href="/admin/teachers">
          <i class="fas fa-user-friends"></i>
          <span>Teacher</span></a>
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
          <i class="fab fa-wpforms"></i>
          <span>Regristation</span></a>
      </li>

       <hr class="sidebar-divider my-0">

      <li class="nav-item">
        <a class="nav-link" href="index.html">
          <i class="fas fa-clipboard-list"></i>
          <span>Student Attedance</span></a>
      </li>
@endsection

@section('content')