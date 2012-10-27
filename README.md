# Server-Side Google Analytics PHP Client


This addon enables you to implement Google Analytics in your ExpressionEngine site, the cookie-less way. Really nice if you're fighting with the recent EU rules about cookies.


## Google Analytics methods
### Actual support

1. Basic Methods `trackPageView`
2. Campaigns
3. Custom Variables `setCustomVar`
4. Ecommerce
5. Event Tracking
6. Multiple Domain
7. Social Interactions
8. User Timings

### Basic Methods

*[https://developers.google.com/analytics/devguides/collection/gajs/methods/gaJSApiBasicConfiguration](https://developers.google.com/analytics/devguides/collection/gajs/methods/gaJSApiBasicConfiguration)*

##### trackPageView

`{exp:phpga:trackPageview ga_account_id="UA-XXXXXXX-X" domainname="your-domainname.com" pagetitle="{title}"}`


### Campaigns

*[https://developers.google.com/analytics/devguides/collection/gajs/methods/gaJSApiCampaignTracking](https://developers.google.com/analytics/devguides/collection/gajs/methods/gaJSApiCampaignTracking)*
*[https://developers.google.com/analytics/devguides/collection/gajs/gaTrackingCampaigns](https://developers.google.com/analytics/devguides/collection/gajs/gaTrackingCampaigns)*

##### setCampaignTrack 
*To be implemented*

### Custom Variables

*[https://developers.google.com/analytics/devguides/collection/gajs/](https://developers.google.com/analytics/devguides/collection/gajs/)*

##### setCustomVar
`{exp:phpga:setCustomVar ga_account_id="UA-XXXXXXX-X" domainname="your-domainname.com" index="" name="" value=""}`
`{exp:phpga:setCustomVar ga_account_id="UA-XXXXXXX-X" domainname="your-domainname.com" index="" name="" value="" scope=""}`

##### ~~setVar~~ *Deprecated*

### Ecommerce

[https://developers.google.com/analytics/devguides/collection/gajs/methods/gaJSApiEcommerce](https://developers.google.com/analytics/devguides/collection/gajs/methods/gaJSApiEcommerce)
[https://developers.google.com/analytics/devguides/collection/gajs/gaTrackingEcommerce](https://developers.google.com/analytics/devguides/collection/gajs/gaTrackingEcommerce)

##### addTrans
*To be implemented*
##### addItem
*To be implemented*
##### trackTrans
*To be implemented*

### Event tracking

[https://developers.google.com/analytics/devguides/collection/gajs/methods/gaJSApiEventTracking](https://developers.google.com/analytics/devguides/collection/gajs/methods/gaJSApiEventTracking)
[https://developers.google.com/analytics/devguides/collection/gajs/eventTrackerGuide](https://developers.google.com/analytics/devguides/collection/gajs/eventTrackerGuide)

##### trackEvent
*To be implemented*

### Multiple domain

[https://developers.google.com/analytics/devguides/collection/gajs/methods/gaJSApiDomainDirectory](https://developers.google.com/analytics/devguides/collection/gajs/methods/gaJSApiDomainDirectory)
[https://developers.google.com/analytics/devguides/collection/gajs/gaTrackingSite](https://developers.google.com/analytics/devguides/collection/gajs/gaTrackingSite)

##### setAllowLinker
*To be implemented*
##### setDomainName
*To be implemented*
##### link
*To be implemented*

***and others***

### Social Interactions

[https://developers.google.com/analytics/devguides/collection/gajs/methods/gaJSApiSocialTracking](https://developers.google.com/analytics/devguides/collection/gajs/methods/gaJSApiSocialTracking)
[https://developers.google.com/analytics/devguides/collection/gajs/gaTrackingSocial](https://developers.google.com/analytics/devguides/collection/gajs/gaTrackingSocial)

##### trackSocial
*To be implemented*

### User timings

[https://developers.google.com/analytics/devguides/collection/gajs/methods/gaJSApiUserTiming](https://developers.google.com/analytics/devguides/collection/gajs/methods/gaJSApiUserTiming)
[https://developers.google.com/analytics/devguides/collection/gajs/gaTrackingTiming](https://developers.google.com/analytics/devguides/collection/gajs/gaTrackingTiming)

##### trackTiming
*To be implemented*

## Changelog
*27-oct-2012* - v1.0

* trackPageview support
* addCustomVar support


*04-oct-2012* - v0.1

* proof of concept

## Credits

Uses the **Server-Side Google Analytics PHP Client** by United Prototype. See: http://code.google.com/p/php-ga/