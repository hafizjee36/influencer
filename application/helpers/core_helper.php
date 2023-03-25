<?php defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('pre'))
{
    function pre($params)
    {
        echo'<pre>';print_r($params);die;
    }
}

if ( ! function_exists('get_hashtag_posts'))
{
    function get_hashtag_posts($hashtag, $access_token) {
        $url = "https://graph.instagram.com/v1/tags/" . urlencode($hashtag) . "/media/recent?access_token=" . urlencode($access_token);
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);
        echo $response;die;
        return json_decode($response);
    }
}

if ( ! function_exists('get_platforms')) {
    function get_platforms($id)
    {
        $CI =& get_instance();
        $CI->db->order_by('title', 'ASC');
        $CI->db->from('influencer');
        $result = $CI->db->get()->result();
        if (!$result) {
            return FALSE;
        }

        $html = '';
        foreach($result as $key => $r):
            $selected='';
            if ($id) {
                $selected = ($r['id'] == $id)?'selected="selected"':'';
            }
            $html.='<option value="'.$r->id.'" '.$selected.'>'.$r->title.'</option>';
        endforeach;
        
        return $html;
    }
}


if ( ! function_exists('get_card_list'))
{
    function get_card_list($card=null)
    {
        $opt = array(
            1 => 'Yellow', 
            2 => 'Yellow/Red', 
            3 => 'Red', 
        );
        $html = '';
        foreach ($opt as $key => $value) {
            $selected = '';
            if ($card) 
            {
                $selected = ($key == $card) ? 'selected = "selected"' : '';
            }
            $html .= '<option value='.$key.' '.$selected.'>'.$value.'</option>';
        }
        // print_r($html);die;
        return $html;
    }
}



if ( ! function_exists('get_month'))
{
    function get_month()
    {
        $result = array(
            'Jan' => 'Jan', 
            'Feb' => 'Feb', 
            'Mar' => 'Mar', 
            'Apr' => 'Apr', 
            'May' => 'May', 
            'Jun' => 'Jun', 
            'Jul' => 'Jul', 
            'Aug' => 'Aug', 
            'Sep' => 'Sep', 
            'Oct' => 'Oct', 
            'Nov' => 'Nov', 
            'Dec' => 'Dec'
        );
        $html = '';
        foreach ($result as $key => $value) {
            $html .= '<th>'.$value.'</th>';
        }
        return $html;
    }
}

if ( ! function_exists('get_month_opt'))
{
    function get_month_opt()
    {
        $result = array(
            'Jan' => 'Jan', 
            'Feb' => 'Feb', 
            'Mar' => 'Mar', 
            'Apr' => 'Apr', 
            'May' => 'May', 
            'Jun' => 'Jun', 
            'Jul' => 'Jul', 
            'Aug' => 'Aug', 
            'Sep' => 'Sep', 
            'Oct' => 'Oct', 
            'Nov' => 'Nov', 
            'Dec' => 'Dec'
        );
        $html = '';
        foreach ($result as $key => $value) {
            $html .= '<option value='.$key.'>'.$value.'</option>';
        }
        return $html;
    }
}

if ( ! function_exists('get_years')) {
    function get_years()
    {
        $html = '';
        for ($i=0; $i < 15; $i++):
            $year = date('Y', strtotime('-'.$i.' year'));
            $html.='<option value="'.$year.'">'.$year.'</option>';
        endfor;
        
        return $html;
    }
}


if ( ! function_exists('get_states')) {
    function get_states()
    {
        $CI =& get_instance();
        $CI->db->order_by('id', 'desc');
        $CI->db->select('DISTINCT(state_name),state_code');
        $CI->db->from('states');
        $result = $CI->db->get()->result();
        if (!$result) {
            return FALSE;
        }

        $html = '';
        foreach($result as $key => $r):
            $html.='<option value="'.$r->state_code.'">'.$r->state_name.'</option>';
        endforeach;
        
        return $html;
    }
}

if ( ! function_exists('get_countries'))
{
    function get_countries()
    {
        $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
        $html = '';
        foreach ($countries as $value) {
            $html .= '<option value='.$value.'>'.$value.'</option>';
        }
        return $html;
    }
}

if ( ! function_exists('get_teams')) {
    function get_teams($team=NULL)
    {
        $CI =& get_instance();
        $CI->db->order_by('id','desc');
        $CI->db->select('*');
        $CI->db->from('teams');
        $result = $CI->db->get()->result();
        if (!$result) {
            return FALSE;
        }

        $html = '';
        foreach($result as $key => $r):
            $selected = ($r->id==$team) ? 'selected="selected"':'';
            $html.='<option value="'.$r->id.'" '.$selected.'>'.$r->name.'</option>';
        endforeach;
        
        return $html;
    }
}

if ( ! function_exists('get_matches')) {
    function get_matches($match_id=NULL)
    {
        $CI =& get_instance();
        $CI->db->order_by('id','desc');
        $CI->db->select('*');
        $CI->db->from('matches');
        $result = $CI->db->get()->result();
        if (!$result) {
            return FALSE;
        }

        $html = '';
        foreach($result as $key => $r):
            $selected = ($r->id==$match_id) ? 'selected="selected"':'';
            $html.='<option value="'.$r->id.'" '.$selected.'>'.$r->played_at.' ('.date('d.m.Y',strtotime($r->date)).')'.'</option>';
        endforeach;
        
        return $html;
    }
}

if ( ! function_exists('get_players')) {
    function get_players($score=NULL)
    {
        $CI =& get_instance();
        $CI->db->order_by('id','desc');
        $CI->db->select('*');
        $CI->db->from('players');
        $result = $CI->db->get()->result();
        if (!$result) {
            return FALSE;
        }

        $html = '';
        foreach($result as $key => $r):
            $selected = ($r->id==$score) ? 'selected="selected"':'';
            $html.='<option value="'.$r->id.'" '.$selected.'>'.$r->name.'</option>';
        endforeach;
        
        return $html;
    }
}

