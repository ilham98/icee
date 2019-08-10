@extends('master')

@section('title')
  Teacher | 
@endsection

@section('sidebar')
    <li class="nav-item {{ url()->current() === url('/dashboard') ? 'active' : '' }}">
      <a class="nav-link" href="/dashboard">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

     <hr class="sidebar-divider my-0">

     <li class="nav-item {{ url()->current() === url('/interview') ? 'active' : '' }}">
      <a class="nav-link" href="/interview">
        <i class="fas fa-user"></i>
        <span>Interview</span></a>
    </li>

     <hr class="sidebar-divider my-0">

    <li class="nav-item {{ url()->current() === url('/pick-student') ? 'active' : '' }}">
      <a class="nav-link" href="/pick-student">
        <i class="fas fa-calendar-alt"></i>
        <span>Pick Student</span></a>
    </li>

     <hr class="sidebar-divider my-0">

    <li class="nav-item {{ url()->current() === url('/attendances') ? 'active' : '' }}">
      <a class="nav-link" href="/attendances">
        <i class="fas fa-clipboard-list"></i>
        <span>Attendances</span></a>
    </li>

    <hr class="sidebar-divider my-0">

     <li class="nav-item {{ url()->current() === url('/assignments') ? 'active' : '' }}">
      <a class="nav-link" href="/assignments">
        <i class="fas fa-clipboard-list"></i>
        <span>Assignment</span></a>
    </li>
@endsection

@section('content')