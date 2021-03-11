**This project is no longer maintained and will not function with newer versions of Sendy.**

This repo is for archival purposes only. Newer forks of this project may function on newer versions of Sendy.

# Sendy-DisableLists

Per-brand list management permission removal for [Sendy](http://sendy.co) email server

![sendy-disablelists](https://cloud.githubusercontent.com/assets/5970137/8307848/92b5cc5a-1986-11e5-823a-422d65024cc2.png)

If some of your brands should not be allowed to view or edit the mailing lists they can send to, this add-on provides a method by which to lock that access. An administrator who is not tied to a particular brand can still edit the email lists for a brand; however, users tied to the brand will not be able to see the "View all lists" button and will not be able to manually navigate to any page on which subscriber information is shown or could be modified.

## Compatibility and Due Caution

This add-on is tested with Sendy version 2.0.2 and 2.0.3. If you are running an older or newer version of Sendy, please test first on a non-production server. The install script attempts to insert four blocks of code within Sendy's files, and there is no guarantee that the target locations will remain the same across versions. Some correction is done automatically with broad regular expressions, but any substantial change to the insertion points will cause the add-on to fail to install.

Unfortunately, updating your Sendy server may also break this add-on. If Sendy's sidebar.php or edit-brand.php are overwritten in the update, the Sendy Disable Lists add-on will no longer function. You can try re-running install_disableLists.sh to attempt reinsertion of the required code, but again, there is no guarantee the target locations have stayed the same. If you rely on the Sendy Disable Lists add-on and need to update Sendy, please check this repository again to see if an update has been issued, or be familiar enough with Sendy and the Sendy Disable Lists add-on to make (and if you're feeling nice, merge!) the necessary modifications.

## Installation

Installing this add-on is as easy as cloning this repository into the right place and running a shell script. Simply do the following:

1. cd into your sendy/includes directory (this may be a different path on your server)

    ```
    cd /var/www/html/sendy/includes/
    ```


2. clone this repository

    ```
    git clone https://github.com/userexec/Sendy-DisableLists.git
    ```
    
    
3. cd into the new directory

    ```
    cd Sendy-DisableLists
    ```
    
    
4. make install_invoicing.sh executable

    ```
    chmod +x install_disableLists.sh
    ```
    
    
5. run the install script

    ```
    ./install_disableLists.sh
    ```


## Usage

### Disabling Lists

Once the Sendy Disable Lists add-on is in place, a "Disable management of lists" checkbox will appear under the campaign fee settings on each brand. Check the box to disable list management for that brand.

As an admin, you'll still be able to exercise full control over that brand's lists.

## Removal

Removing the Sendy Disable Lists add-on is as simple as deleting the Sendy-DisableLists folder from your sendy/includes directory and removing the four blocks of code it placed in sendy/sidebar.php, sendy/new-brand.php, and sendy/edit-brand.php. The blocks of code that were inserted can be found, in full, in sidebar-addition-1.html, sidebar-addition-2.html, new-brand-addition.html, and edit-brand-addition.html.

To remove any trace of the Sendy Invoicing add-on from your database, drop the 'disableLists' column in the 'apps' table.
