@extends('master')

@section('sidebar')
   <li class="nav-item">
    <a class="nav-link" href="/dashboard">
      <i class="fas fa-calendar-alt"></i>
      <span>Dashboard</span></a>
  </li>

   <hr class="sidebar-divider my-0">

  <li class="nav-item">
    <a class="nav-link" href="/assignments">
      <i class="fas fa-clipboard-list"></i>
      <span>Assignment</span></a>
  </li>
@endsection

@section('content')