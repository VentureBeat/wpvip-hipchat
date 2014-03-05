wpvip-hipchat
=============

A simple 'mediation' script to convert Deploy and Commit Webhooks from WordPress.com VIP to HipChat group messages.


## Setup

Just configure the scripts to add your HipChat group number and API key at the top.
Upload the scripts to a server somewhere and then add to the wpcom-meta.php file at the root of your WordPress VIP theme:

```
<?php
/**
 * Deploy Webhook: http://example.com/path/to/deploy-webhook.php
 * Commit Webhook: http://example.com/path/to/commit-webhook.php
 */
```

It's recommended that you create the key as 'notification only' just to be on the safe side.

You can get your API key here (group admins only):
https://www.hipchat.com/admin/api


## To-Do

* Clean things up a bit
* Add some better security, maybe a 'token' check or something to prevent random people from spamming HipChat

