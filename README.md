# About

Adds support for logging into the backend with Azure Active Directory Single Sign On (SSO) OAuth.

# Installation

To install from the [Marketplace](https://octobercms.com/plugin/luketowers-essentialvars), click on the "Add to Project" button and then select the project you wish to add it to before updating the project to pull in the plugin.

To install from the backend, go to **Settings -> Updates & Plugins -> Install Plugins** and then search for `LukeTowers.EssentialVars`.

To install from [the repository](https://github.com/luketowers/oc-essentialvars-plugin), clone it into **plugins/luketowers/essentialvars** and then run `composer update` from your project root in order to pull in the dependencies.

To install it with Composer, run `composer require luketowers/oc-essentialvars-plugin` from your project root.

# About

This plugin registers the following variables for use in CMS Layouts, Partials, & Pages as well as for use in Mail Templates:

Name | Description
-------- | ---------------
`app_url`: | The URL to the home page of the application
`app_logo`: | The URL to the backend application logo, defaults to the OctoberCMS logo if not set
`app_favicon`: | The URL to the backend application favicon, defaults to the OctoberCMS logo if not set
`app_name`: | The Application Name from the backend BrandSettings
`app_debug`: | The state of the application debug flag
`app_description`: | The Application Tagline from the backend BrandSettings