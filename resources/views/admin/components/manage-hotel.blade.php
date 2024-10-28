@include('admin/partials.header-css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css" integrity="sha512-pVCM5+SN2+qwj36KonHToF2p1oIvoU3bsqxphdOIWMYmgr4ZqD3t5DjKvvetKhXGc/ZG5REYTT6ltKfExEei/Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />
<link rel="stylesheet" href="{{ asset('css/manage-tours.css') }}">
@include('admin/partials.sidebar')
@include('admin/partials.top-content')


<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-muted">Manage Hotel Reservations</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>

    
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="mb-3">
                        <h5 class="card-title text-muted"> Total Booking <span class="text-muted fw-normal ms-2">({{ $count }})</span></h5>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                        <div>
                            <a href="{{ route('create-hotel') }}" class="btn btn-primary"><i class="bx bx-plus"></i> Add New</a>
                        </div>
                        <div class="dropdown">
                            <a class="btn btn-link text-muted py-1 font-size-16 shadow-none dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bx bx-dots-horizontal-rounded"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
    
         <!-- Table Section -->
         <div class="col-lg-12">
            <div class="table-responsive bg-light p-3 shadow-sm rounded">
                <table class="table table-borderless table-hover align-middle">
                    <thead class="tabl-lights">
                        <tr>
                            <th scope="col" class="text-muted">#</th>
                            <th scope="col" class="text-muted">Hotel Name:</th>
                            <th scope="col" class="text-muted">Hotel Location:</th>
                            <th scope="col" class="text-muted">Hotel Images:</th>
                            <th scope="col" class="text-muted">Hotel Price:</th>
                            <th scope="col" class="text-muted">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1; ?>
                        @foreach ($data as $data )
                        <tr class="bg-light">
                            <th scope="row" class="text-muted">{{ $count++}}</th>
                            <td class="text-muted"> {{$data->hotel_name}}</td>
                            <td class="text-muted"> {{$data->hotel_location}}</td>
                            <td scope="col" class="text-muted">
                                <img src="hotel-images/{{$data->hotel_images}}" height="50" width="90"  alt="" srcset="">
                            </td>
                            <td class="text-muted"> {{$data->hotel_price}}</td>
                            <td>
                                <!-- View Icon -->
                                <a href="{{ route('view-hotel',$data->id) }}" class="btn btn-sm btn-success" title="View Details"><i class="bi bi-eye"></i></a>
                                
                                <!-- Delete Icon -->
                                <a href="{{ route('delete-hotel',$data->id) }}" class="btn btn-sm btn-danger ms-2" onclick="confirmation(event)"  >
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach     
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
          function confirmation(ev){
        ev.preventDefault(); 
        var urlToRedirect = ev.currentTarget.getAttribute('href');
        console.log(urlToRedirect);

        Swal.fire({
            title: "Are You Sure To Delete This?",
            text: "This delete will be permanent.",
            icon: "warning",
            showCancelButton: true,  // Display the cancel button
            confirmButtonColor: '#3085d6', // Color of the confirm button
            cancelButtonColor: '#d33',     // Color of the cancel button
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel'
        }).then((result) => {
            if (result.isConfirmed) {  // When confirmed
                window.location.href = urlToRedirect;
            }
        });
    }
          
</script>
    @include('admin/partials.footer')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

 




