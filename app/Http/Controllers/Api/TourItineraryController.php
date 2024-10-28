<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Destination;
use App\Models\Tour;
use Illuminate\Support\Facades\Validator;
class TourItineraryController extends Controller
{
    public function create_tour(Request $request){
        try{
                   $validator = Validator::make($request->all(), [
                        'destination' => 'required',
        
                    ]);

                    // If validation fails, return errors
                    if ($validator->fails()) {
                        return response()->json([
                            'status' => false,
                            'message' => 'something went wrong',
                            'errors' => $validator->errors()
                        ], 401);
                    }
                    $data = new  Destination();
                    $data -> destination = $request->destination;
                    $data -> save();

                            // Return success response
                                return response()->json([
                                    'status' => true,
                                    'message' => 'Destination added successfully',
                                    'data' => $data,
                                ], 201);

        }catch(\throwable $th){
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500); // Return 201 for resource created
        }
    }

    public function create_tour_api(Request  $request){
        try{
            $validator = Validator::make($request->all(), [
                'destination_category' => 'required|string|',
                'destination_name' => 'required|string',
                'destination_price' => 'required|numeric|max:1000000',
                'destination_location' => 'required|string', 
                'destination_days' => 'required|integer',
                'destination_description' => 'required|string',
                'destination_included' => 'required|string',
                'destination_policy' => 'required|string',
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
             $data = new Tour;
             $data->destination_category = $request->destination_category;
             $data->destination_name = $request->destination_name;
             $data->destination_price = $request->destination_price;
             $data->destination_location = $request->destination_location;
             $data->destination_days = $request->destination_days;
             $data->destination_description = $request->destination_description;
             $data->destination_included = $request->destination_included;
             $data->destination_policy = $request->destination_policy;
     
             $image = $request->image;
             
              // Check if an image was uploaded
              if($image){
                  $imagename = time(). '.' .$image->getClientOriginalExtension();
                  $request->image->move('destination-images',$imagename);
                  $data->destination_images =$imagename; 
              }
     
             $data->save();

                     // Return success response
                         return response()->json([
                             'status' => true,
                             'message' => 'Destination added successfully',
                             'data' => $data,
                         ], 201);
            }catch(\throwable $th){
                return response()->json([
                    'status' => false,
                    'message' => $th->getMessage(),
                ], 500); // Return 201 for resource created
            }

    }
    public function show($id){

        $destination = Tour::find($id);
        if (!$destination) {
            return response()->json(['message' => 'Destination not found'], 404);
        }

     // Return destination details along with description and policy
            return response()->json([
                'name' => $destination->destination_name,
                'price' => $destination->destination_price,
                'category' => $destination->destination_category,
                'duration' => $destination->destination_days,
                'location' => $destination->destination_location,
                'description' => $destination->destination_description,
                'policy' => $destination->destination_policy, // Assuming you have a policy field
                'included' => $destination->destination_included, 
                'image' => asset('destination-images/' . $destination->destination_images) // Ensure to prepend the public path
            ]);
    }

    public function edit($id){
        // Fetch the destination using the provided ID
        $destination = Tour::find($id);
        
        // Check if the destination exists
        if (!$destination) {
            // If the destination does not exist, return a 404 error
            return response()->json(['message' => 'Destination not found.'], 404);
        }
        
        // Return the destination data as a JSON response
        return response()->json($destination);
    }
    public function update_destination_api(Request $request, $id){
        try{
            $validator = Validator::make($request->all(), [
                'destination_category' => 'required|string|',
                'destination_name' => 'required|string',
                'destination_price' => 'required|numeric|max:1000000',
                'destination_location' => 'required|string', 
                'destination_days' => 'required|integer',
                'destination_description' => 'required|string',
                'destination_included' => 'required|string',
                'destination_policy' => 'required|string',
                'image' =>  ['nullable','file','max:3000','mimes:webp,png,jpg']
 
             ]);
             // If validation fails, return errors
             if ($validator->fails()) {
                 return response()->json([
                     'status' => false,
                     'message' => 'something went wrong',
                     'errors' => $validator->errors()
                 ], 422);
             }
             $data =  Tour::find($id);
             $data->destination_category = $request->destination_category;
             $data->destination_name = $request->destination_name;
             $data->destination_price = $request->destination_price;
             $data->destination_location = $request->destination_location;
             $data->destination_days = $request->destination_days;
             $data->destination_description = $request->destination_description;
             $data->destination_included = $request->destination_included;
             $data->destination_policy = $request->destination_policy;
             $image = $request->image;             
        // Check if an image was uploaded
        if ($image) {
            // Check if the old image exists and delete it
            if ($data->destination_images) {
                $oldImagePath = public_path('destination-images/' . $data->destination_images);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Delete the old image
                }
            }
            // Upload the new image
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('destination-images', $imagename);
            $data->destination_images = $imagename; 
        }     
             $data->save();
                     // Return success response
                         return response()->json([
                             'status' => true,
                             'message' => 'Destination update successfully',
                             'data' => $data,
                             'redirect_url' => route('manage-tour') // Add redirect URL
                         ], 201);
            }catch(\throwable $th){
                return response()->json([
                    'status' => false,
                    'message' => $th->getMessage(),
                ], 500); // Return 201 for resource created
            }
    }
    public function delete_destination_api($id)
    {
        $data = Tour::find($id);
    
        // Check if the destination exists
        if (!$data) {
            return response()->json(['error' => 'Destination not found'], 404);
        }
    
        // DELETE IMAGE FROM PUBLIC FOLDER
        $image_path = public_path('destination-images/' . $data->destination_images);
        
        if (file_exists($image_path)) {
            unlink($image_path); // Delete the image
        }
    
        // Delete the tour data
        $data->delete();
    
        return response()->json(['success' => 'Destination deleted successfully'], 200);
    }
    
    

}
