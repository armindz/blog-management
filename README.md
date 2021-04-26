# Blog management project

  <br />
  <br />
  
## *Project description & abilities*
 
When page is being viewed by not logged in user, user can get list of all posts and preview it separately. But when it comes to logged in user, 
page gives additional features such as creating new posts and deleting posts user created. 
Also, "**My profile**" section appears at navbar which can navigate to user's info page. In "**My profile**" section user gets list of all active posts he created.



App manipulates user's or post's data trough "**post**" and "**user**" objects. Specific object's data contains same informations as database table in order to get better data control.
If not logged in user tries to access creating post mechanism, or somehow tries to access user's info section, he's being redirected to login page.
In case user wants to contact owner, he can do it via "**Contact us**" section from footer.

Page has **responsive design** and it is optimized to be run on smartphone or tablet. Almost every important method and form is commented to better navigate trough code.

## *Database* 

There are two tables in database:<br /> <br />
• **users** {id (PK), username, password (MD5 hashed)} <br />
• **posts** {id (PK), title, content, date, imageURL, author(FK users(id)))

## *Testing*
To test it with user's additional features, log in with already registrated users ( or registrate new one):

username: **admin** password: **admin** <br />
username: **armin** password: **armin** <br />
username: **korisnik1** password: **korisnik1** <br />

In config.php change configuration data according to your server configuration


## *Installation*

*Software required to run this project:*
-  Browser
-  Text editor
-	 **[XAMMP](https://www.apachefriends.org/download.html)**  / [Installation instructions](https://www.ionos.com/digitalguide/server/tools/xampp-tutorial-create-your-own-local-test-server/)
-	 **[FileZilla](https://filezilla-project.org/)**  / [Installation instructions](https://wiki.filezilla-project.org/Client_Installation) 
-	 **[MySQL](https://dev.mysql.com/downloads/)** / [Installation instructions](https://www.sitepoint.com/how-to-install-mysql/#:~:text=Step%201%3A%20download%20MySQL,a%20tool%20such%20as%20fsum.)  
