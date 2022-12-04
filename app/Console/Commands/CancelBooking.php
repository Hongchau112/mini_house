<?php

namespace App\Console\Commands;

use App\Models\Booking;
use App\Models\BookingDetail;
use App\Models\Room;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class CancelBooking extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:cancel-booking';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $bookings = Booking::where('date', '<',now()->subDays(5))->get();

//        dd($bookings);
        $title = 'Thông báo hủy đơn đặt phòng trọ do quá hạn thanh toán';
        foreach ($bookings as $booking)
        {
            $booking_detail = BookingDetail::find('booking_id', $booking->id);
            $room = Room::find('id', $booking->booking_room_id);
            $user = User::find('id', $booking->user_id);
            $user_email = User::find('id', $booking->user_id)->email;
            $user_name = $user->name;
            //gui email
            Mail::send('customer.email.booking_room', [
                'user_name' => $user->name,
                'room_name' => $room->name,
                'total_cost' => $booking_detail->total_cost,
                'method' => $booking_detail->payment_method
            ], function ($mail) use ($user_email, $user_name){
                $mail->to($user_email, $user_name);
                $mail->from('hongchau2000st@gmail.com');
                $mail->subject("Thông báo hủy đơn đặt phòng trọ do quá hạn thanh toán");
            });
        }
        return 0;
    }
}
