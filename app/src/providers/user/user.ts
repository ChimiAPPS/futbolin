import { Injectable } from '@angular/core';
import { ApiProvider } from '../api/api';
import 'rxjs/add/operator/map';

@Injectable()
export class UserProvider {

  private readonly INTERFACE = "user";

  private id;
  private alias;
  private firstname;
  private lastname;
  private email;
  private team;

  constructor(private apiProvider: ApiProvider) {}

  add(user){    
    let params = {
      user: user
    }
    return this.apiProvider.post(this.INTERFACE, 'add', params)
      .map(data => {  
        return data;
      });
  }

  getId(){
    return this.id;
  }
  getTeam(){
    return this.team;
  }
  getFirstname(){
    return this.firstname;
  }
  getLastname(){
    return this.lastname;
  }
  getEmail(){
    return this.email;
  }
  getAlias(){
    return this.alias;
  }

}