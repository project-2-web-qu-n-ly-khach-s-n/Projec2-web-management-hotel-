<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Auth;
use App\RoomType;
use App\Reservation;
use Session;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Room;


class PageController extends Controller
{
    public function getIndex(){
        $room = RoomType::all();
        return view('page.index', compact('room'));
    }

    public function getRooms(){
        $room = RoomType::all();
        return view('page.rooms', compact('room'));
    }

    public function getAbout(){
        return view('page.about');
    }

    public function getGuestBooking(){
        return view('page.guestbooking');
    }

    public function getMyAccount(){
        if (Auth::check())
        {
            $id = Auth::user()->id;
            $acc_info = Customer::where('id_user',$id)->get();   
            $booking_info = Reservation::where('id_customer',$id)->get();
            return view('page.myaccount', compact('acc_info','booking_info'));
        } 
    }

    public function postMyAccount(Request $req)
    {  
        
        $id_user = Auth::id();
        $user=User::findOrFail($id_user);
        if(Hash::check($req->password, $user->password)){
            User::where('id',$id_user)->update(array(
                        'name'=>$req->name,
            ));
            Customer::where('id_user',$id_user)->update(array(
                        'name'=>$req->name,
                        'phone_number'=>$req->phone_number,
                        'address'=>$req->address,

            ));
            return response()->json([
                'status' => 'success',
                'msg' => 'Update successfully',
            ]);
        }
        else{
            return response()->json([
                'status' => 'failed',
                'msg' => 'Wrong password',
            ]);
        }
        
    }

    public function changePassword(Request $req)
    {
        $rules = [
            'npass' => 'required|min:8',
            'cnpass' =>'required|same:npass',
        ];
        $messages = [    
            'npass.required' => 'Please enter new password',
            'npass.min' => 'Password must be at least 8 characters',
            'cnpass.required' => 'Please enter comfirm password',
            'cnpass.same' => 'Comfirm password does not match.',
        ];
        $validator = Validator::make($req->all(), $rules, $messages);
        if ($validator->fails()) 
        {
            return response()->json([
                    'error' => true,
                    'msg' => $validator->errors()
                ]);
            
        } 
        else {
            $id_user = Auth::id();
            $user=User::findOrFail($id_user);
            if(Hash::check($req->cpass, $user->password)){
                User::where('id',$id_user)->update(array(
                             'password'=>Hash::make($req->npass),
                ));

                return response()->json([
                    'error' => false,
                    'msg' => 'Update successfully'
                ]);    
            }
            else{
                $errors = new MessageBag(['errorlogin' => 'Wrong password']);
               return response()->json([
                    'error' => true,
                    'msg' => $errors,
                ]);
            }
        }
        
    }

    public function getBooking(){
        $room = RoomType::all();
        if (Auth::check())
        {
            $id = Auth::user()->id;
            $acc_info = Customer::where('id_user',$id)->get();            
            return view('page.booking', compact('room','acc_info'));
        } else{
            return view('page.booking', compact('room'));
        }
        return view('page.booking', compact('room'));
    }

    public function postBooking(Request $req){
        $reservation = new Reservation();        
        if (Auth::check()){
            $reservation->id_customer= Auth::user()->id;
        }else{
            $customer = new Customer();
            $customer->name = $req->name;
            $customer->email = $req->email;
            $customer->phone_number = $req->phone_number;
            $customer->save();
            $reservation->id_customer = $customer->id;
        }
        $reservation->total='1';            
        $reservation->date_in = date('Y-m-d', strtotime($req->start));
        $reservation->date_out = date('Y-m-d', strtotime($req->end));
        $reservation->save();
        return redirect()->back();
    }

    public function addRoom(Request $req)
    {        
        if($req->ajax())
        {   
            $output1='';
            $output2='';
            $id = $req->get('id');
            $roomID = $req->get('roomIDp');
            $calDate = $req->get('calDate');
            $room = RoomType::find($id);

            $req->session()->push('cart.id', $id);
            
            $output1 .='
                <div class="card m-2 p-0">                             
                    <div class="card-horizontal">
                        <div class="img-square-wrapper">
                            <img class="room-img-cart" src="img/'.$room->image.'" alt="Card image cap">
                        </div>
                        <div class="card-body p-0">                                 
                            <span class="col-6 pt-4">'.$room->name.'</span>
                            
                            <a href="#" class="remove-room col-4 pt-3 ml-5 " id="roomid'.$roomID.''.$id.'"><ion-icon name="close" style="font-size: 40px; color:#000;"></ion-icon></a>                
                        </div>
                    </div>      
                </div>
            ';
            $output2 .='
                <div class="roomid'.$roomID.''.$id.'" id="roomid'.$roomID.''.$id.'">
                    <table>
                        <tr>
                            <td class="text-left"><span>'.$room->name.'</span></td>
                            <td><span class="mr-4"> x '.$calDate.' night</span></td>
                            <td class="text-right"><span class="ml-5">$'.$room->price*$calDate.'</span></td>
                        </tr>
                    </table>
                </div>
            ';
            $room_price=$room->price*$calDate;
            $data = array(
                "room" => $output1,
                "detail" =>$output2,    
                "room_price"=>$room_price,
            );
            echo json_encode($data);
        }
    }

    public function removeRoom(Request $req)
    {        
        if($req->ajax())
        {   
            $id = $req->get('id');            
            $calDate = $req->get('calDate');
            $room = RoomType::find($id);           
            $roomPrice=$room->price*$calDate;
            $data = array(                 
                "room_price"=>$roomPrice,
            );
            echo json_encode($data);
        }
    }

    public function getAdmin(){

        $date = date('Y-m-d', strtotime(Carbon::now()));
        // $res = Reservation::where('date_in',$date)->get();
        $res = DB::table('reservation')
        ->join('customer','customer.id','reservation.id_customer')
        ->where('reservation.date_in', '=',$date)
        ->get();
        // dd($i);
        return view('page.index-admin',compact('res'));
    }

    public function getCheckin($id){
        Reservation::where('id_customer',$id)->update(array(
                        'status'=>'1',
            ));
        return redirect()->back();
    }

    public function getManagerRoom(){

        $room = Room::all();
        // dd($room);
        return view('page.manager-room',compact('room'));
    }
    public function cancelReservation($id){
        $id_c = Auth::user()->id;
        // dd($id,$id_c);
        Reservation::where('id',$id)->where('id_customer',$id_c)->update(array(
                        'status'=>2,
            ));
        return redirect()->back();
        
    }

}
