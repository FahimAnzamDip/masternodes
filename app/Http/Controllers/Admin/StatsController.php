<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stat;
use Illuminate\Http\Request;

class StatsController extends Controller
{

    public function index() {
        $title = "MPP Admin - Stats";
        $stat = Stat::first();

        return view('admin.stats.index', [
            'title' => $title,
            'stat'  => $stat
        ]);
    }

    public function update(Request $request) {
        $request->validate([
            'transaction_count' => 'required',
            'masternodes_count' => 'required',
            'community_count'   => 'required'
        ]);

        Stat::findOrFail($request->id)->update([
            'transaction_count' => $request->transaction_count,
            'masternodes_count' => $request->masternodes_count,
            'community_count'   => $request->community_count
        ]);

        toast('Stats Updated!', 'success');

        return redirect()->route('stats.index');
    }
}
