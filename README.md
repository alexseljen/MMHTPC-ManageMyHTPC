# Manage My HTPC
A lightweight way to manage your HTPC
![Desktop screenshot](http://i.imgur.com/gllsSel.png)

#Forked from:
> https://github.com/Tenzinn3/Managethis
>> https://github.com/mescon/Muximux
>>> Thanks to both of them for their hardwork


#Try the NodeJS Version
> If you prefer a NodeJS version with a built-in webserver, it is available at https://github.com/onedr0p/manage-this-node

## Setup
**Requirements:** A webserver (nginx, Apache, IIS or any other webserver) configured with PHP5 support & MYSQL or MariaDB.
`` parse_ini_file `` must be allowed in php.ini (default is allowed!)
- To set it up, clone this repository:
`` git clone https://github.com/causefx/MMHTPC-ManageMyHTPC `` or download the ZIP-file.
- Place all files on a publically accessible webserver, either directly in the root, or inside a directory called ``mmhtpc`` or whatever you want it to be called.
- Rename ``config.ini.php-example`` to ``config.ini.php`` *(Note: Your ``config.ini.php`` will never be overwritten if you update to a new version)*
- In your favourite text-editor open ``config.ini.php`` and read the instructions.
  - You can enable or disable apps simply by setting ``enabled = "true"`` or ``enabled = "false"``
  - You can hide apps simply by setting ``hidden = "true"`` or ``hidden = "false"``
  - You can set security group settings by setting ``security = "1"`` or ``security = "2"`` or ``security = "3"``
  - For the above settings the legend is: 1 = Admin | 2 = Special | 3 = Normal Logged In User
  - You can change the app icons by replacing them with ones from http://bootstrapdocs.com/v3.0.0/docs/components/ or http://fontawesome.io/icons/
- The configuration file ``config.ini.php`` can not be read by any visitor, as long as you don't remove the top part of the file.

##INSTRUCTIONS
>Upload all contents of zip or git pull the zip into the folder you want to have this on your webserver.

>Rename then config file by taking example off the file extension.
![Desktop screenshot](http://i.imgur.com/TRrL3MQ.png)

>Navigate to the index.php file in your browser, you will be notified that no config file is present for the Database.  Go ahead and clock Begin Install
![Desktop screenshot](http://i.imgur.com/YqUIFkC.png)

>You will be brought to the page where you will click CLICK ME!
![Desktop screenshot](http://i.imgur.com/bmSYCrz.png)

>Create an empty Database using phpMyAdmin or whatever your preference is and fill out all MYSQL related info for installation.
![Desktop screenshot](http://i.imgur.com/5RqaoTo.png)

>If you get this error, please set the correct write permission to your "classes" directory.
![Desktop screenshot](http://i.imgur.com/SIeX9tZ.png)

>Once install is complete, Click Login link that is presented.
![Desktop screenshot](http://i.imgur.com/qZXSHLR.png)

>You may need to do an Database update, go ahead and click the red button.
![Desktop screenshot](http://i.imgur.com/Y3HuXMO.png)

>You're all set! Go ahead and Login now.
![Desktop screenshot](http://i.imgur.com/r8HCsYf.png)

>This is where the Admin links are located:
![Desktop screenshot](http://i.imgur.com/Xjc8dC6.png)

 > **Important note regarding HTTPS:**
 > If you are serving MMHTPC from a HTTPS-enabled webserver (i.e``https://myserver.com/mmhtpc``), all of your services must also be secured via HTTPS.
 > Any URL that does not start with https:// (such as ``http://myserver.com:5050``) will be blocked by your web-browser!
 >
 > If you can, try serving MMHTPC from a non-secure (HTTP) webserver instead.
 >
 > The only known workaround is for Chrome, Opera and Chromium-based webbrowsers.
 > The plugin "Ignore X-Frame headers" disables the blocking of non-secure content.
 > https://chrome.google.com/webstore/detail/ignore-x-frame-headers/gleekbfjekiniecknbkamfmkohkpodhe

## Usage
- Navigate to ``http://<host>/mmhtpc`` where ``<host>`` is either the IP or hostname of your webserver. *Obviously if you put the files in the root directory of your webserver, there is no need to append ``/mmhtpc``*
- Access your apps by clicking on the "Launch" button. If you don't see a "Launch" button, you have ``landingpage = "false"`` configured for the app you're linking to. *(Note: This functionality was implemented to stop you from being hit by multiple login popups as soon as you start the app. It also speeds up loading time.)*
- To reload an app, double click it in the menu, or press the refresh button in the top right bar.
