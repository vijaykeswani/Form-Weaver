This framework provides you a user interface to create forms for the purposes of conducting online tests or surveys and mail the form to the people whose response you want to record. <br>

Requirements : Mail server <br>

Database : 
	userlogin : id varchar, password varchar, randomkey varchar, activated varchar <br>
	privilege : tbname varchar, user1 varchar, user2 varchar, user3 varchar, user4 varchar, user5 varchar <br>
	formcreator : tbname varchar, qno int, question varchar, help varchar, type varchar, required varchar, uniquef varchar, username varchar, name 		varchar <br>
	options : tbname varchar, qno int, choice varchar <br>
