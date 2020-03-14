<?php 

creation of branch repository
--------------------------
git branch develop 

list  of branch repository
---------------------
git branch 



For getting/Modify current  email and username 

For getting user name 
----------------------
$ git config --global user.name
DESKTOP-0RPC9CL\pawan


For getting Email
----------------------
pawan@DESKTOP-0RPC9CL MINGW64 /d/xampp/htdocs/validation (master)
$ git config --global user.email
pawan.kumar@albertsonstechnologies.com


For modifying Email
----------------------
git config --global user.email "pawankumar219877@gmail.com"

==============================================================================================
git remote -v

repository      https://github.com/pawankumar219877/validation.git (fetch)
repository      https://github.com/pawankumar219877/validation.git (push)
========================================================================================================

STEP 1) REGISTER TO git.com for creation of central repository

STEP 2) Create your project name or repository name , add git ignore file if u dont want to push some code , Create Readme file 
	that will describe about your project
	
	
	
STEP 3)  So central repository is ready , Those who want to  push the code , have to install the git into their system
	1) open  git bash  here and type git init
	2) git remote add repository "https://github.com/pawankumar219877/validation.git"
	3) git clone https://github.com/pawankumar219877/validation.git  ===> to download file from master to local
	4) create a file  name "abc.php"
	abc.php  now an untracked file , because is not added to git index

	5)   git status ===>  what are the file added to local repository
	
	
 git remote set-url origin github.com/pawankumar219877/validation.git
 
 
 

	6) git add "abc.php"   or  git add -A  ( to add multiple file)      ===> to add file to git index , now this file is trackable

	7) git commit -m  " abc file is added"   or  git commit  -a -m  " abc file is added"  ( to commit multiple file) ====>  upload the abc file to central  repository
	
==> to get log of when changes done( modified  or add date ), comit sha1 hash and whome done (Auther)
------------------------------------------------------------------------ 
	8) git log 
	
STEP  4) Creation of branch is for work as isolated project from master 

     
	 ===> for creation of backup branch and Switched to a new branch 'backup'  
	 ------------------------------------------------------------------------
	 1)  git checkout -b backup 
	
	 
	 2) git checkout firstbranch  =====> Moving from  master to firstbranch
	 so firstbranch has all of files from master   
	 and suppose u are adding  "brfile.php"  and moving to master by   " git checkout master "   and " ls " (list the files)
	 then u wont get "brfile.php" 
	 
STEP 5) For merging the file from one brannch to another  or branch to master  , YOU need to checkout to merger branch 
Example =>  suppose u want to move  "firstbranch" file to  "master" 
            1) git  checkout master 
			2)  git merge firstbranch
			
			
			
			
DIFFERENCE BETWEEN git push AND git fetch
====================================================================
git fetch really only downloads new data from a remote repository - but it doesn't integrate any of this new data into your working files. Fetch is great for getting a fresh view on all the things that happened in a remote repository.
Due to it's "harmless" nature, you can rest assured: fetch will never manipulate, destroy, or screw up anything. This means you can never fetch often enough.

git pull, in contrast, is used with a different goal in mind: to update your current HEAD branch with the latest changes from the remote server. This means that pull not only downloads new data; it also directly integrates it into your current working copy files.

	 
	 
	 

   
   
   
   
   git push for local changes to central repository
 











using git bash
-----------------------

git clone https://github.com/pawankumar219877/testnodeazure.git



git add .          ------> add all

git status        ------> check  the modified

git commit -m "first commit"  ---> first  commit


git log                      ---->log
commit 920f808c2cfac6350065bdd26f3151813da5a591
Author: pawankumar219877 <pawan.kumar@albertsonstechnologies.com>
Date:   Thu May 25 18:11:30 2017 +0530

    first commit

git push origin master  --------------> push all your  local code to 	https://github.com/pawankumar219877/testnodeazure.git by username nad pass


//to change head to a particular commit 
git reset --hard 8429c93d0be40e6ae6db32de7c3bae7b08f2db13


git diff branch-a branch-b   //Compare branch-a and branch-b by running $ 

push code local to deployment git
-----------------------------------------

pawan@pawan-PC MINGW64 /d/xampp/htdocs/widget/node/azurenode/testnodeazure (master)
$ git remote add azure https://ubuntudev@testnrp.scm.azurewebsites.net:443/testnrp.git

pawan@pawan-PC MINGW64 /d/xampp/htdocs/widget/node/azurenode/testnodeazure (master)
$ git push azure master
username of remote server  ----> ubuntudev
password of server ------------>ubuntudev@123
above are the deployment credential of azure app service


