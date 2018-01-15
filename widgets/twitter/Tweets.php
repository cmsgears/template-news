<?php
namespace widgets\twitter;

// Yii imports
use \yii;
use yii\helpers\Html;

class Tweets extends  \cmsgears\core\common\base\Widget {

	public $settings;
	public $url;
	public $requestMethod;
	public $getFields;

	public function init() {

		parent::init();

		$this->settings = array(
		    'oauth_access_token' => "2186032518-NVQKFdgsXuToqrpdXedoRiJZTXylf5l2HH0FqEM",
		    'oauth_access_token_secret' => "FeKUhRvxsHXGOSjeZZbg6esxxke4fLqveYDv4byvN88i6",
		    'consumer_key' => "YRpafd44p6qkJABVE5wfhPS8w",
		    'consumer_secret' => "USEUSzM6f3Z4kwXrUmw20AAgcuGWYBUFfE0abAf0KLPkQqrs3z"
		);

    	$this->url 				= "https://api.twitter.com/1.1/statuses/user_timeline.json";
	    $this->requestMethod 	= "GET";
		$this->getFields 		= '?screen_name=EASPORTSFIFA&count=5';
	}

	public function renderWidget( $config = [] ) {

		$tweetsHtml		= [];
		$tweetView		= "$this->template/tweet";
		$wrapperView	= "$this->template/wrapper";

	    $twitter	= new TwitterAPIExchange( $this->settings );

	    $tweets		= $twitter->setGetfield( $this->getFields )
	                 ->buildOauth( $this->url, $this->requestMethod )
	                 ->performRequest();

		$tweets	= json_decode( $tweets );

		foreach( $tweets as $tweet ) {

			$tweetsHtml[] = $this->render( $tweetView, [ 'tweet' => $tweet, 'widget' => $this ] );
		}

		$tweetsHtml		= implode( '', $tweetsHtml );

		$tweetsHtml		= $this->render( $wrapperView, [ 'tweets' => $tweetsHtml ] );

		return Html::tag( 'div', $tweetsHtml, $this->options );
	}
}
?>