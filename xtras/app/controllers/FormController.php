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
        $currentDate= new DateTime(null, new DateTimeZone('Europe/Berlin'));
        $abholtermin= $_POST["abholtermin"];
        $minLiefertermin= $_POST["minLiefertermin"];

        // validate the info, create rules for the inputs
        $rules = array(
          /** 'abholadresse_ort' => 'trim|required|alpha_dash',
            'abholadresse_strasse' => 'trim|required|alpha_dash',
            'abholadresse_hausnummer' => 'trim|required|alpha_num',
            'abholadresse_postleitzahl' => 'trim|required|num|exact_length[5]',
            'abholadresse_land' => 'trim|required|alpha',

            'lieferadresse_ort' => 'trim|required|alpha_dash',
            'lieferadresse_strasse' => 'trim|required|alpha_dash',
            'lieferadresse_hausnummer' => 'trim|required|alpha_num',
            'lieferadresse_postleitzahl' => 'trim|required|num|exact_length[5]',
            'lieferadresse_land' => 'trim|required|alpha',
           */

            'abholtermin' => 'required|date_format:mm/dd/yyyy'|!'before:'.$currentDate->format('mm/dd/yyyy'),
            'minLiefertermin' => 'required|date_format:mm/dd/yyyy'|!'before:'.$abholtermin,
            'maxLiefertermin' => 'required|date_format:mm/dd/yyyy'|!'before:'.$minLiefertermin,

            'Verkehrsmittel' => '$_POST["schiff"] || $_POST["lkw"] || $_POST["zug"] || $_POST["pkw"] || $_POST["flugzeug"] || $_POST["egal"] == 1',


            'anzahlBehaelter' => 'required|is_natural_no_zero',

            'beschreibung' => 'required|alpha_dash|max_length[10000]',

            'gewicht' => 'required|is_natural_no_zero',

            'verpackung' => 'alpha_dash|max_length[100]',

            'bemerkung' => 'alpha_dash|max_length[1000]'


        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('secure')
                ->withErrors($validator);// send back all errors to the form
        } else {
            //persist
            ;


        }
    }
}