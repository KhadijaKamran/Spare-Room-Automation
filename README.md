# SpareRoom-Automation-Backend

Following will be included in the project.
* A website portal (with admin panels look & feel) having following pages.
    * A login page
    * A signup page (if required)
    * A dashboard webpage showing analytics which include the ratio of 
    rooms on rent with people looking for rooms, and the analytics of 
    best time for traffic and engagement with prospects.
    * A webpage for the complete settings of messages sent to new 
    tenants and the follow-up messages. The page will also include to 
    set time for `renew`. Default time will be an hour.
    * A webpage to add SpareRoom Accounts into the system.
    * A webpage for admin which will have an option to create and 
    update other user accounts on the system.
* Scripts will be created to scrap all the required data from SpareRoom for 
each user. These scripts will run for each user on the system and keep 
the data updated.
* A database will be designed where all the scraped data will be stored. 
The internal data of the system will also be stored there.
* A cloud server will be set up. Scripts and the database will be placed and 
run on the server to ensure performance, and reliability of the system. 
The cost estimates for server are included in the section of ‘Running 
Costs’ above


## USER INFO (VIEWED ONLY BY ADMIN):
```
	/all_users ("GET" to get all the users information)
	/add_user  ("POST" input: username, email, password to register a new user)
	button: Directly moves to login page
```

## LOGIN PAGE:

 ```
/user ("GET" input: email)
```

	* After Login:
	```
  /user ("PUT" input: spareroom_username, spareroom_password, renew_hours, role, password
	/user_messages ("POST" input: email, shortTermMessage, midTermMessage, longTermMessage, followUpMessage, followUpDuration)
	/user_area ("POST" input: email, area_name)
 ```
## ACCOUNT DETAILS:
	```
  update spareroom account
	update password
	/user ("PUT" input: spareroom_username, spareroom_password, renew_hours, role, password
	```

 ## ANALYTICS:
	```
 /user_stats_duratioon ("GET" input: email, days)
	/user_area ("GET", input: email)
	for all the areas:
		/area ("GET" input: area_name)
```

## MESSAGES:
```	
 /user_messages ("GET" input: email)
	/user_messages ("PUT" input: email, shortTermMessage, midTermMessage, longTermMessage, followUpMessage, followUpDuration )
	only renew_hours will be updates:
	/user ("PUT" input: spareroom_username, spareroom_password, renew_hours, role, password
```
## LOGS:
```
	/user_logs ("GET" input: email)
```
