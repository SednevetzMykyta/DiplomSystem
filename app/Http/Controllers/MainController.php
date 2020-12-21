<?php

namespace App\Http\Controllers;
use App\Contact;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class MainController extends BaseController
{
    public function home()
    {
        return view('home');
    }

    public function guide()
    {
        return view('guide');
    }

    public function support()
    {
        $supports = new Contact();
        return view('support', ['supports' => $support->all()]);
    }

    public function support_check(Request $request)
    {
        $valid = $request->validate([
            'email' => 'required|min:4|max:25',
            'subject' => 'required|min:4|max:100',
            'message' => 'required|min:15|max:500'
        ]);

        $support = new Contact();
        $support->email = $request->input('email');
        $support->subject = $request->input('subject');
        $support->message = $request->input('message');

        $support->save();

        return redirect()->route('support');
    }
 public function count(){
     $date = date("Y-m-d");
     $res = DB::SELECT('Select visit_id FROM visits WHERE date = $date',[date]);
// Якщо сьогодні ще не було відвідувачів
     if (mysqli_num_rows($res) == 0){
     // Заносимо в базу IP-адрес користувача
         $res = DB::iinsert ('INSERT INTO ips(ip_address) value ($visitor_ip)',[visitor_ip]);
     // Заносимо в базу дату відвідування и встановлюємо кількість переглядів та нового користувача
     $res_count =  DB::iinsert (' INSERT INTO visits(date, hosts, views) values(date, 1, 1)',[date, 1, 1]);
                                    }
     else{
         // перевірка, чи є вже в базі цей IP-адрес, с котрого відбувся вхід
     }
         $current_ip = DB::SELECT('SELECT `ip_id` FROM `ips` WHERE `ip_address`=$visitor_ip',[visitor_ip =>ip_id]);

         // якщо користувач вже був (цей користувач вже був на сайті)
         if (mysqli_num_rows($current_ip) == 1)
         {
             // додавання до сьогоднішнього дня один перегляд
             DB::update(' UPDATE visits SET views=views+1 WHERE date=$date',[date]);
         }

         // якщо сьогодні такого IP-адреса ще не було (цей користувач вже був на сайті )
         else
         {
             // Заносимо в базу IP-адрес цього користувача
             DB::iinsert (' INSERT INTO ips SET ip_address=$visitor_ip',[visitor_ip]);

             // додаємо до бази +1 нового користуваача (хост) и +1 перегляд
             DB::update(' UPDATE visits SET hosts=hosts+1,views=views+1 WHERE date=$date',[date]);
         }
}

    public function support_count(){
        $res = DB::SELECT('Select visit_id FROM visits WHERE date = $date',[date]);
// якщо сьогодні не було користувачів
        if (mysqli_num_rows($res) == 0){
            // Заносимо в базу IP-адрес користувача
            $res = DB::iinsert ('INSERT INTO ips(ip_address) value ($visitor_ip)',[visitor_ip]);
            // Заносимо в базу дату відвідування и встановлюємо кількість переглядів та нового користувача 1
            $res_count =  DB::iinsert (' INSERT INTO visits(date, hosts_support, views_support) values(date, 1, 1)',[date, 1, 1]);
        }
        else{
            // перевіряємо, чи є вже в базі даний IP-адрес, с котрого відбувся вхід
        }
        $current_ip = DB::SELECT('SELECT `ip_id` FROM `ips` WHERE `ip_address`=$visitor_ip',[visitor_ip =>ip_id]);

        // якщо такий IP-адрес вже сьогодні був
        if (mysqli_num_rows($current_ip) == 1)
        {
            DB::update(' UPDATE visits SET views_support=views_support+1 WHERE date=$date',[date]);
        }

        // якщо сьогодні такого IP-адреса еще не було
        else
        {
            // Заносимо в базу IP-адрес цього користувача
            DB::iinsert (' INSERT INTO ips SET ip_address=$visitor_ip',[visitor_ip]);

            // додаємо в базу +1 нового коритсувача (хост) и +1 перегляд
            DB::update(' UPDATE visits SET hosts_support=hosts_support+1,views_support=views_support+1 WHERE date=$date',[date]);

        }
    }
    public function guid_count(){
        $res = DB::SELECT('Select visit_id FROM visits WHERE date = $date',[date]);
// якщо сьогодні не було користувачів
        if (mysqli_num_rows($res) == 0){
            // Заносимо в базу IP-адрес користувача
            $res = DB::iinsert ('INSERT INTO ips(ip_address) value ($visitor_ip)',[visitor_ip]);
            // Заносимо в базу дату відвідування и встановлюємо кількість переглядів та нового користувача 1
            $res_count =  DB::iinsert (' INSERT INTO visits(date, hosts_guid, views_guid) values(date, 1, 1)',[date, 1, 1]);
        }
        else{
            // перевіряємо, чи є вже в базі даний IP-адрес, с котрого відбувся вхід
        }
        $current_ip = DB::SELECT('SELECT `ip_id` FROM `ips` WHERE `ip_address`=$visitor_ip',[visitor_ip =>ip_id]);

        // якщо такий IP-адрес вже сьогодні був
        if (mysqli_num_rows($current_ip) == 1)
        {
            DB::update(' UPDATE visits SET views_guid=views_guid+1 WHERE date=$date',[date]);
        }

        // якщо сьогодні такого IP-адреса еще не було
        else
        {
            // Заносимо в базу IP-адрес цього користувача
            DB::iinsert (' INSERT INTO ips SET ip_address=$visitor_ip',[visitor_ip]);

            // додаємо в базу +1 нового коритсувача (хост) и +1 перегляд
            DB::update(' UPDATE visits SET hosts_guid=hosts_guid+1,views_guid=views_guid+1 WHERE date=$date',[date]);

        }
    }
    }
