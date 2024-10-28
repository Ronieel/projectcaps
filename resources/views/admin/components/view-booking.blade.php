@include('admin/partials.header-css')

@include('admin/partials.sidebar')
@include('admin/partials.top-content')


<style>
    /* Hide the default file input appearance */
input[type="file"] {
    display: block; /* Ensures it is visible */
    padding: 10px; /* Add padding for better appearance */
    border: 1px solid #ced4da; /* Add border */
    border-radius: 0.25rem; /* Match Bootstrap input styling */
    background-color: #f8f9fa; /* Optional: background color */
}

/* Customize the file input */
input[type="file"]::-webkit-file-upload-button {
    display: none; /* Hide the default button */
}

</style>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-muted">Transportation Details</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>

    <div class="shadow-lg p-3 mb-5 bg-body rounded">
        <div class="container mt-5">
            <div class="row g-0">
                <div class="col-md-6">
                    <img src="" id="product-image" class="img-fluid rounded-start" alt="Product Image" style="width: 100%; height: auto;">
                </div>
                
                <div class="col-md-6">
                    <div class="card-body">
                        <h5 class="card-title">Product Name Title Here</h5>
                        <h6 class="card-subtitle mb-2 text-muted">PHP 23,000</h6>
                        <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                            <li class="nav-item d-flex" role="presentation">
                                <a class="nav-link d-flex align-items-center justify-content-center w-100 active"
                                   id="ex1-tab-1" data-bs-toggle="tab" href="#ex1-pills-1"
                                   role="tab" aria-controls="ex1-pills-1" aria-selected="true">
                                    Tour Description
                                </a>
                            </li>
                            <li class="nav-item d-flex" role="presentation">
                                <a class="nav-link d-flex align-items-center justify-content-center w-100"
                                   id="ex1-tab-2" data-bs-toggle="tab" href="#ex1-pills-2"
                                   role="tab" aria-controls="ex1-pills-2" aria-selected="false">
                                    Tour Policy
                                </a>
                            </li>
                            <li class="nav-item d-flex" role="presentation">
                                <a class="nav-link d-flex align-items-center justify-content-center w-100"
                                   id="ex1-tab-3" data-bs-toggle="tab" href="#ex1-pills-3"
                                   role="tab" aria-controls="ex1-pills-3" aria-selected="false">
                                   Vehicle Information
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content" id="ex1-content">
                            <!-- Tour Description -->
                            <div class="tab-pane fade show active" id="ex1-pills-1" role="tabpanel" aria-labelledby="ex1-tab-1">
                                Loading description...
                            </div>
                            <!-- Tour Policy -->
                            <div class="tab-pane fade mb-2" id="ex1-pills-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                              
                            </div>
                            <!-- VIHECLE INFORMATION -->
                            <div class="tab-pane fade mb-2" id="ex1-pills-3" role="tabpanel" aria-labelledby="ex1-tab-3">
                                <ul id="included-list">
                                    <table class="table-auto w-full text-left text-gray-700">
                                        <tbody id="car-details-table">
                                            <tr>
                                                <td class="py-2 pr-4 font-semibold">Manufacturer:</td>
                                                <td class="py-2" id="manufacturer">Loading...</td>
                                            </tr>
                                            <tr>
                                                <td class="py-2 pr-4 font-semibold">Model:</td>
                                                <td class="py-2" id="model">Loading...</td>
                                            </tr>
                                            <tr>
                                                <td class="py-2 pr-4 font-semibold">Type:</td>
                                                <td class="py-2" id="type">Loading...</td>
                                            </tr>
                                            <tr>
                                                <td class="py-2 pr-4 font-semibold">Capacity:</td>
                                                <td class="py-2" id="capacity">Loading...</td>
                                            </tr>
                                            <tr>
                                                <td class="py-2 pr-4 font-semibold">Fuel Type:</td>
                                                <td class="py-2" id="fuel">Loading...</td>
                                            </tr>
                                            <tr>
                                                <td class="py-2 pr-4 font-semibold">Color:</td>
                                                <td class="py-2" id="color">Loading...</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

     

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
 
    @include('admin/partials.footer')

    <script>
        $(document).ready(function() {
    // Replace with your destination ID
    var bookingId = {{ $booking->id }}; // This should be dynamically set based on the destination clicked

    $.ajax({
        url: `/api/view-booking/${bookingId}`, // Your API endpoint
        type: 'GET',
        headers: {
            'Authorization': 'Bearer 7|DYYr2BONWW9HXLbuYaXpWhZEJ9wmiaH5JpB9EpGr9170ee47' // Replace with your actual token
        },
        success: function(response) {
            function formatNumber(value) {
                return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }

            var price = response.car_price; // Assuming price is a number in the response
            var formattedPrice = formatNumber(price); // Format the price

            $('.card-title').text(response.manufacturer); // Product Name
            $('.card-subtitle').text('PHP ' + formattedPrice); // Formatted Price
            $('#ex1-pills-1').html(response.description); // Description
            $('#ex1-pills-2').html(response.policy); // Policy
            $('img').attr('src', response.image); // Update image source
            // Populate other sections as needed
            $('#manufacturer').text(response.manufacturer); // Product Name
            $('#model').html(response.Model); 
            $('#type').html(response.car_type); 
            $('#capacity').html(response.capacity); 
            $('#fuel').html(response.fuel_type); 
            $('#color').html(response.colors); 
            
            
        
        },
        error: function(xhr) {
            alert('Error fetching data: ' + (xhr.responseJSON.message || 'An error occurred'));
        }
    });
});
    </script>






