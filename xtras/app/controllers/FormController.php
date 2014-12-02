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
        //    !is_null(Input::get('pkw')) || !is_null(Input::get('flugzeug')) || !is_null(Input::get('egal'));

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

            /**'Verkehrsmittel' => $checkboxVerkehrsmittel == 0,*/

            /**'behaelter' => $_POST["behaelter"] == 'Container' || $_POST["behaelter"] == 'Palette' || $_POST["behaelter"] == 'Boxen',*/


            'anzahlBehaelter' => 'required|numeric',

            'beschreibung' => 'required|alpha_dash|digits_between:0,250',

            'gewicht' => 'required|numeric',

            /**'einheit' => $_POST["einheit"] == 'Kilogramm' || $_POST["einheit"] == 'Tonnen',*/

            'verpackung' => 'alpha_dash|digits_between:0,100',

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
                ->withErrors($validator);// send back all errors to the form
        } else {
            //persist
            ;


        }
    }
}