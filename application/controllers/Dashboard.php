<?php
/* 
 * Developed By: Hafiz Hassan
 * Phone# +92303-7859398
 * Date: 05-10-2020
 */
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

require_once('vendor/autoload.php');
use Abraham\TwitterOAuth\TwitterOAuth;

use MetzWeb\Instagram\Instagram;

use GuzzleHttp\Client;


 
class Dashboard extends Admin_Controller{
    
    function __construct()
    {
        parent::__construct();

        $consumer_key = '0LoxUbEqku8ATr9OLclO819S7';
        $consumer_secret = 'Wii0NrGIde5le303oeZQmJCebJ2ZpBnwGMNzsOJQpfZjyndsZ9';
        $access_token = '1407707689589805056-Tn0A9Die74jSfzBxDxI4NzBnsc6ndW';
        $access_token_secret = 'RswXtUqTsuprTvvqximPt7dRmJ9ofaVuOeSnrt6j9N10B';

        $this->data['con'] = new TwitterOAuth($consumer_key, $consumer_secret, $access_token, $access_token_secret);
        
    }

    function index()
    {
        $data['page_title']     = 'Dashboard';
        $data['tot_user'] = $this->User_model->get_all_users_count();
        $data['tot_influen'] = $this->admin->get_record_count('influencer');

        $data['month5'] = date('M Y',strtotime('-5 month'));
        // $data['earn5'] = $this->dashboard->get_report(date('Y-m-d',strtotime('-5 month')));
        $data['month4'] = date('M Y',strtotime('-4 month'));
        // $data['earn4'] = $this->dashboard->get_report(date('Y-m-d',strtotime('-5 month')));
        $data['month3'] = date('M Y',strtotime('-3 month'));
        // $data['earn3'] = $this->dashboard->get_report(date('Y-m-d',strtotime('-5 month')));
        $data['month2'] = date('M Y',strtotime('-2 month'));
        // $data['earn2'] = $this->dashboard->get_report(date('Y-m-d',strtotime('-5 month')));
        $data['month1'] = date('M Y',strtotime('-1 month'));
        // $data['earn1'] = $this->dashboard->get_report(date('Y-m-d',strtotime('-5 month')));
        // $data['earn'] = $this->dashboard->get_report();

        $data['_view'] = 'dashboard';
        $this->load->view('layouts/main',$data);
    }

    public function twitter()
    {
        $data['page_title']     = 'Twitter';
        $data['results']='';
        $data['tweets']='';
        $data['likes']='';
        $data['retweets']='';
        $data['replies']='';
        if (isset($_POST) && count($_POST) > 0) 
        {
            $tag = $this->input->post('hashtag');
            $query = array(
              "q" => "#".$tag,
              "count" => "100",
            );

            $results = $this->data['con']->get('search/tweets', $query);
            $tweets  =random_int(10, 2000);
            $likes   =random_int(10, 2000);
            $retweet =0;
            $replies =random_int(10, 1000);
            foreach($results->statuses as $key =>$r){
                $retweet+= $r->retweet_count;
            }

            $data['results']= $results;
            $data['tweets']= $tweets;
            $data['likes']= $likes;
            $data['retweets']= $retweet;
            $data['replies']= $replies;
            // echo'<pre>';print_r($results->statuses[0]);

            
        }
        
        $data['_view'] = 'modules/twitter';
        $this->load->view('layouts/main',$data);
    }

    public function instagram()
    {
        $data['page_title']     = 'Instagram';

        $data['tweets']='';
        $data['likes']='';
        $data['retweets']='';
        $data['replies']='';
        $data['results']='';
        if (isset($_POST) && count($_POST) > 0) 
        {
            $tag = $this->input->post('hashtag');
            $query = array(
              "q" => "#".$tag,
              "count" => "100",
            );

            $results = $this->data['con']->get('search/tweets', $query);

            $data['results']= $results;
            // echo'<pre>';print_r($results);
            
        }
        
        $data['_view'] = 'modules/instagram';
        $this->load->view('layouts/main',$data);
    }

    public function tiktok()
    {
        $data['page_title']     = 'Tiktok';

        $data['tweets']='';
        $data['likes']='';
        $data['retweets']='';
        $data['replies']='';
        $data['results']='';
        if (isset($_POST) && count($_POST) > 0) 
        {
            $tag = $this->input->post('hashtag');
            $query = array(
              "q" => "#".$tag,
              "count" => "100",
            );

            $results = $this->data['con']->get('search/tweets', $query);

            $data['results']= $results;
            // echo'<pre>';print_r($results);
            
        }
        
        $data['_view'] = 'modules/tiktok';
        $this->load->view('layouts/main',$data);
    }

    public function telegram()
    {
        $data['page_title']     = 'Telegram';

        $data['tweets']='';
        $data['likes']='';
        $data['retweets']='';
        $data['replies']='';
        $data['results']='';
        if (isset($_POST) && count($_POST) > 0) 
        {
            $tag = $this->input->post('hashtag');

            $token = 'YOUR_API_TOKEN_HERE';
            $chat_id = 'CHAT_ID_HERE';

            $url = 'https://api.telegram.org/bot' . $token . '/getChat?chat_id=' . $chat_id;
            $response = file_get_contents($url);
            $json = json_decode($response, true);

            $description = $json['result']['description'];
            preg_match_all('/#\w+/', $description, $tag);

            print_r($tag[0]);die;

            $data['results']= $results;
            // echo'<pre>';print_r($results);
            
        }
        
        $data['_view'] = 'modules/telegram';
        $this->load->view('layouts/main',$data);
    }

    public function twitter1()
    {
        $tweets = $this->data['con']->get("statuses/user_timeline", ["count" => 10, "exclude_replies" => true]);
        echo '<br>Twitt<pre>';print_r($tweets[0]);
        // $status = $connection->post("statuses/update", ["status" => "Hello, Twitter!"]);

    }
    public function twitter_hashtag()
    {
        $data['page_title']     = 'Seach hashtags';
        // if (isset($_POST) && count($_POST) > 0) 
        // {
            $query = array(
              "q" => "#cricket",
              "count" => "1000",
            );

            $results = $this->data['con']->get('search/tweets', $query);

            $data['results']= $results;

            // echo'<pre>';print_r($results);
            $data['_view'] = 'modules/search';
            $this->load->view('layouts/main',$data);
        // }
            
    }

    public function insagram_hashtag()
    {
        // Set up the API endpoint
        $tag_name = 'cricket';
        $access_token = 'IGQVJWb1NScnN1cWtzQ3NtRDJOSWpCZAEgxMFl5VkphZAWRXMDZAxYkdzSGxWYWRyaS1EMjJWcUlLelhRTGZAJLXBBMm1PZA3FncUNnNW1NQmd3SkNqMG45Mml5V2hTSEZAtbWZABaFVXV1VPTmVWRjVOSGE1bAZDZD';
        $endpoint = "https://api.instagram.com/v1/tags/$tag_name/media/recent?access_token=$access_token";

        // Make the API request
        $response = file_get_contents($endpoint);
        print_r($response);die;
        // Parse the JSON data
        $data = json_decode($response, true);

        echo $response;die;

        // Output the results
        foreach ($data['data'] as $post) {
            echo '<img src="' . $post['images']['standard_resolution']['url'] . '">';
            echo '<p>' . $post['caption']['text'] . '</p>';
        }
    }

    public function insta_hashtag()
    {
        // Set up the API endpoint and access token
        $endpoint = 'https://graph.instagram.com';
        $access_token = 'IGQVJXUl9iamhmd2s3UXkwUkhrRlQzTkVLNjNKdlJvSXVQaFA5UDl4a0VqQThNT2k3VWFsTUk1b2hHeXVZAQVBDVjdCWG9GT19LcTFXbEc1R09pSTRmbU5kSzRJampIWk82UTB1Vkc2SUFFcW94OGh3TwZDZD';

        // Set up the hashtag to search for
        $hashtag = 'cricket';

        // Search for the hashtag and get its ID
        $url = "$endpoint/v12.0/ig_hashtag_search?q=$hashtag&access_token=$access_token";
        $response = json_decode(file_get_contents($url), true);
        $hashtag_id = $response['data'][0]['id'];

        // Retrieve recent media for the hashtag
        $url = "$endpoint/$hashtag_id/recent_media?access_token=$access_token";
        $response = json_decode(file_get_contents($url), true);
         echo'<pre>';print_r($response);die;

        // Process the response data as needed
        foreach ($response['data'] as $media) {
            // Do something with the media data
        }
    }

    public function hash1()
    {
        $accessToken = 'IGQVJWb1NScnN1cWtzQ3NtRDJOSWpCZAEgxMFl5VkphZAWRXMDZAxYkdzSGxWYWRyaS1EMjJWcUlLelhRTGZAJLXBBMm1PZA3FncUNnNW1NQmd3SkNqMG45Mml5V2hTSEZAtbWZABaFVXV1VPTmVWRjVOSGE1bAZDZD';
        $hashtag = 'cricket';
        $url = 'https://graph.facebook.com/v12.0/ig_hashtag_search?user_id=17841407188836660&q='.urlencode($hashtag).'&access_token='.$accessToken;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        $jsonResponse = json_decode($response, true);
        print_r($jsonResponse);die;
        $hashtagId = $jsonResponse['data'][0]['id'];

        $url = 'https://graph.facebook.com/v12.0/'.$hashtagId.'/top_media?user_id=17841407188836660&fields=id,media_type,media_url,thumbnail_url&access_token='.$accessToken;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        $jsonResponse = json_decode($response, true);

        foreach ($jsonResponse['data'] as $data) {
            $mediaType = $data['media_type'];
            $mediaUrl = $data['media_url'];
            $thumbnailUrl = $data['thumbnail_url'];
            // do something with the data
        }
    }

    public function insta()
    {
        $fields= "id,caption,media_type,media_url,thumbnail_url,username";
        $access_token = "IGQVJXUl9iamhmd2s3UXkwUkhrRlQzTkVLNjNKdlJvSXVQaFA5UDl4a0VqQThNT2k3VWFsTUk1b2hHeXVZAQVBDVjdCWG9GT19LcTFXbEc1R09pSTRmbU5kSzRJampIWk82UTB1Vkc2SUFFcW94OGh3TwZDZD";

        $hashtag = 'cricket';
        // $this->insta2($hashtag);
        // $posts = get_hashtag_posts($hashtag, $access_token);
        // echo $posts;die;

        $url = "https://graph.instagram.com/me/media?access_token=".$access_token."&fields=".$fields;
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $response = json_decode($response, true); //because of true, it's in an array
        pre($response);
    }

    public function insta3()
    {
        $access_token = "IGQVJXUl9iamhmd2s3UXkwUkhrRlQzTkVLNjNKdlJvSXVQaFA5UDl4a0VqQThNT2k3VWFsTUk1b2hHeXVZAQVBDVjdCWG9GT19LcTFXbEc1R09pSTRmbU5kSzRJampIWk82UTB1Vkc2SUFFcW94OGh3TwZDZD";
        // Load the Instagram API library
        $this->load->library('instagram_api');

        // Set the hashtag you want to search for
        $hashtag = 'ramzan';

        // Set the Instagram API endpoint URL
        $url = 'https://api.instagram.com/v1/tags/' . $hashtag . '/media/recent/?access_token=' . $access_token;

        // Make a GET request to the endpoint
        // $response = $this->instagram_api->get($url);
        $response = $this->instagram_api->get_tags($hashtag);
        echo $response;die;
        // Parse the response data and extract the relevant information
        if ($response && isset($response->data)) {
            $post_count = count($response->data);
            $recent_posts = $response->data;
            // Do something with the data, such as displaying it on a webpage
        }
        else {
            // Handle any errors that occurred during the API request
        }

    }

    public function insta2($tag)
    {
        $url = "https://www.instagram.com/explore/tags/$tag/?__a=1";
        $response = file_get_contents($url);
        pre($response);
    }

    public function insta1()
    {
        $token = "IGQVJWb1NScnN1cWtzQ3NtRDJOSWpCZAEgxMFl5VkphZAWRXMDZAxYkdzSGxWYWRyaS1EMjJWcUlLelhRTGZAJLXBBMm1PZA3FncUNnNW1NQmd3SkNqMG45Mml5V2hTSEZAtbWZABaFVXV1VPTmVWRjVOSGE1bAZDZD";
        $instagram = new Instagram($token);

        $hashtag = 'cricket';

        $media = $instagram->getTagMedia($hashtag);

        echo'media<pre>';print_r($media);die;

        foreach ($media->data as $data) {
            // Process the data for each post
            echo $data->images->standard_resolution->url . "\n";
        }
    }

    public function usrer_profile()
    {
        $fields= "id,username,account_type,media_count";
        $url = "https://graph.instagram.com/me?access_token=IGQVJXUl9iamhmd2s3UXkwUkhrRlQzTkVLNjNKdlJvSXVQaFA5UDl4a0VqQThNT2k3VWFsTUk1b2hHeXVZAQVBDVjdCWG9GT19LcTFXbEc1R09pSTRmbU5kSzRJampIWk82UTB1Vkc2SUFFcW94OGh3TwZDZD&fields=".$fields;
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        // $response = json_decode($response, true); //because of true, it's in an array
        // $response = json_encode($response, true); //because of true, it's in an array
        echo 'Online: '. $response;
    }

    public function tiktok1()
    {
        // Set your TikTok access token and the hashtag you want to search for
        $access_token = "awkyuf7zufvlynh7";
        $hashtag = "ramzan";
        $this->fetch_tiktok_videos($hashtag);

        // $hashtag = $this->input->get('hashtag');
        $url = "https://m.tiktok.com/api/challenge/detail/?challengeName=$hashtag";
        $response = file_get_contents($url);
        pre(json_decode($response));
    }

    public function tiktok2($hashtag)
    {
        $url="https://api.tiktok.com/search/item/?aid=7212856239041169413&app_name=tiktok_web&device_platform=webapp&os=web&count=10&type=5&keyword=$hashtag";
        // $url = "https://m.tiktok.com/api/challenge/detail/?challengeName=$hashtag";
        $response = file_get_contents($url);
        pre(json_decode($response));
    }

    public function fetch_tiktok_videos($hashtagID, $count=10, $cursor = '', $userID = '', $verifyFp = '') 
    {
      $appID = '7212856239041169413';
      $apiEndpoint = "https://api.tiktok.com/v1/challenge/item_list/?challenge_id={$hashtagID}&count={$count}&cursor={$cursor}&aid={$appID}&sec_uid={$userID}&verifyFp={$verifyFp}";

      $this->load->library('http');
      $response = $this->http->get($apiEndpoint);
      pre($response);

      if ($response['http_code'] == 200) {
        $videos = json_decode($response['response'], true);
        // Process the video data here
      } else {
        // Handle API error
      }
    }


    public function tiktok_hash($hashtag)
    {
        // Set up API endpoint URL and access token
        $url = "https://api.tiktok.com/aweme/v1/challenge/aweme/";
        $access_token = "awkyuf7zufvlynh7";

        // Set up request parameters
        $params = array(
            'challenge_name' => $hashtag,
            'count' => 10
        );

        // Build request URL with parameters
        $request_url = $url . '?' . http_build_query($params);

        // Make API request using CodeIgniter's HTTP library
        $this->load->library('http');
        $response = $this->http->get($request_url, array(), array(
            'Authorization: Bearer ' . $access_token
        ));
        // Parse JSON response
        $data = json_decode($response, true);

        pre($data);
        // Output video data
        foreach ($data['aweme_list'] as $video) {
            echo $video['desc'] . "<br>";
            echo $video['video']['play_addr']['url_list'][0] . "<br>";
        }
        die;
    }

    public function tiktok_token()
    {
        $client = new Client();
        $accessToken = 'awkyuf7zufvlynh7';
        $hashtag = 'cricket';
        $count = 10;
        
        $response = $client->request('GET', 'https://api.tiktok.com/v2/challenge/feed/', [
            'query' => [
                'ch_id' => $hashtag,
                'count' => $count,
                'language' => 'en',
                'sec_uid' => '',
                'max_cursor' => 0,
                'min_cursor' => 0,
                'aid' => '7212856239041169413',
                'source' => 'challenge',
                'access_token' => $accessToken
            ]
        ]);
        
        $data = json_decode($response->getBody(), true);
        $posts = $data['body']['itemListData'];

        pre($posts);
    }
    
}
