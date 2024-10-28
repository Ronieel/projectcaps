<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Validator;
class TransportBookingController extends Controller
{
    
    public function create_booking_api(Request $request){

        try{
            $validator = Validator::make($request->all(), [
                'Type' => 'required|string|',
                'manufacturer' => 'required|string',
                'car_price' => 'required|numeric|max:1000000',
                'model' => 'required|string', 
                'capacity' => 'required|integer',
                'fuel_type' => 'required|string',
                'color' => 'required|string',
                'car_description' => 'required|string',
                'policy' => 'required|string',
                'image' =>  ['required','nullable','file','max:3000','mimes:webp,png,jpg']
 
             ]);
             // If validation fails, return errors
             if ($validator->fails()) {
                 return response()->json([
                     'status' => false,
                     'message' => 'something went wrong',
                     'errors' => $validator->errors()
                 ], 422);
             }
             $data = new booking;
             $data->Car_type = $request->Type;
             $data->Manufacturer = $request->manufacturer;
             $data->Car_price = $request->car_price;
             $data->Model = $request->model;
             $data->Capacity = $request->capacity;
             $data->Fuel_type = $request->fuel_type;
             $data->Colors = $request->color;
             $data->Description = $request->car_description;
             $data->Policy = $request->policy;
   
     
             $image = $request->image;
             
              // Check if an image was uploaded
              if($image){
                  $imagename = time(). '.' .$image->getClientOriginalExtension();
                  $request->image->move('booking-images',$imagename);
                  $data->booking_images =$imagename; 
              }
     
             $data->save();

                     // Return success response
                         return response()->json([
                             'status' => true,
                             'message' => 'booking added successfully',
                             'data' => $data,
                         ], 201);
            }catch(\throwable $th){
                return response()->json([
                    'status' => false,
                    'message' => $th->getMessage(),
                ], 500); // Return 201 for resource created
            }
    }

    
    public function manage_booking_api(){
        $data = Booking::all();
        return response()->json($data);
        
    }
    public function show($id){

        $booking = Booking::find($id);
        if (!$booking) {
            return response()->json(['message' => 'transportation not found'], 404);
        }

     // Return destination details along with description and policy
            return response()->json([

                'car_type' => $booking->Car_type,
                'manufacturer' => $booking->Manufacturer,
                'car_price' => $booking->Car_price,
                'Model' => $booking->Model,
                'capacity' => $booking->Capacity,
                'fuel_type' => $booking->Fuel_type,
                'colors' => $booking->Colors, // Assuming you have a policy field
                'description' => $booking->Description, 
                'policy' => $booking->Policy, 
                'image' => asset('booking-images/' . $booking->booking_images) // Ensure to prepend the public path
            ]);
    }
    public function edit($id) {
        $booking = Booking::find($id);
        if (!$booking) {
            abort(404, 'Transportation not found');
        }
        return view('admin.components.view-booking-edit', compact('booking'));
           // Return the destination data as a JSON response
           return response()->json($booking);
    }
       
     
      
      


}
