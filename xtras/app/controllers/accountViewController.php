<?php
/**
 * Created by PhpStorm.
 * User: Besitzer
 * Date: 25.11.2014
 * Time: 10:50
 */
class accountViewController extends BaseController
{

    public function validate()
    {

        $rules = array(
            'email-text' => 'required|email',
            'name-text' => 'required|alpha',
            'surname-text' => 'required|alpha',
            'country-text' => 'required|alpha',
            'housenumber-text' => 'required',
            'pincode-text' => 'required|numeric',
            'city-text' => 'required',
            'name-text' => 'required',
            'street-text' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('myAccount')
                ->withErrors($validator);// send back all errors to the form
        } else {



            $user = Auth::user();

            $user->nachname=Input::get('name-text');
            $user->vorname=Input::get('surname-text');
            $user->land=Input::get('country-text');
            $user->hausnummer=Input::get('housenumber-text');
            $user->postleitzahl=Input::get('pincode-text');
            $user->ort=Input::get('city-text');
            $user->strasse=Input::get('street-text');

            $user->save();

            return Redirect::to('myAccount');

        }
    }
}