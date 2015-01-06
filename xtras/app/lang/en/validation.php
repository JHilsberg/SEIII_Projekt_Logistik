<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

	"accepted"             => "The :attribute must be accepted.",
	"active_url"           => "The :attribute is not a valid URL.",
	"after"                => "The :attribute must be a date after :date.",
	"alpha"                => "The :attribute may only contain letters.",
	"alpha_dash"           => "The :attribute may only contain letters, numbers, and dashes.",
	"alpha_num"            => "The :attribute may only contain letters and numbers.",
	"array"                => "The :attribute must be an array.",
	"before"               => "The :attribute must be a date before :date.",
	"between"              => array(
		"numeric" => "The :attribute must be between :min and :max.",
		"file"    => "The :attribute must be between :min and :max kilobytes.",
		"string"  => "The :attribute must be between :min and :max characters.",
		"array"   => "The :attribute must have between :min and :max items.",
	),
	"boolean"              => "The :attribute field must be true or false.",
	"confirmed"            => "The :attribute confirmation does not match.",
	"date"                 => "The :attribute is not a valid date.",
	"date_format"          => "The :attribute does not match the format :format.",
	"different"            => "The :attribute and :other must be different.",
	"digits"               => "The :attribute must be :digits digits.",
	"digits_between"       => "The :attribute must be between :min and :max digits.",
	"email"                => "The :attribute must be a valid email address.",
	"exists"               => "The selected :attribute is invalid.",
	"image"                => "The :attribute must be an image.",
	"in"                   => "The selected :attribute is invalid.",
	"integer"              => "The :attribute must be an integer.",
	"ip"                   => "The :attribute must be a valid IP address.",
	"max"                  => array(
		"numeric" => "The :attribute may not be greater than :max.",
		"file"    => "The :attribute may not be greater than :max kilobytes.",
		"string"  => "The :attribute may not be greater than :max characters.",
		"array"   => "The :attribute may not have more than :max items.",
	),
	"mimes"                => "The :attribute must be a file of type: :values.",
	"min"                  => array(
		"numeric" => "The :attribute must be at least :min.",
		"file"    => "The :attribute must be at least :min kilobytes.",
		"string"  => "The :attribute must be at least :min characters.",
		"array"   => "The :attribute must have at least :min items.",
	),
	"not_in"               => "The selected :attribute is invalid.",
	"numeric"              => "The :attribute must be a number.",
	"regex"                => "The :attribute format is invalid.",
	"required"             => "The :attribute field is required.",
	"required_if"          => "The :attribute field is required when :other is :value.",
	"required_with"        => "The :attribute field is required when :values is present.",
	"required_with_all"    => "The :attribute field is required when :values is present.",
	"required_without"     => "The :attribute field is required when :values is not present.",
	"required_without_all" => "The :attribute field is required when none of :values are present.",
	"same"                 => "The :attribute and :other must match.",
	"size"                 => array(
		"numeric" => "The :attribute must be :size.",
		"file"    => "The :attribute must be :size kilobytes.",
		"string"  => "The :attribute must be :size characters.",
		"array"   => "The :attribute must contain :size items.",
	),
	"unique"               => "The :attribute has already been taken.",
	"url"                  => "The :attribute format is invalid.",
	"timezone"             => "The :attribute must be a valid zone.",
    "alpha_spaces" => "You have entered invalid characters.",
	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

    'custom' => array(

        'lp_name' => array(
            'required' => 'This mandatory field can not be empty.',
            'alpha_dash' => 'You have entered invalid characters.',
        ),
        'lp_street' => array(
            'required' => 'This mandatory field can not be empty.',
            'alpha_dash' => 'You have entered invalid characters.',
        ),
        'lp_number' => array(
            'required' => 'This mandatory field can not be empty.',
            'alpha_num' => 'You have entered invalid characters.',
        ),
        'lp_plz' => array(
            'required' => 'This mandatory field can not be empty.',
            'numeric' => 'You have entered invalid characters.',
            'digits' => 'The zip code must be 5 digits.',
        ),
        'lp_city' => array(
            'required' => 'This mandatory field can not be empty.',
            'alpha_dash' => 'You have entered invalid characters.',
        ),
        'dp_name' => array(
            'required' => 'This mandatory field can not be empty.',
            'alpha_dash' => 'You have entered invalid characters.',
        ),
        'dp_street' => array(
            'required' => 'This mandatory field can not be empty.',
            'alpha_dash' => 'You have entered invalid characters.',
        ),
        'dp_number' => array(
            'required' => 'This mandatory field can not be empty.',
            'alpha_num' => 'You have entered invalid characters.',
        ),
        'dp_plz' => array(
            'required' => 'This mandatory field can not be empty.',
            'numeric' => 'You have entered invalid characters.',
            'digits' => 'The zip code must be 5 digits.',
        ),
        'dp_city' => array(
            'required' => 'This mandatory field can not be empty.',
            'alpha_dash' => 'You have entered invalid characters.',
        ),

        'abholtermin' => array(
            'required' => 'This mandatory field can not be empty.',
            'date_format' => 'Your input has the wrong format.',
            'after' => 'The pick-up appointment must be in the future.',
        ),
        'minLiefertermin' => array(
            'required' => 'This mandatory field can not be empty.',
            'date_format' => 'Your input has the wrong format.',
            'after' => 'The earliest delivery appointment must occur after the pick-up appointment.',
        ),
        'maxLiefertermin' => array(
            'required' => 'This mandatory field can not be empty.',
            'date_format' => 'Your input has the wrong format.',
            'after' => 'The latest delivery appointment must occur after the earliest delivery appointment.',
        ),
        /**
        'behaelter' => array(
        $_POST["behaelter"] == 'Container' || $_POST["behaelter"] == 'Palette' || $_POST["behaelter"] == 'Boxen'
        => 'Sie haben einen falschen Behälter ausgewählt.',
        ),'*/

        'anzahlBehaelter' => array(
            'required' => 'This mandatory field can not be empty.',
            'numeric' => 'Number is invalid.',
            'min' => 'The number of containers must be at least 1.',
        ),
        'beschreibung' => array(
            'required' => 'This mandatory field can not be empty.',
            'alpha_dash' => 'You have entered invalid characters.',
            'digits_between' => 'You have exceeded the maximum character length for this field.',
        ),
        'gewicht' => array(
            'required' => 'This mandatory field can not be empty.',
            'numeric' => 'Number is invalid.',
            'min' => 'The weight of the goods must be specified. ',
        ),
        /**
        'einheit' => array(
            $_POST["einheit"] == 'Kilogramm' || $_POST["einheit"] == 'Tonnen'
            => 'Sie haben eine falsche Einheit ausgewählt.',
        ),*/
        'verpackung' => array(
            'alpha_dash' => 'You have entered invalid characters.',
            'digits_between' => 'You have exceeded the maximum character length for this field.',
        ),
        'bemerkung' => array(
            'alpha_dash' => 'You have entered invalid characters.',
            'digits_between' => 'You have exceeded the maximum character length for this field.',
        ),
        'transportmittel' => array(
            'required' => 'You must tick at least one of this options.',
        ),
    ),


    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => array(),

);

