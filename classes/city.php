<?php

/**
 * Created by PhpStorm.
 * User: simonewestphal
 * Date: 19.03.16
 * Time: 09:04
 */
class City
{

    public static $city_name_input;
    public static $city_name_selected;
//    public static $city_name_alternative;
    public static $city_name_en;
    public static $city_name_together;
    public static $similar_cities = array();


    public static function find_cities($input, $lang = null)
    {
        if (null == $lang) {
            $language = Session::get_language();
        } else $language = $lang;

        $xml = simplexml_load_file("https://maps.google.com/maps/api/geocode/xml?address={$input}&language={$language}&sensor=false&key=AIzaSyBJ7mA9FiZXFX5yybUegALUivIPr8INa3I");
        // $xml = simplexml_load_file("https://maps.google.com/maps/api/geocode/xml?address={$input}&language={$language}&sensor=false&key=AIzaSyCFgdoH2WVDWfcmYXNU3VUwZDEir66AZcU");

        if ($xml) {
            foreach ($xml->result as $city) {
                self::$similar_cities[] = $city->formatted_address;
            }

            $small_input = strtolower(self::$city_name_input);

            $small_similars = strtolower(implode(array_map('strtolower', self::$similar_cities), ","));

//            if (!strpos($small_input, $small_similars) && (isset(self::$city_name_alternative)) &&
//                (strtolower(self::$city_name_alternative) != strtolower(self::$city_name_input))
//            ) {
//
//            } else
//                return self::$similar_cities;

        } else return false;
        return self::$similar_cities;
    }


    public
    static function find_weather($city)
    {

        self::$city_name_input = $city;

        if (!self::$city_name_input && self::$city_name_selected) {

            $city = self::$city_name_selected;
        }

        self::translate_city_to_en($city);
        self::$city_name_together = str_replace(" ", "-", self::$city_name_en);
        $city_name_together_short = substr(self::$city_name_together, 0, (strpos(self::$city_name_together, ",")));
        $url = "http://www.weather-forecast.com/locations/" . $city_name_together_short . "/forecasts/latest";
        $weather_content = @file_get_contents($url);
        if ($weather_content) {
            preg_match_all('/class="phrase">(.*?)<\/span><\/span><\/span><\/p>/s', $weather_content, $matches);
            return $matches;
        } else {
            Session::set_message("Die Stadt <strong>" . self::$city_name_input . "</strong> ist nicht bekannt. Bitte versuchen Sie es noch einmal");
            return false;
        }
    }


    static function translate_city_to_en($city)
    {
        // find english name for city if user is not english

        //check if necessary
        if (Session::get_language() != "en") {
            //find cityname from input in english
//            echo "deutsch".(self::find_cities("munich", $lang="de")[0]);
            self::$city_name_en = self::find_cities($city, $lang = "en")[0];

            self::$city_name_selected = self::find_cities(self::$city_name_en, $lang = "de")[1];
            $first_english = substr(self::$city_name_en, 0, strpos(self::$city_name_en, ","));
            if (strpos((strtolower($city)), (strtolower($first_english)))) {
                self::$city_name_en = $first_english;
            }
//            else self::$city_name_en = self::find_cities($city, "en")[1];

        } //if user is english set english name to input
        else {
            self::$city_name_en = $city;
            self::$city_name_selected = self::find_cities(self::$city_name_en, $lang = "en")[0];
//self::$city_name_selected=self::find_cities(self::$city_name_en, $lang = "en")[0];
            self::$city_name_en = self::find_cities($city, $lang = "en")[0];

        }
    }

}