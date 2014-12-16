<?php
/**
 * Created by PhpStorm.
 * User: Besitzer
 * Date: 25.11.2014
 * Time: 10:50
 */
class FormController  extends BaseController
{

    public function validate()
    {


        //$abholtermin= $_POST["abholtermin"];
        //$minLiefertermin= $_POST["minLiefertermin"];
        //$checkboxVerkehrsmittel= !is_null(Input::get('schiff')) || !is_null(Input::get('lkw')) || !is_null(Input::get('zug')) ||
         //   !is_null(Input::get('pkw')) || !is_null(Input::get('flugzeug')) || !is_null(Input::get('egal'));

        // validate the info, create rules for the inputs
        $rules = array(


            'lp_name' => 'required|alpha_dash',
            'lp_street' => 'required|alpha_dash',
            'lp_number' => 'required|alpha_num',
            'lp_plz' => 'required|numeric|digits:5',
            'lp_city' => 'required|alpha_dash',

            'dp_name' => 'required|alpha_dash',
            'dp_street' => 'required|alpha_dash',
            'dp_number' => 'required|alpha_num',
            'dp_plz' => 'required|numeric|digits:5',
            'dp_city' => 'required|alpha_dash',


           // 'abholtermin' => 'required|date_format:mm/dd/yyyy|liegtInVergangenheit',
           // 'minLiefertermin' => 'required|date_format:mm/dd/yyyy'|!'before:'.$abholtermin,
           // 'maxLiefertermin' => 'required|date_format:mm/dd/yyyy'|!'before:'.$minLiefertermin,

           // 'Verkehrsmittel' => $checkboxVerkehrsmittel == 0,

            /**'behaelter' => $_POST["behaelter"] == 'Container' || $_POST["behaelter"] == 'Palette' || $_POST["behaelter"] == 'Boxen',*/


            'anzahlBehaelter' => 'required|numeric|min:1',

            'beschreibung' => 'required|alpha_dash|digits_between:0,250',

            'gewicht' => 'required|numeric|min:1',

            /**'einheit' => $_POST["einheit"] == 'Kilogramm' || $_POST["einheit"] == 'Tonnen',*/

            'verpackung' => 'alpha_dash|digits_between:0,250',

            'bemerkung' => 'alpha_dash|digits_between:0,250'


        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

       /** $validator -> sometimes('abholtermin', 'liegtInVergangenheit', function()
        {
            $currentDate= new DateTime(null, new DateTimeZone('Europe/Berlin'));
            $abholtermin= Input::get('abholtermin');
            return   $abholtermin = !before:$currentDate->format('mm/dd/yyyy');
        });*/

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('secure')
                ->withInput()
                ->withErrors($validator);// send back all errors to the form

        } else {
            //persist



            $order = new Order();

            $order->lieferdatum=date("Y-m-d", strtotime(Input::get('abholtermin')));
            $order->minlieferzeit=date("Y-m-d", strtotime(Input::get('minLiefertermin')));
            $order->maxlieferzeit=date("Y-m-d", strtotime(Input::get('maxLiefertermin')));


            $order->anzahltransportbehaelter=Input::get('anzahlBehaelter');
            $order->transportbehaelter=Input::get('behaelter');
            $order->warenbeschreibung=Input::get('beschreibung');
            if(Input::has('gefahrgut'))
            $order->gefahrengut=Input::get('gefahrgut');

            $order->warenverpackung=Input::get('verpackung');
            $order->warengewicht=Input::get('gewicht');
            $order->bemerkung=Input::get('bemerkung');

            //transportmittel:

            if(Input::has('schiff'))
            $order->schiff=1;
            if(Input::has('lkw'))
            $order->lkw=1;
            if(Input::has('zug'))
            $order->zug=1;
            if(Input::has('pkw'))
            $order->pkw=1;
            if(Input::has('flugzeug'))
            $order->flugzeug=1;
            if(Input::has('egal'))
            $order->egal=1;

            //userid
            $order->userid=Auth::id();


            //adresse

            $abholadresse = new Adress();
            $abholadresse->firma=Input::get('lp_name');
            $abholadresse->strasse=Input::get('lp_street');
            $abholadresse->hausnummer=Input::get('lp_number');
            $abholadresse->postleitzahl=Input::get('lp_plz');
            $abholadresse->ort=Input::get('lp_city');


            $abholadresse->save();
            $order->abholadresse=$abholadresse->id;

            $lieferadresse = new Adress();
            $lieferadresse->firma=Input::get('dp_name');
            $lieferadresse->strasse=Input::get('dp_street');
            $lieferadresse->hausnummer=Input::get('dp_number');
            $lieferadresse->postleitzahl=Input::get('dp_plz');
            $lieferadresse->ort=Input::get('dp_city');



            $lieferadresse->save();
            $order->lieferadresse=$lieferadresse->id;

            $order->abgesendet=\Carbon\Carbon::now();





            $order->save();

              return Redirect::to('secure')
                ->with('saved', 'saved');

        }
    }
}