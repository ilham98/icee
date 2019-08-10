@extends('master')

@section('sidebar')
   <li class="nav-item">
    <a class="nav-link" href="/dashboard">
      <i class="fas fa-calendar-alt"></i>
      <span>Dashboard</span></a>
  </li>

   
   @if(Auth::user()->student()->whereHas('teachers', function($query) {
                return $query->where('student_teacher.type', 'A');
            })->first())
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
      <a class="nav-link" href="/assignments">
        <i class="fas fa-clipboard-list"></i>
        <span>Assignment</span></a>
    </li>
    @endif
  
@endsection

@section('content')