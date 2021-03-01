<?php

namespace App\Http\Controllers;

use App\Models\Presensi;
use DateTimeZone;
use DateTime;
use Illuminate\Http\Request;

class PresensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Presensi.PresensiMasuk');
    }

    public function presensiKeluar()
    {
        return view('Presensi.PresensiKeluar');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $time = 'Asia/Jakarta';
        $date = new DateTime('now', new DateTimeZone($time));
        $tanggal = $date->format('Y-m-d');
        $localTime = $date->format('H:i:s');

        $presensi = Presensi::where([
            ['user_id', '=', auth()->user()->id],
            ['tanggal', '=', $tanggal],
        ])->first();

        if ($presensi) {
            dd("Data sudah ada");
        } else {
            Presensi::create([
                'user_id' => auth()->user()->id,
                'tanggal' => $tanggal,
                'jam_masuk' => $localTime
            ]);
        }

        return redirect('presensi-masuk');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function pulang()
    {
        $time = 'Asia/Jakarta';
        $date = new DateTime('now', new DateTimeZone($time));
        $tanggal = $date->format('Y-m-d');
        $localTime = $date->format('H:i:s');

        $presensi = Presensi::where([
            ['user_id', '=', auth()->user()->id],
            ['tanggal', '=', $tanggal],
        ])->first();

        $data = [
            'jam_keluar' => $localTime,
            'jam_kerja' => date("H:i:s", strtotime($localTime) - strtotime($presensi->jam_masuk))
        ];

        if ($presensi->jam_keluar == "") {
            $presensi->update($data);
            return redirect('presensi-masuk');
        } else {
            dd("Data sudah ada");
        }
    }

    public function rekapView()
    {
        return view('Presensi.RekapView');
    }
    public function rekap($tanggal_awal, $tanggal_akhir)
    {

        $presensi = Presensi::with('user')->whereBetween('tanggal', [$tanggal_awal, $tanggal_akhir])->orderBy('tanggal', 'asc')->get();
        return view('Presensi.Rekap', compact('presensi'));
    }
    public function update(Request $request, $id)
    {
        $time = 'Asia/Jakarta';
        $date = new DateTime('now', new DateTimeZone($time));
        $tanggal = $date->format('Y-m-d');
        $localTime = $date->format('H:i:s');

        $presensi = Presensi::where([
            ['user_id', '=', auth()->user()->id],
            ['tanggal', '=', $tanggal],
        ])->first();

        $data = [
            'jam_keluar' => $localTime,
            'jam_kerja' => date("H:i:s", strtotime($localTime) - strtotime($presensi->jam_masuk))
        ];

        if ($presensi->jam_keluar == "") {
            $presensi->update($data);
            return redirect('presensi-masuk');
        } else {
            dd("Data sudah ada");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
