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
        <h1 class="h3 mb-0 text-muted">Create Hotel Reservations</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>

    <div class="shadow-lg p-3 mb-5 bg-body rounded">
        <div class="row justify-content-center">        
            <div class="col-md-5">  
                <div class="mb-3">                        
            <form action="{{ route('CreateHotel') }}" method="POST" enctype="multipart/form-data">
                @csrf       
                    <label for="">Hotel Name:</label>
                    <input type="text" value="{{ old('destination_name')}}"  name="hotel_name"   class="form-control @error('destination_name') text-danger is-invalid @enderror"  placeholder="enter your destination name">
                    @error('destination_name')
                        <span class="text-danger">{{$message }}</span>
                    @enderror
                </div>         
            </div>
            <div class="col-md-5">
                <div class="mb-3">                      
                    <label for="">Hotel Location:</label>
                    <input type="text" value="{{ old('destination_price')}}"  name="hotel_location"  class="form-control @error('destination_price') text-danger is-invalid @enderror"   placeholder="enter your desination price">
                </div>     
            </div>     
        </div>
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="mb-3">
                    <label for="">Hotel Price:</label>
                    <input type="number" value="{{ old('destination_price')}}"  name="hotel_price"  class="form-control @error('destination_price') text-danger is-invalid @enderror"   placeholder="enter your desination price">
                </div>     
            </div>
            <div class="col-md-5">      
                <div class="mb-3">
                    <label for="">Hotel Occupancy Limit</label>
                    <select name="hotel_limit" id="" class="form-control" >
                        <option value="" disabled selected> --- Select Options ---</option>
                        <option value="1-person">1 person</option>
                        <option value="2-person">2 person</option>
                        <option value="3-person">3 person</option>
                        <option value="4-person">4 person</option>
                        <option value="5-person">5 person</option>
                        <option value="6-person">6 person</option>
                        <option value="7-person">7 person</option>
                        <option value="8-person">8 person</option>
                       </select>
                </div>            
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="mb-3"> 
                    <label for="">Room Type:</label>
                    <select name="room_type" id="" class="form-control" >
                        <option value="" disabled selected> --- Select Options ---</option>
                        <option value="standard room">Standard Room</option>
                        <option value="deluxe room">Deluxe Room</option>
                        <option value="suite room">Suite</option>
                        <option value="family room">Family Room</option>
                        <option value="single room">Single Room</option>
                        <option value="double room">Double Room</option>
                       </select>
                </div>     
            </div>
            <div class="col-md-5">
                <div class="mb-3">
                    <label for="">Accomodation Type:</label>
                    <select name="accomodation_type" id="" class="form-control" >
                        <option value="" disabled selected> --- Select Options ---</option>
                        <option value="Hotel">Hotel</option>
                        <option value="Resort">Resort</option>
                        <option value="Apartment">Apartment</option>
                        <option value="Hostel">Hostel</option>
                        <option value="GuestHouse">GuestHouse</option>
                       </select>
                </div>     
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="mb-3">
                    <label for="">Hotel Ratings:</label>
                    <select name="hotel_ratings" id="" class="form-control" >
                        <option value="" disabled selected> --- Select Options ---</option>
                        <option value="5 star">5 star</option>
                        <option value="4 star">4 star</option>
                        <option value="3 star">3 star</option>
                        <option value="2 star">2 star</option>
                        <option value="1 star">1 star</option>
                       </select>
                </div>     
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-5">
                <label for=""> Hotel Description</label>
                <textarea name="hotel_description" value="{{ old('destination_description')}}"  id=""  cols="20" rows="10"  class="@error('destination_description') text-danger is-invalid @enderror form-control">

          </textarea>   
        </div>
        <div class="col-md-5 mb-1">
            <label for="">Hotel Included</label>
            <textarea name="hotel_included" value="{{ old('destination_included')}}"   cols="20" rows="10"  class="@error('destination_included') text-danger is-invalid @enderror form-control">

            </textarea>   
    </div>
            <div class="row  justify-content-center">
                <div class="col-md-10">
                <label for="">Hotel Policy</label>
                <textarea name="hotel_policy" value="{{ old('destination_policy')}}"      cols="200"  class="@error('destination_policy') text-danger is-invalid @enderror form-control">         
                </textarea> 

                <div class="mb-3 col-md-12">
                    <label for="">Cover Photo</label>
                    <input type="file"  class="@error('image')  text-danger is-invalid @enderror form-control" name="image" id="">
                    @error('image')
                    <span class="text-danger">{{ $message }}</span>
                        
                    @enderror
                </div>     
            </div>
                 
            </div>
         
            <div class="col-md-10 float-start mt-2" >
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        
     
        
        </form> 
    </div>

   
 
    @include('admin/partials.footer')






