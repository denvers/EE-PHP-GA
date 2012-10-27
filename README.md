# Server-Side Google Analytics PHP Client

## Watch-out: This is just a proof-of-concept. Don't use in a production environment!


This addon enables you to implement Google Analytics in your ExpressionEngine site, the cookie-less way. Really nice if you're fighting with the recent EU rules about cookies.

***Currently only supports the `trackPageView` method of Google Analytics.***

## Changelog
~ 04-okt-2012 ~ 

0.1 alpha release (proof of concept)

## Usage
`{exp:phpga:trackPageView ga_account_id="UA-XXXXXXX-X" domainname="your-domainname.com" pagetitle="{title}"}`

## TODO

**Basic Methods**

* https://developers.google.com/analytics/devguides/collection/gajs/methods/gaJSApiBasicConfiguration
* `_setAccount` `_setCustomVar` `_setVar` `_trackPageview` *and others*

**Campaigns**

* https://developers.google.com/analytics/devguides/collection/gajs/methods/gaJSApiCampaignTracking
* https://developers.google.com/analytics/devguides/collection/gajs/gaTrackingCampaigns
* `_setCampaignTrack` 

**Custom Variables**

* https://developers.google.com/analytics/devguides/collection/gajs/gaTrackingCustomVariables
* `_setCustomVar`

**Ecommerce**

* https://developers.google.com/analytics/devguides/collection/gajs/methods/gaJSApiEcommerce
* https://developers.google.com/analytics/devguides/collection/gajs/gaTrackingEcommerce
* `_addTrans` `_addItem` `_trackTrans`	

**Event tracking**

* https://developers.google.com/analytics/devguides/collection/gajs/methods/gaJSApiEventTracking
* https://developers.google.com/analytics/devguides/collection/gajs/eventTrackerGuide
* `_trackEvent`

**Multiple domain**

* https://developers.google.com/analytics/devguides/collection/gajs/methods/gaJSApiDomainDirectory
* https://developers.google.com/analytics/devguides/collection/gajs/gaTrackingSite
* `_setAllowLinker` `_setDomainName` `_link` *and others*

**Social Interactions**

* https://developers.google.com/analytics/devguides/collection/gajs/methods/gaJSApiSocialTracking
* https://developers.google.com/analytics/devguides/collection/gajs/gaTrackingSocial
* `_trackSocial`

**User timings**

* https://developers.google.com/analytics/devguides/collection/gajs/methods/gaJSApiUserTiming
* https://developers.google.com/analytics/devguides/collection/gajs/gaTrackingTiming
* `_trackTiming`

## Credits

* Uses the **Server-Side Google Analytics PHP Client** by United Prototype. See: http://code.google.com/p/php-ga/

* Idea by @ivyone ~ http://twitter.com/ivyone

* ExpressionEngine plugin by @webvakker ~ http://twitter.com/webvakker