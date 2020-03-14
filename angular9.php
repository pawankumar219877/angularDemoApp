<?php 
pushd D:\xampp\htdocs\shareMarketWeb
ng serve --proxy-config proxy.conf.json -o
npm run start   ===> to run node start  script command

How to generate module 
============================
ng generate module material --flat


--flat  ====>  no new folder


How to update all angular dependencies    
========================================
npm i -g npm-check-updates
ncu -u
npm install





How to install angular material in angular project      https://material.angular.io/guide/getting-started
==============================================================

1) npm install --save @angular/material @angular/cdk @angular/animations
2) ng add @angular/material
3) npm i @angular/material-moment-adapter
4) npm i moment

//directive creation
ng g directive directive/loader --module app



 
step 1) npm install -g @angular/cli@latest   

step 2) npm i -g npm      ==> to update npm

our global Angular CLI version (1.4.5) is greater than your local version (1.2.6). The local Angular CLI version is used.
npm install --save-dev @angular/cli@latest



step 3) ng new teller       => create a project teller  

or 

ng new teller --style=scss --routing

The two flags we added at the end specify that we want the CSS to use the Sass compiler, and --routing tells the CLI to provide us with the routing scaffolding.



step 4) cd my-app

step 5) npm install


step 6) ng serve -o --port 3000       => to start the app 
"start": "ng serve --proxy-config proxy.conf.json -o",
npm  start


(
if          npm uninstall
then        npm cache clean 

)

build for deployment
===============================
EX for localhost
 
ng build --prod --base-href /shareMarketWeb/dist/shareMarketWeb/

Default 

ng build --prod --base-href /



create a service 

------------------------
ng g service httpservices/BuySell/addBuySell

ng g service login

or 

ng generate service reportopenclose


Create a Component using ng command prompt
--------------------------------------------
>ng g c ligin1 --module app
or 
ng generate component home

how to use latest bootstrap in angular
-----------------------------------------

  1)  npm install ngx-bootstrap bootstrap --save

This line installs bootstrap 3 nowadays, but can install bootstrap 4 in future. Keep in mind ngx-bootstrap supports both versions.

    open src/app/app.module.ts and add

   2) import { AlertModule } from 'ngx-bootstrap';
	1: Configure angular.json:

	"styles": [
	"node_modules/bootstrap/dist/css/bootstrap.min.css",
	"styles.scss"
	]
	2: Import directly in src/style.css or src/style.scss:

	@import '~bootstrap/dist/css/bootstrap.min.css';
	I personally prefer to import all my styles in src/style.css since it’s been declared in angular.json already.
   
   --------------------------------------------------------------
   1) npm install --save @ng-bootstrap/ng-bootstrap
   2) import { NgbModule } from '@ng-bootstrap/ng-bootstrap';
   3) imports: [
    BrowserModule,
    AngularFireModule.initializeApp(environment.firebase),
    AngularFireDatabaseModule,
    AngularFireAuthModule,
    NgbModule.forRoot()
  ]
  
  4)following line in file styles.css:

  @import "~bootstrap/dist/css/bootstrap.css"
  5)
  <li class="nav-item dropdown" ngbDropdown>
  <a class="nav-link dropdown-toggle" id="dropdown01" ngbDropdownToggle>Category</a>
  <div class="dropdown-menu" aria-labelledby="dropdown01" ngbDropdownMenu>
    <a class="dropdown-item" href="#">Angular</a>
    <a class="dropdown-item" href="#">React</a>
    <a class="dropdown-item" href="#">Vue.js</a>
  </div>
</li>
  
  
   
============================================================================
   how to create constant in angular  
   
   export const environment = {
	  production: false,
	  apiUrl: 'http://localhost:8000/api/'
	};
	And then on your service:

	import { environment } from '../../environments/environment';
	...
	environment.apiUrl;
   
====================================================================================================
if  node server is running on one port(3050) and angular is running on other port (4200)
Proxy To Backend

Using the proxying support in webpacks dev server we can highjack certain URLs and send them to a backend server. We do this by passing a file to --proxy-config

Say we have a server running on http://localhost:3000/api and we want all calls to http://localhost:4200/api to go to that server.

We create a file next to our projects package.json called proxy.conf.json with the content

{
  "/api": {
    "target": "http://localhost:4200",
    "secure": false
  }
}
You can read more about what options are available here.

We can then edit the package.json files start script to be

"start": "ng serve --proxy-config proxy.conf.json -o",
Now in order to run our dev server with our proxy config, we can simply call npm start.

Rewriting the URL path

One option that comes up a lot is rewriting the URL path for the proxy. This is supported by the pathRewrite option.

Say we have a server running on http://localhost:3000 and we want all calls to http://localhost:4200/api to go to that server.

In our proxy.conf.json file, we add the following content

{
  "/api": {
    "target": "http://localhost:4200",
    "secure": false,
    "pathRewrite": {
      "^/api": ""
    }
  }
}
If you need to access a backend that is not on localhost, you will need to add the changeOrigin option as follows:

{
  "/api": {
    "target": "http://npmjs.org",
    "secure": false,
    "pathRewrite": {
      "^/api": ""
    },
    "changeOrigin": true
  }
}
To help debug whether or not your proxy is working properly, you can also add the logLevel option as follows:

{
  "/api": {
    "target": "http://localhost:4200",
    "secure": false,
    "pathRewrite": {
      "^/api": ""
    },
    "logLevel": "debug"
  }
}
Possible options for logLevel include debug, info, warn, error, and silent (default is info)

Multiple entries

If you need to proxy multiple entries to the same target define the configuration in proxy.conf.js instead of proxy.conf.json e.g.

const PROXY_CONFIG = [
    {
        context: [
            "/my",
            "/many",
            "/endpoints",
            "/i",
            "/need",
            "/to",
            "/proxy"
        ],
        target: "http://localhost:3000",
        secure: false
    }
]

module.exports = PROXY_CONFIG;
and make sure to point to the right file

"start": "ng serve --proxy-config proxy.conf.js",
Bypass the Proxy

If you need to optionally bypass the proxy, or dynamically change the request before its sent, define the configuration in proxy.conf.js e.g.

const PROXY_CONFIG = {
    "/api/proxy": {
        "target": "http://localhost:3000",
        "secure": false,
        "bypass": function (req, res, proxyOptions) {
            if (req.headers.accept.indexOf("html") !== -1) {
                console.log("Skipping proxy for browser request.");
                return "/index.html";
            }
            req.headers["X-Custom-Header"] = "yes";
        }
    }
}

module.exports = PROXY_CONFIG;
again, make sure to point to the right file

"start": "ng serve --proxy-config proxy.conf.js",

============================================================================================
service creation in angular  5

import { Injectable } from '@angular/core';
import { environment } from '../environments/environment';

/*
import {Http, Headers, Response , RequestOptions } from '@angular/http';
import { HttpParams} from '@angular/common/http';
*/
import { HttpClient , HttpErrorResponse } from '@angular/common/http';
 

@Injectable()
export class LoginService    {
  loginUrl: String =  environment.nodeServiceApiUrl + 'login';

  loginpostapiUrl =  environment.nodeServiceApiUrl + 'adminloginapi';
  results: Object[];
  loginApiUrl = `${this.loginUrl}`;
  
  constructor(private http: HttpClient) {
    this.results = [];
   }
   
   getlogin() {
   }
    postlogin(passparamobject) {
        const payload = passparamobject;
        this.http.post(this.loginpostapiUrl,payload); 
     }
   
    /*
      postlogin(passparamobject) {
        const body = JSON.stringify(passparamobject);
            //application/x-www-form-urlencoded
        const headers = new Headers({ 'Content-Type': 'application/json' });
        const options = new RequestOptions({ headers: headers });
            
        return this.http.post(this.loginpostapiUrl, body, options)
                        .map(res =>  res.json() );

     }
     */

}



call in component 
--------------------
import { LoginService } from '../login.service';

import { HttpClientModule,HttpErrorResponse } from '@angular/common/http';
import 'rxjs/add/operator/map';
import 'rxjs/add/operator/toPromise';

import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';



@Component({
  selector: 'app-adminlogin',
   providers: [LoginService],
  templateUrl: './adminlogin.component.html',
  styleUrls: ['./adminlogin.component.css']
})
export class AdminloginComponent implements OnInit {
  adminform: FormGroup;
  formSumitAttempt: boolean;
  constructor(private formBuilder: FormBuilder, private loginService: LoginService) { }

  ngOnInit() {
    this.adminform = this.formBuilder.group({
     email: [null, [Validators.required, Validators.email]],
     password: [null, Validators.required],

    });
  }

  loginFormSubmit() {
      console.log("form");
      console.log(this.adminform.value);
      
      this.formSumitAttempt = true;
      if (this.adminform.valid) {
         this.loginService.postlogin( this.adminform.value ).subscribe(
                res => {
                  console.log(res);
                },
                (err: HttpErrorResponse) => {
                  console.log(err.error);      //Error occured while trying to proxy to: localhost:4200/api/adminloginapi
                  console.log(err.name);    //HttpErrorResponse
                  console.log(err.message); //login.service.ts:96 Http failure response for http://localhost:4200/api/adminloginapi: 504 Gateway Timeout
                  console.log(err.status);  // 504
                }
         );
      
        console.log('LOGIN SUCCESSfully');
      }
  }
  
   isFieldValid(field: string) {
     return (
      (!this.adminform.get(field).valid && this.adminform.get(field).touched) ||
      (this.adminform.get(field).untouched && this.formSumitAttempt)
    );
  }
  

}
========================================================================================================================


for loop in anular 


<!-- Angular -->
<ul>
  <li *ngFor="let item of items; let i = index">
    {{i}} {{item}}
  </li>
</ul>


---------------

<ul>
  <li *ngFor=" let item of items; trackBy: trackByFn;">
    {{item}}
  </li>
</ul>

// Method in component class
trackByFn(index, item) {
  return item.id;
}

================================================================================================
Change formarray elements form group   at position i 
  showBlockToggle(i){
   const faControl = 
   (<FormArray>this.tradeForm.controls['tradeListArray']).at(i)['controls'];
   faControl.showElement.setValue(!faControl.showElement.value);
  }
  
  // html 
  {{ arrayItem.get('showElement').value }} 






 

