<?php
/**
 * Created by PhpStorm.
 * User: Besitzer
 * Date: 25.11.2014
 * Time: 10:50
 */
class FormController  extends BaseController
{


    public function start()
    {

        if (Input::get('submit')) {
            return $this->validateSubmit();
        } elseif (Input::get('save')) {
            return  $this->validateSave();
        }

    }



    public function validateSubmit()
    {

        date_default_timezone_set('Europe/Berlin');

        //see what timezone the server is currently in via:
        //$timezone = date_default_timezone_get();
        //echo "The current server timezone is: " . $timezone;


        $yesterday = date('m/d/Y', time() - 86400);
        $abholtermin = date('m/d/Y', strtotime(Input::get('abholtermin')) - 86400);
        $minLiefertermin = date('m/d/Y', strtotime(Input::get('minLiefertermin')) - 86400);

        // validate the info, create rules for the inputs
        $rules = array(


            'lp_name' => 'required|alpha_spaces_simple|between:0,32',
            'lp_street' => 'required|alpha_spaces_simple|between:0,64',
            'lp_number' => 'required|alpha_num|between:0,5',
            'lp_plz' => 'required|numeric|digits:5',
            'lp_city' => 'required|alpha_spaces_simple|between:0,64',

            'dp_name' => 'required|alpha_spaces_simple|between:0,32',
            'dp_street' => 'required|alpha_spaces_simple|between:0,64',
            'dp_number' => 'required|alpha_num|between:0,5',
            'dp_plz' => 'required|numeric|digits:5',
            'dp_city' => 'required|alpha_spaces_simple|between:0,64',


            'abholtermin' => 'required|date_format:m/d/Y|after:'.$yesterday,
            'minLiefertermin' => 'required|date_format:m/d/Y|after:'.$abholtermin,
            'maxLiefertermin' => 'required|date_format:m/d/Y|after:'.$minLiefertermin,

            'anzahlBehaelter' => 'required|numeric|min:1|digits_between:0,11',
            'beschreibung' => 'required|alpha_spaces|between:0,250',
            'gewicht' => 'required|numeric|min:1|digits_between:0,20',
            'verpackung' => 'alpha_spaces|between:0,250',
            'bemerkung' => 'alpha_spaces|between:0,250',
            'transportmittel' => 'required'

        );
        //Sonderzeichen für Beschreibung, Verpackung und Bemerkung
        Validator::extend('alpha_spaces', function($attribute, $value)
        {
            return preg_match('/^[\pL\s\w-+&?%@€:()_.,0-9]+$/u', $value);
        });
        //Sonderzeichen für Verlade- und Zielort
        Validator::extend('alpha_spaces_simple', function($attribute, $value)
        {
            return preg_match('/^[\pL\s-()_.,]+$/u', $value);
        });
        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);


        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('secure')
                ->withInput()
                ->withErrors($validator);// send back all errors to the form

        } else {
            //persist

            return $this->submit();


        }
    }


    public function submit()
    {
        $order = new Order();

        $order->lieferdatum = date("Y-m-d", strtotime(Input::get('abholtermin')));
        $order->minlieferzeit = date("Y-m-d", strtotime(Input::get('minLiefertermin')));
        $order->maxlieferzeit = date("Y-m-d", strtotime(Input::get('maxLiefertermin')));


        $order->anzahltransportbehaelter = Input::get('anzahlBehaelter');
        $order->transportbehaelter = Input::get('behaelter');
        $order->warenbeschreibung = Input::get('beschreibung');
        if (Input::has('gefahrgut'))
            $order->gefahrengut = Input::get('gefahrgut');

        $order->warenverpackung = Input::get('verpackung');
        $order->warengewicht = Input::get('gewicht');
        $order->bemerkung = Input::get('bemerkung');

        $transportmittel =  Input::get('transportmittel', array());
        if(in_array('schiff', $transportmittel))
            $order->schiff = 1;
        if(in_array('lkw', $transportmittel))
            $order->lkw = 1;
        if(in_array('zug', $transportmittel))
            $order->zug = 1;
        if(in_array('pkw', $transportmittel))
            $order->pkw = 1;
        if(in_array('flugzeug', $transportmittel))
            $order->flugzeug = 1;
        if(in_array('egal', $transportmittel))
            $order->egal = 1;

        //userid
        $order->userid = Auth::id();


        //adresse

        $abholadresse = new Adress();
        $abholadresse->firma = Input::get('lp_name');
        $abholadresse->strasse = Input::get('lp_street');
        $abholadresse->hausnummer = Input::get('lp_number');
        $abholadresse->postleitzahl = Input::get('lp_plz');
        $abholadresse->ort = Input::get('lp_city');


        $abholadresse->save();
        $order->abholadresse = $abholadresse->id;

        $lieferadresse = new Adress();
        $lieferadresse->firma = Input::get('dp_name');
        $lieferadresse->strasse = Input::get('dp_street');
        $lieferadresse->hausnummer = Input::get('dp_number');
        $lieferadresse->postleitzahl = Input::get('dp_plz');
        $lieferadresse->ort = Input::get('dp_city');


        $lieferadresse->save();
        $order->lieferadresse = $lieferadresse->id;

        $order->abgesendet = \Carbon\Carbon::now();
        $order->abgespeichert = \Carbon\Carbon::now();

        $order->save();

        echo SubmitController::get_order_as_xml($order, $abholadresse, $lieferadresse);
        return;
        /*return Redirect::to('secure')
        ->with('saved', 'saved');*/
    }

    public function validateSave()
    {
        date_default_timezone_set('Europe/Berlin');

        //see what timezone the server is currently in via:
        //$timezone = date_default_timezone_get();
        //echo "The current server timezone is: " . $timezone;


        $yesterday = date('m/d/Y', time() - 86400);
        $abholtermin= date('m/d/Y', strtotime(Input::get('abholtermin')) - 86400);
        $minLiefertermin= date('m/d/Y', strtotime(Input::get('minLiefertermin')) - 86400);

        $rules = array(

            'lp_name' => 'alpha_spaces_simple|between:0,32',
            'lp_street' => 'alpha_spaces_simple|between:0,64',
            'lp_number' => 'alpha_num|between:0,5',
            'lp_plz' => 'numeric|digits:5',
            'lp_city' => 'alpha_spaces_simple|between:0,64',

            'dp_name' => 'alpha_spaces_simple|between:0,32',
            'dp_street' => 'alpha_spaces_simple|between:0,64',
            'dp_number' => 'alpha_num|between:0,5',
            'dp_plz' => 'numeric|digits:5',
            'dp_city' => 'alpha_spaces_simple|between:0,64',


            'abholtermin' => 'date_format:m/d/Y|after:'.$yesterday,
            'minLiefertermin' => 'date_format:m/d/Y|after:'.$abholtermin,
            'maxLiefertermin' => 'date_format:m/d/Y|after:'.$minLiefertermin,

            'anzahlBehaelter' => 'numeric|min:1|digits_between:0,11',
            'beschreibung' => 'alpha_spaces|between:0,250',
            'gewicht' => 'numeric|min:1|digits_between:0,20',
            'verpackung' => 'alpha_spaces|between:0,250',
            'bemerkung' => 'alpha_spaces|between:0,250',




        );
        //Sonderzeichen für Beschreibung, Verpackung und Bemerkung
        Validator::extend('alpha_spaces', function($attribute, $value)
        {
            return preg_match('/^[\pL\s\w-+&?%@€:()_.,0-9]+$/u', $value);
        });
        //Sonderzeichen für Verlade- und Zielort
        Validator::extend('alpha_spaces_simple', function($attribute, $value)
        {
            return preg_match('/^[\pL\s-()_.,]+$/u', $value);
        });
        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);


        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('secure')
                ->withInput()
                ->withErrors($validator);// send back all errors to the form

        } else {
            //persist

            return $this->save();


        }
    }

    public function save()
    {
        $order = new Order();

        $order->lieferdatum = date("Y-m-d", strtotime(Input::get('abholtermin')));
        $order->minlieferzeit = date("Y-m-d", strtotime(Input::get('minLiefertermin')));
        $order->maxlieferzeit = date("Y-m-d", strtotime(Input::get('maxLiefertermin')));


        $order->anzahltransportbehaelter = Input::get('anzahlBehaelter');
        $order->transportbehaelter = Input::get('behaelter');
        $order->warenbeschreibung = Input::get('beschreibung');
        if (Input::has('gefahrgut'))
            $order->gefahrengut = Input::get('gefahrgut');

        $order->warenverpackung = Input::get('verpackung');
        $order->warengewicht = Input::get('gewicht');
        $order->bemerkung = Input::get('bemerkung');

        $transportmittel =  Input::get('transportmittel', array());
        if(in_array('schiff', $transportmittel))
            $order->schiff = 1;
        if(in_array('lkw', $transportmittel))
            $order->lkw = 1;
        if(in_array('zug', $transportmittel))
            $order->zug = 1;
        if(in_array('pkw', $transportmittel))
            $order->pkw = 1;
        if(in_array('flugzeug', $transportmittel))
            $order->flugzeug = 1;
        if(in_array('egal', $transportmittel))
            $order->egal = 1;

        //userid
        $order->userid = Auth::id();


        //adresse

        $abholadresse = new Adress();
        $abholadresse->firma = Input::get('lp_name');
        $abholadresse->strasse = Input::get('lp_street');
        $abholadresse->hausnummer = Input::get('lp_number');
        $abholadresse->postleitzahl = Input::get('lp_plz');
        $abholadresse->ort = Input::get('lp_city');


        $abholadresse->save();
        $order->abholadresse = $abholadresse->id;

        $lieferadresse = new Adress();
        $lieferadresse->firma = Input::get('dp_name');
        $lieferadresse->strasse = Input::get('dp_street');
        $lieferadresse->hausnummer = Input::get('dp_number');
        $lieferadresse->postleitzahl = Input::get('dp_plz');
        $lieferadresse->ort = Input::get('dp_city');


        $lieferadresse->save();
        $order->lieferadresse = $lieferadresse->id;

        // speichern ohne zeitstempel
        // $order->abgesendet = \Carbon\Carbon::now();

        $order->abgespeichert = \Carbon\Carbon::now();

        $order->save();

        return Redirect::to('secure')
            ->with('saved', 'saved');
    }

}