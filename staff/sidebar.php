<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img src="../img/logo.png" height="70" width="70">
                </div>
                <div class="sidebar-brand-text mx-3">Clinic Management System</div>
            </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item ">
        <a class="nav-link" href="../staff/staff.php">
            <i class="fa-solid fa-house-chimney-medical"></i>
            <span>Dashboard</span></a>
    </li>

        <!-- Nav Item - Appointment -->
        <li class="nav-item">
        <a class="nav-link" href="../staff/pending.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Pending Appointment</span></a>
    </li>

    <!-- Nav Item - Appointment -->
    <li class="nav-item">
        <a class="nav-link" href="../staff/appointment.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Appointments</span></a>
    </li>


    <!-- Nav Item - Patients -->
    <li class="nav-item ">
        <a class="nav-link" href="../staff/patients.php">
            <i class="fa-solid fa-user-injured"></i>
            <span>Patients</span></a>
    </li>
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Service</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                <a class="collapse-item" href="../staff/medicine.php"> <i class="fa-solid fa-hospital"></i>
                    Medicines</a>
                <a class="collapse-item" href="../staff/lab.php"> <i class="fa-solid fa-stethoscope"></i>
                    Laboratory Instruments</a>

            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggle (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">


