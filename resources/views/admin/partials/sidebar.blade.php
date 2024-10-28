  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3"><span  style="color: yellow; font-weight: bolder; font-size: 22px;">J</span><span style="color: red; font-weight: bolder; font-size: 22px;">V</span><span style="color: blue; font-weight: bolder; font-size: 22px;">D</span> Admin</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{route('admin-dashboard')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Interface
        </div>
                <!-- Account  Management -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#account"
                        aria-expanded="true" aria-controls="collapseTwo">
                        <i class="bi bi-person"></i>
                        <span >Account  Management</span>
                    </a>
                    <div id="account" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="">View User Account</a>
                            <a class="collapse-item" href="">View User Details</a>
                        </div>
                    </div>
                </li>

        <!-- Customer Tour Itinerary Management -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="bi bi-calendar"></i>
                <span >Customer Tour Itinerary Management</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href=" ">Create Tour Itinerary</a>
                    <a class="collapse-item" href="">Manage Tour Itinerary</a>
                </div>
            </div>
        </li>

        <!-- Tour Creation and Configuration -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tourCreation"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="bi bi-gear"></i>
                <span>Tour Creation and Configuration</span>
            </a>
            <div id="tourCreation" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{route('create-tours')}}">Create Tours</a>
                    <a class="collapse-item" href="{{route('manage-tour')}}">Manage Tours</a>
                    <a class="collapse-item" href="">View Tour Purchase History</a>
                    <a class="collapse-item" href="">Cutomer Feedback</a>
                </div>
            </div>
        </li>
<!-- Transport Booking -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#transportBooking" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="bi bi-car-front"></i>
        <span>Transport Booking</span>

    </a>
    <div id="transportBooking" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item"  id="createBookingDetails">
                <i class="bi bi-chevron-down" id="createArrow"></i>  <!-- Icon for Create Booking Details -->
                Manage Booking
            </a>
            <div id="hotelDetails" class="collapse mt-2" style="display: none;"> <!-- Hidden initially -->
                <a class="collapse-item" href="{{route('create_booking')}}">
                    Create Booking 
                </a>
                <a class="collapse-item" href="{{route('manage-booking')}}">
              
                  View Booking
                </a>
            </div>
        
        </div>
    </div>
</li>
          <!-- Hotel Reservation-->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#hotelReservation"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="bi bi-building"></i>
                <span>Hotel Reservation</span>
            </a>
            <div id="hotelReservation" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="">Create Hotel Details </a>
                    <a class="collapse-item" href="">Manage Hotel Details</a>
                    <a class="collapse-item" href="">View Order Details</a>
                    <a class="collapse-item" href="">Customer Feedback</a>
                </div>
            </div>
        </li>
               <!-- Tour Looking -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tourLooking"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Account Management</span>
            </a>
            <div id="tourLooking" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="">User Account</a>
                    <a class="collapse-item" href="">User Account Details</a>

                </div>
            </div>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">

         <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>



    </ul>