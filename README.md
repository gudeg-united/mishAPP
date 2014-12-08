# mishAPP Disaster Alert

## Description

[![Koding Hackathon](/images/badge.png?raw=true "Koding Hackathon")](https://koding.com/Hackathon)

This is web application for disaster alert and also reporting disaster event that happening around you, this application will also give notification to all active visitors about newest disaster alert.

We will run validation and verifying for all event that reported by community, verification flow is find is there any same event that happen in radius 5 km from user location (this is running in background), if there is any same event that happen in radius 5 km from user location then user report event is set as valid.

We also provide simple tips for each disaster event, currently this app could only proceed earthquake disaster.

## Screenshots

Some screenshots for our web app :

![Homepage](https://www.dropbox.com/s/vmblrpxk7ankrz9/Screenshot%202014-12-08%2014.40.49.png "Homepage")
![Global Disaster Map](https://www.dropbox.com/s/ejgen1n3ofbphpx/Screenshot%202014-12-08%2014.41.17.png "Global Disaster Map")

## APIs used

[mishapp.blackbiron.koding.io:5000](mishapp.blackbiron.koding.io:5000) this is our own API for scrapping data from another source ([USGS](http://usgs.gov), [GDACS](http://gdacs.org)) for validation event.
