            <!-- Nav Item - Dashboard -->
            <li class="nav-item ">
              <a class="nav-link" href="index.php">
                <i class="fa-solid fa-house-chimney-medical"></i>
                <span>Dashboard</span></a>
            </li>

            <!-- Doctor -->
            <?php if(in_array($_SESSION['auth'], [2])){ ?>
              <li class="nav-item">
              <a class="nav-link" href="list_appointment.php">
                <i class="fas fa-fw fa-table"></i>
                <span>Appointments</span></a>
                
            </li>
            <li class="nav-item">
              <a class="nav-link" href="list_patient.php">
                <i class="fas fa-fw fa-user-injured"></i>
                <span>Patient</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="list_medical_record.php">
                <i class="fas fa-fw fa-book"></i>
                <span>Medical Record</span></a>
            </li>
            <?php } ?>

            <!-- Admin,Staff,Patient -->
            <?php if(in_array($_SESSION['auth'], [1,3,4])){ ?>
            <?php if(!in_array($_SESSION['auth'], [3])){ ?>
            <li class="nav-item">
              <a class="nav-link" href="list_users.php">
                <i class="fas fa-fw fa-users"></i>
                <span>Users</span></a>
            </li>
            <?php } ?>
            <?php if(!in_array($_SESSION['auth'], [3])){ ?>
            <li class="nav-item">
              <a class="nav-link" href="list_service.php">
                <i class="fas fa-fw fa-briefcase"></i>
                <span>Services</span></a>
            </li>
            <?php } ?>
            <li class="nav-item">
              <a class="nav-link" href="list_appointment.php">
                <i class="fas fa-fw fa-table"></i>
                <span>Appointments</span></a>
            </li>
            <?php if(in_array($_SESSION['auth'], [3])){ ?>
            <li class="nav-item">
              <a class="nav-link" href="list_medical_record.php">
                <i class="fas fa-fw fa-book"></i>
                <span>Medical Record</span></a>
            </li>
            <?php } ?>
            <?php if(in_array($_SESSION['auth'], [1,4])){ ?>
            <li class="nav-item">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#inventory"
                aria-expanded="true" aria-controls="inventory">
                <i class="fas fa-fw fa-boxes"></i>
                <span>Inventory</span>
              </a>
              <div id="inventory" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                  <a class="collapse-item" href="list_medicine.php"> <i class="fa-solid fa-prescription-bottle-alt"></i>
                    Medicine</a>
                  <a class="collapse-item" href="list_equipment.php"> <i class="fa-solid fa-x-ray"></i>
                    Laboratory/Equipment</a>
                </div>
              </div>
            </li>
            <?php } ?>


            <!-- <li class="nav-item">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#users" aria-expanded="true"
                aria-controls="users">
                <i class="fas fa-fw fa-users"></i>
                <span>Users</span>
              </a>
              <div id="users" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">

                  <a class="collapse-item" href="list_doctor.php"> <i class="fa-solid fa-user-doctor"></i>
                    Doctor</a>
                  <?php if(in_array($_SESSION['auth'], [1,2])){ ?>
                  <a class="collapse-item" href="list_staff.php"> <i class="fa-solid fa-user-md"></i>
                    Staff</a>
                  <?php } ?>
                  <?php if(in_array($_SESSION['auth'], [1,2,4])){ ?>
                  <a class="collapse-item" href="list_patient.php"> <i class="fa-solid fa-user-injured"></i></i>
                    Patient</a>
                  <?php } ?>
                  <?php if(in_array($_SESSION['auth'], [1])){ ?>
                  <a class="collapse-item" href="list_admin.php"> <i class="fa-solid fa-user-shield"></i></i>
                    Administrator</a>
                  <?php } ?>
                </div>
              </div>
            </li> -->

            <?php } ?>