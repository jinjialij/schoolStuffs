In this same CMS website  uses four templates:
1.Homepage,
2.MyChats template/User template
3.Follow/Followers template
4.Search template

The Bootstrap is used as front-end framework.
It uses MySQL to save, retrieve and update content to display on the pages. All the SQL queries use prepared statements and bind the variables.
It has a main landing page and a login/sign up page for a new account which can be used to sign into an existing account. 
For new users, they will be directed to a set up a profile page and a find people page to follow other users. Rules are set for the creation of a password and use regex to check it.
For existing users, the session will be continued after they login into the account. 
When they sign off, the session is over. 
The website updates on a user's main page (New Chats) by using Ajax so that new posts from people the user are following automatically show up without needing to refresh the page. 
