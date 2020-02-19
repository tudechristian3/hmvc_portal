<!DOCTYPE html>
<html lang="en">
     <head>
          <title>National Insurance Association - <?php echo ucwords(($this->router->fetch_class() == 'leadorder') ? 'Lead Order' : $this->router->fetch_class()); ?></title>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <!-- Main CSS-->
          <link rel="stylesheet" type="text/css" href="<?php echo base_url('static/css/main.css'); ?>">
          <link rel="stylesheet" type="text/css" href="<?php echo base_url('static/css/jquery-confirm.css'); ?>">
          <link rel="stylesheet" type="text/css" href="<?php echo base_url('static/css/style.css'); ?>">
          <link rel="stylesheet" type="text/css" href="<?php echo base_url('static/css/bootstrap-timepicker.min.css'); ?>">
          <?php if($this->router->fetch_class() == 'dashboard' && $this->router->fetch_method() == 'details'): ?>
               <link rel="stylesheet" type="text/css" href="<?php echo base_url('static/css/facelift.css'); ?>">
               <link rel="stylesheet" type="text/css" href="<?php echo base_url('static/css/common.css'); ?>">
          <?php endif; ?>
          <?php if($this->router->fetch_class() == 'dashboard' && $this->router->fetch_method() == 'lead'): ?>
               <link rel="stylesheet" type="text/css" href="<?php echo base_url('static/css/fullCalendar.css'); ?>">
               <link rel="stylesheet" type="text/css" href="<?php echo base_url('static/css/fullCalendarprint.css'); ?>">

               <style>
                    table.fc-border-separate{
                         border:1px solid rgba(0,0,0,0.1);
                    }
                    tr.fc-week > td{
                         border:1px solid rgba(0,0,0,0.1);
                    }
                    tr.fc-week > td:hover {
                         background-color: #009688;
                         cursor: pointer;
                    }

               </style>
          <?php endif; ?>
          <link rel="stylesheet" type="text/css" href="<?php echo base_url('static/css/font-awesome.min.css'); ?>">
          <!-- Font-icon css-->
     </head>
     <body class="app sidebar-mini rtl">
          <header class="app-header"><a class="app-header__logo" href="index.html">Portal</a>
               <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
               <ul class="app-nav">
                    <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i>&nbsp;&nbsp;<?php echo ucwords($this->session->userdata('first_name')); ?></a>
                         <ul class="dropdown-menu settings-menu dropdown-menu-right">
                              <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-user fa-lg"></i> Profile</a></li>
                              <li><a class="dropdown-item" href="<?php echo base_url('logout'); ?>"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
                         </ul>
                    </li>
               </ul>
          </header>
          <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
          <aside class="app-sidebar">
               <div class="app-sidebar__user">
                    <img class="app-sidebar__user-avatar" src="<?php echo base_url('static/picture.jpg'); ?>" alt="User Image" width="40">
                    <div>
                         <p class="app-sidebar__user-name"><?php echo ucwords($this->session->userdata('first_name')); ?></p>
                         <p class="app-sidebar__user-designation"><?php echo ($this->session->userdata('user_type') == 0) ? 'Administrator' : 'Agent'; ?></p>
                    </div>
               </div>
               <ul class="app-menu">
                    <li><a class="app-menu__item <?php echo ($this->router->fetch_class() == 'dashboard') ? 'active':''; ?>" href="<?php echo base_url(); ?>"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
                    <?php if($this->session->userdata('user_type') == 0): ?>
                         <li><a class="app-menu__item <?php echo ($this->router->fetch_class() == 'users') ? 'active':''; ?>" href="<?php echo base_url('users'); ?>"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Users</span></a></li>
                    <?php endif; ?>
                    <li><a class="app-menu__item <?php echo ($this->router->fetch_class() == 'leadorder') ? 'active':''; ?>" href="<?php echo base_url('leadorder'); ?>"><i class="app-menu__icon fa fa-thumbs-o-up"></i><span class="app-menu__label">Lead Order</span></a></li>
                    <li><a class="app-menu__item <?php echo ($this->router->fetch_class() == 'files') ? 'active':''; ?>" href="<?php echo base_url('files'); ?>"><i class="app-menu__icon fa fa-archive"></i><span class="app-menu__label">Files</span></a></li>
               </ul>
          </aside>
          <main class="app-content">
               <div class="app-title">
                    <div>
                         <h1><?php echo ucwords(($this->router->fetch_class() == 'leadorder') ? 'Lead Order' : $this->router->fetch_class()); ?></h1>
                    </div>
               </div>
