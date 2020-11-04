<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use LaravelFullCalendar\Facades\Calendar;

class UserHomeController extends Controller
{

    public function index() {
        $title = "MPP User - Home";

        return view('user.user-home', [
            'title' => $title
        ]);
    }


    public function calculator() {
        $title = "MPP User - Calculator";

        return view('user.calculator.calculate', [
            'title' => $title
        ]);
    }

    public function support() {
        $title = "MPP User - Support";

        return view('user.support.support', [
            'title' => $title
        ]);
    }

    public function eventCalendar() {
        $title = "MPP User - Events";

        $events = Event::all();
        $event = [];

        foreach ($events as $data) {
            $event[] = Calendar::event(
                $data->title,
                false,
                new \DateTime($data->start),
                new \DateTime($data->end),
                $data->id,
                [
                    'color' => $data->color,
                ]
            );
        }

        $calendar = Calendar::addEvents($event);

        return view('user.events.event', [
            'title' => $title,
            'calendar' => $calendar
        ]);
    }

    public function twofactor() {
        $title = "MPP User - 2FA";

        return view('user.profile.two-factor', [
            'title' => $title
        ]);
    }
}
