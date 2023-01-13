Create an OAuth App on Zoom

Once you have your Zoom account, you need to create an OAuth app on Zoom using the below steps.

Register your app on <a href="https://marketplace.zoom.us/develop/create">Zoom APP Marketplace</a>.
Upon registering an app, you will get your generated credentials. Here you need to pass Redirect URL for OAuth and Whitelist URL.
On the next step, enter the basic information about your app.
In the tab, you can optionally enable some additional features such as Event Subscriptions and Chat Subscriptions for your app.
Under the ‘Scopes’ tab, you need to add scopes regarding your app. For example, you can add a scope for Zoom meetings.
If you are on localhost then use the ngrok and generate the local URL. In my case, ngrok URLs for OAuth redirection and Whitelist URL are as shown below.

Basic Setup and Configuration
I didn’t find any PHP library which can be used to interact with the Zoom API. Doing some research I am able to manage it through the Guzzle library and Zoom REST API. Install the Guzzle library using the command:

composer require guzzlehttp/guzzle