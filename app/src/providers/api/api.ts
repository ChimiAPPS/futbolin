import { Injectable } from '@angular/core';
import { Http, Headers, RequestOptions } from '@angular/http';
import { AlertController } from 'ionic-angular';
import 'rxjs/add/operator/map';
import 'rxjs/add/operator/catch';

@Injectable()
export class ApiProvider {

  private API_PATH = "http://localhost/futbolin/api/interfaces/";
  private API_TOKEN = "481SD-5SI84-SKI1O-AH4J8";

  constructor(public http: Http, 
              private alertCtrl: AlertController) {}  

  headerOptions(){
    let headers = new Headers();
    headers.append("Accept", 'application/json');
    headers.append('Content-Type', 'application/json' );
    let options = new RequestOptions({ headers: headers });
    return options;
  }

  post(_interface, _class, _params){ 
    let options = this.headerOptions();
    _params['token'] = this.API_TOKEN;
    let path = this.API_PATH + _interface + '/' + _class + '.php';
    return this.http.post(path, _params, options)
      .map(data => {     
        data = data.json();
        if(data['authorize']){
          return data;
        }else{
          return false;
        }
      })
      .catch(error => {
        const alert = this.alertCtrl.create({
          title: 'Connection Error',
          subTitle: 'Check your internet connection',
          buttons: ['Ok']
        });
        alert.present();
        console.log(error);
        throw new Error(error);
      });
  }

}
