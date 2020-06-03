<?php

namespace App\Http\Controllers;

use App\Services\Google;
use Illuminate\Http\Request;
use Google_Client;
use  Google_Service_Calendar;
use App\Components\GoogleClient;
use Google_Service_Calendar_Event;
class googleCalendarController extends Controller
{
    protected $client;

    public function __construct(GoogleClient $client)
    {
        $this->client = $client->getClient();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
    public function store(Request $request, Google $google)
    {
//        dd($request->email);
//        $calendarService = new Google_Service_Calendar($this->client);
//
//        $event = new \Google_Service_Calendar_Event([
//            'summary' => $request->title,
//            'description' => 'jhjhjh',
//            'start' => [
//                'dateTime' => '2020-06-01T04:09:29+00:00'
//            ],
//            'end' => [
//                'dateTime' => '2020-06-04T04:09:29+00:00'
//            ],
//
//        ]);
//        $calendarService->events->insert('xuxudbsk1998@gmail.com', $event);
        if (! $request->has('code')) {
            return redirect($google->createAuthUrl());
        }

        // Use the given code to authenticate the user.
        $google->authenticate($request->get('code'));

        // Make a call to the Google+ API to get more information on the account.
        $account = $google->service('Plus')->people->get('me');

        auth()->user()->googleAccounts()->updateOrCreate(
            [
                // Map the account's id to the `google_id`.
                'google_id' => $account->id,
            ],
            [
                // Use the first email address as the Google account's name.
                'name' => head($account->emails)->value,

                // Last but not least, save the access token for later use.
                'token' => $google->getAccessToken(),
            ]
        );

        return redirect()->route('index');
    }
    private function getAttendees($emails)
    {
        $attendees = [];
dd($emails);
        foreach ($emails as $email) {
            if ($email) {
                $attendees[] = [
                    'email' => $email
                ];
            }
        }

        return $attendees;
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
    public function update(Request $request, $id)
    {
        //
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
