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
    public static $city_name_alternative;
    public static $city_name_en;
    public static $city_name_together;
    public static $similar_cities = array();

    public static function find_cities($input, $language = "")
    {


        if (!$language) {
            $language = Session::$language;
        }
        $xml = simplexml_load_file("https://maps.google.com/maps/api/geocode/xml?address={$input}&language={$language}&sensor=false&key=AIzaSyBJ7mA9FiZXFX5yybUegALUivIPr8INa3I");
//        $xml = simplexml_load_file("https://maps.google.com/maps/api/geocode/xml?address={$input}&language={$language}&sensor=false&key=AIzaSyCFgdoH2WVDWfcmYXNU3VUwZDEir66AZcU");

        if ($xml) {
            foreach ($xml->result as $city) {
                self::$similar_cities[] = $city->formatted_address;
            }

            var_dump(self::$similar_cities);
            echo "---".$small_input = (strtolower(self::$city_name_input));
            echo "<br>";
            echo "--".$small_similars = strtolower(implode(array_map('strtolower', self::$similar_cities)));

            if (!strpos($small_input, $small_similars)) {
                echo "Huhuh";
                self::$city_name_selected = self::$similar_cities[0];
                self::$city_name_alternative=self::$city_name_selected;;
                Session::set_message("Der Ort " . self::$city_name_input . " konnte nicht gefunden werden. Meinten Sie eventuell " . self::$city_name_alternative . " ?");
            } else

                return self::$similar_cities;

        } else return false;
        return self::$similar_cities;
    }


    public
    static function find_weather($city, $language = "")
    {
        self::$city_name_input=$city;

        if (!self::$city_name_input && self::$city_name_selected) {

            $city = self::$city_name_selected;
        }
        self::translate_city_to_en($city);

        self::$city_name_together = str_replace(" ", "", self::$city_name_en);
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
        if (Session::$language != "en") {
            //find cityname from input in english

            self::$city_name_en = self::find_cities($city, "en");

            $first_english = substr(self::$city_name_en[0], 0, strpos(self::$city_name_en[0], ","));
            if (strpos ( (strtolower($city)) , (strtolower($first_english)) )) {
                self::$city_name_en = $first_english;
            } else {
                self::$city_name_en = self::find_cities($first_english, "en")[0];
            }

        } //if user is english set english name to input
        else {
            self::$city_name_en = self::$city_name_input;
        }
    }

}