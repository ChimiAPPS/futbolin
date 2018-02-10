import { Component } from '@angular/core';
import { IonicPage, NavController } from 'ionic-angular';

import { LoginPage } from '../login/login';
import { SignupPage } from '../signup/signup';

@IonicPage()
@Component({
  selector: 'page-welcome',
  templateUrl: 'welcome.html',
})
export class WelcomePage {

  modals = {
    login: LoginPage,
    signup: SignupPage
  }

  constructor(public navCtrl: NavController) {}

  ionViewDidLoad() {
  }

  changeView(view){
    this.navCtrl.push(this.modals[view]);
  }

}
