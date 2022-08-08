import { Component } from "@angular/core";
import {ProfileEditorComponent} from '../newsForm/newsForm.component';
import { faComment } from "@fortawesome/free-regular-svg-icons";
import { NgForm } from "@angular/forms";
import { NgModel } from "@angular/forms";
import { NG_VALUE_ACCESSOR } from "@angular/forms";
import { MatFormField } from "@angular/material/form-field";


@Component({
  selector: 'app-news-feed',
  templateUrl: './news-feed.component.html',
  styleUrls: ['./news-feed.component.css']
})


export class NewsFeedComponent{
  thumbs = false;
  count = 0;
  thumbs1 = false;
  count1 = 0;
  thumbs2 = false;
  count2 = 0;
  thumbs3 = false;
  count3 = 0;
  showModal:boolean=false;
  editMode:boolean=false;
  comment : string = '';
  com : String ="";


faComment = faComment;
  toggling(){
    this.thumbs= !this.thumbs;
    if(this.thumbs == true){
      this.count++;
    }

  }
  toggling1(){
    this.thumbs1= !this.thumbs1;
    if(this.thumbs1 == true){
      this.count1++;
    }

  }
  toggling2(){
    this.thumbs2= !this.thumbs2;
    if(this.thumbs2 == true){
      this.count2++;
    }

  }
  toggling3(){
    this.thumbs3= !this.thumbs3;
    if(this.thumbs3 == true){
      this.count3++;
    }
  }
    onCloseModal(){
      this.showModal=true;
    }

    onAddNewsPost(){
      this.showModal = true;
    }

    submit(){

      //alert(JSON.stringify(this.comment));
      this.com += this.comment+"\n";
    }

    repost(){

    }



}


