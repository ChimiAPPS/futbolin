import { Component } from '@angular/core';
import { IonicPage, NavController } from 'ionic-angular';

@IonicPage()
@Component({
  selector: 'page-signup',
  templateUrl: 'signup.html',
})
export class SignupPage {

  private user = {}

  constructor(public navCtrl: NavController) {

  }

  ionViewDidLoad() {

  }

}
