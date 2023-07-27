<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Http\Requests\StoreParticipantRequest;
use App\Http\Requests\UpdateParticipantRequest;
use App\Models\Diklat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard.diklat.partisipan', [
            'title' => "Partisipan Diklat | Dashboard Admin Guruku",
            'participants' => Participant::all()
        ]);
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
     * @param  \App\Http\Requests\StoreParticipantRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreParticipantRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function show(Participant $participant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function edit(Participant $diklat_partisipan)
    {
        return view('admin.dashboard.diklat.editPartisipan', [
            'title' => "Edit Partisipan Diklat | Dashboard Admin Guruku",
            'participant' => $diklat_partisipan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateParticipantRequest  $request
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Participant $diklat_partisipan)
    {
        $rules = [
            'certificate' => 'image|file|max:1024'
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('certificate')) {
            if ($request->oldCertificate) {
                Storage::delete($request->oldCertificate);
            }

            $validatedData['certificate'] = $request->file('certificate')->store('diklat-certificates');
        }

        $validatedData['status'] = $request->status;

        Participant::where('id', $diklat_partisipan->id)->update($validatedData);

        return redirect('/dashboard/diklat-partisipan')->with('edited', 'Data Partisipan Diklat Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Participant $participant)
    {
        //
    }
}
