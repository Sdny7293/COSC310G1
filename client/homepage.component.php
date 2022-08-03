<!DOCTYPE html>
<html lang="en">
<head>
  <title>LinkedIn Homepage</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../css/homepage.component.css">
<link src="./images">
<!-- <link type = "text/javascript" src ="./homepage.component.ts"> -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

</head>
<header>

<ul class="list-group list-group-flush">
  <li class="list-group-item">
    <nav  class="navbar navbar-light bg-light">
      <a id = "navbar" class="navbar-brand" href="#">
        <span class="Column1">
          <img  src="../images/icon.png" alt="logo" width="100" height="50">
        </span>
        <span class="Column2">
          <input id="logo" type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
        </span>
        <span class="Column3">
          <img  src="../images/home.png" alt="logo" width="40" height="40">
        </span>
        <span class="Column4">
          <img  src="../images/mynetwork.png" alt="logo" width="40" height="40">
        </span>
        <span class="Column5">
          <img  src="../images/jobs.png" alt="logo" width="40" height="40">
        </span>
        <span class="Column6">
          <img  src="../images/message.png" alt="logo" width="40" height="40">
        </span>
        <span class="Column7">
          <img  src="../images/notify.png" alt="logo" width="40" height="40">
        </span>

          <span class="Column8">
            <img  src="../images/work.png" alt="logo" width="40" height="40">
          </span>
          <span class="Column9">
            <p>Get Hired Faster, Try Premium Free</p>
          </span>
          <span class="Column10">
            <button href="#"  id = "logout">Log out</button>
          </span>
      </a>
    </nav>
  </li>
</ul>
</header>
<br>
<br>
<br>
<div class="card1" style="width: 28rem;" id="miniProfile">
  <div id="contents" class="card-header">
    <img  id="prof" src="../images/profile.jpg"  alt="profilepic" width="80" height="80"><br>
    <h3> Welcome, Pavan! </h3>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">
      Connections    41<br>
      Who's Viewed Your profile  4
    </li>
    <li class="list-group-item">
      Access exclusive tools & insights<br>
      Get Hired Faster, Try Premium Free
    </li>
    <li class="list-group-item">
    <img  src="../images/premium.jpg" alt="premiumpic" width="20" height="20">
      My items
    </li>
  </ul>
</div>

<div class="card2" style="width: 45rem; height: 100rem;" id="newsfeed">
  <ul class="list-group list-group-flush">
      <li class="list-group-item">
        <img  id="tesla1" src="../images/tesla.jpg"  alt="companyIcon" width="80" height="80">
        <h5>Tesla 290,000 followers</h5>
        <br>
        <br>
        <img  id="tesla2" src="../images/modelS.jpg"  alt="companyIcon" width="400" height="250">
        <br>
        <br>
        <p>Without it we wouldn't have the growing selection of electric vehicles we have today,
          yet the 2022 Tesla Model S remains one of the most compelling and desirable options in that growing market
          segment. It also earns a spot on our 2022 Editors' Choice list. With up to 412 miles of estimated
          driving range—depending upon model—the S can easily be used for long drives,
          and the 1020-hp Plaid version can deliver supercar acceleration while seating four adults.
          The Model S is also practical, with a large rear cargo area and a secondary front-trunk for extra space.
          New entrants in the luxury EV sedan category includes the Porsche Taycan and the Audi e-tron GT,
          both of which challenge the Model S in terms of performance and comfort, but its superior range and
          available semi-autonomous driving technology continue to draw consumers to this Tesla.
        </p>

          <span class="Col1">
          <a href="#">
           <i (click) ="toggling()" class="fa fa-thumbs-up" style="font-size:20px" [ngClass]="{'color': thumbs == true,'color1':thumbs == false}" ></i>
            <p id="coun">{{count}}</p>

              <img id="share"  src="../images/share.png" alt="share" width="20" height="20">

              <mat-expansion-panel >
                <mat-expansion-panel-header>
                   <mat-panel-title>
                    <img id="comment2"  src="../images/comment.png"  width="20" height="20">
                   </mat-panel-title>
                </mat-expansion-panel-header>
                <mat-form-field >
                   <input matInput  [(ngModel)]="comment"   name="comment" type="text" placeholder="Comment" >
                </mat-form-field>
                  <button (click)="submit()" >Post</button>
                  <br>
                  <br>
                  <br>
                  <br>
                <p>Comments: </p>
                <br>
                <br>
                <ul>
                  <li>
                    <p style="white-space: pre-wrap">{{com}}</p>
                  </li>
                </ul>
                  </mat-expansion-panel>



          </a>
          <script src="./homepage.component.ts"></script>
          </span>

      </li>
      <li class="list-group-item">
        <img  id="blackberryIcon" src="../images/blackberry.png"  alt="companyIcon" width="100" height="30">
        <h5>BlackBerry 90,321 followers</h5>
        <br>
        <br>
        <img  id="blackberryPhone" src="../images/blackPhone.jpg"  alt="companyIcon" width="300" height="250">
        <br>
        <br>
        <p>Research in Motion (RIM) released the BlackBerry 850 pager in 1999. BlackBerry handhelds started as data-only devices;
          you could not use them to make phone calls. Early models were two-way pagers with full QWERTY keyboards.
          Business people mainly used them to send messages back and forth wirelessly.RIM soon added email capabilities to its BlackBerry devices,
          which became popular among lawyers and other corporate users. Early BlackBerry email devices featured full QWERTY keyboards and monochrome screens but lacked phone features.
          The BlackBerry 5810, which launched in 2002, was the first BlackBerry to add phone functionality. It looked like RIM's data-only devices, retaining the same squat shape, QWERTY keyboard,
          and monochrome screen. It required a headset and microphone to make voice calls, as the speaker was not built-in.
          The BlackBerry 6000 series, also launched in 2002, was the first to feature integrated phone functionality, meaning that users did not need an external
          headset to make calls. The 7000 series added color screens and saw the debut of the SureType keyboard, the modified QWERTY format with two letters on most keys, which allowed for smaller phones.
          BlackBerry phones from this era included the BlackBerry Bold, the Curve 8900, and the much-maligned BlackBerry Storm, which abandoned the physical keyboard in favor of a touch screen.
          BlackBerry phones soon featured color screens, plenty of software, and phone capabilities. They remained faithful to BlackBerry's roots as an email device: BlackBerry smartphones offer some of the
          best email handlings you'll find on a smartphone.Unfortunately for Research in Motion, the smartphone competition was fierce, and the company had to try several different things to compete in the field.
          BlackBerry ditched its OS and released its final smartphones with Google's Android OS—the BlackBerry Priv, DTEK50, and the DTEK60, the last phone developed in-house at BlackBerry. In January 2022,
          the company officially dropped all support for Blackberry OS.
        </p>
        <span class="Col1">
          <a href="#">
            <i (click)="toggling1()" class="fa fa-thumbs-up" style="font-size:20px" [ngClass]="{'color': thumbs1 == true,'color1':thumbs1 == false}" ></i>
            <p id="coun">{{count1}}</p>
          </a>
          <img id="share"  src="../images/share.png" alt="share" width="20" height="20">
          </span>
          <mat-expansion-panel >
            <mat-expansion-panel-header>
               <mat-panel-title>
                <img id="comment2"  src="../images/comment.png"  width="20" height="20">
               </mat-panel-title>
            </mat-expansion-panel-header>
            <mat-form-field >
               <input matInput  [(ngModel)]="comment"   name="comment" type="text" placeholder="Comment" >
            </mat-form-field>
              <button (click)="submit()" >Post</button>
              <br>
              <br>
              <br>
              <br>
            <p>Comments: </p>
            <br>
            <br>
            <ul>
              <li>
                <p style="white-space: pre-wrap">{{com}}</p>
              </li>
            </ul>
              </mat-expansion-panel>


      </li>
      <li class="list-group-item">
        <img  id="texas" src="../images/texas.png"  alt="companyIcon" width="80" height="80">
        <h5>Texas Instruments 205,093 followers</h5>
        <br>
        <br>
        <img  id="texas_warehouse" src="../images/warehouse.jpg"  alt="warehouse" width="400" height="250">
        <br>
        <br>
        <p>DALLAS, Nov. 17, 2021 /PRNewswire/ -- Texas Instruments Incorporated (TI) (Nasdaq: TXN) today announced plans to begin construction
          next year on its new 300-millimeter semiconductor wafer fabrication plants (or "fabs") in Sherman, Texas. The North Texas site has the potential
          for up to four fabs to meet demand over time, as semiconductor growth in electronics, particularly in industrial and automotive markets,
          is expected to continue well into the future. Construction of the first and second fabs is set to begin in 2022.
          "TI’s future analog and embedded processing 300-mm fabs at the Sherman site are part of our long-term capacity planning
          to continue to strengthen our manufacturing and technology competitive advantage and support our customers’ demand in the
          coming decades," said Rich Templeton, TI’s chairman, president and CEO. "Our commitment to North Texas spans more than 90 years,
          and this decision is a testament to our strong partnership and investment in the Sherman community."
          Production from the first new fab is expected as early as 2025. With the option to include up to four fabs, total investment potential
          at the site could reach approximately $30 billion and support 3,000 direct jobs over time.
          The new fabs will complement TI’s existing 300-mm fabs which include DMOS6 (Dallas, Texas), RFAB1 and the soon-to-be-completed RFAB2 (both in Richardson,
          Texas), which is expected to start production in the second half of 2022. Additionally, LFAB (Lehi, Utah), which TI recently acquired, is expected to begin
          production in early 2023.
        </p>
        <span class="Col2">
          <a href="#">
            <i (click)="toggling2()" class="fa fa-thumbs-up" style="font-size:20px" [ngClass]="{'color': thumbs2 == true,'color1':thumbs2 == false}" ></i>
            <p id="coun">{{count2}}</p>

            <img id="share" (click)="repost()"  src="../images/share.png" alt="share" width="20" height="20">

            <mat-expansion-panel >
              <mat-expansion-panel-header>
                 <mat-panel-title>
                  <img id="comment2"  src="../images/comment.png"  width="20" height="20">
                 </mat-panel-title>
              </mat-expansion-panel-header>
              <mat-form-field >
                 <input matInput  [(ngModel)]="comment"   name="comment" type="text" placeholder="Comment" >
              </mat-form-field>
                <button (click)="submit()" >Post</button>
                <br>
                <br>
                <br>
                <br>
              <p>Comments: </p>
              <br>
              <br>
              <ul>
                <li>
                  <p style="white-space: pre-wrap">{{com}}</p>
                </li>
              </ul>
                </mat-expansion-panel>

          </a>
          </span>
      </li>
      <li class="list-group-item">
        <img  id="damon" src="../images/damon.jpg"  alt="CompanyIcon" width="80" height="80">
        <h5>Damon Motorcycles 134,659 followers</h5>
        <br>
        <br>
        <img  id="motorcycle" src="../images/motorcycle.jpg"  alt="product" width="420" height="250">
        <br>
        <br>
        <p>On paper or in pixels, the Damon HyperSport is the finest electric motorcycle yet. Two hundred miles per hour, 200 hp and a
          claimed 200-mile range will do that. No electric bike in current production can touch those figures. Of course, right now
          neither can anyone who’s put in a preorder for a Damon.
           The tech world is defined by bluster before results. Assuming Vancouver, Canada-based Damon can deliver, the HyperSport will be
           paired with the HyperFighter, Damon’s latest potential streetbike. Up first is the $35,000 (or so) limited-edition HyperFighter
           Colossus; Damon claims that bike will be followed by two future HyperFighter Unlimited models, trimmed of the Colossus name and about
           $10,000 from the sticker. Only 100 Colossuses are planned for production.
        </p>
        <span class="Col3">
          <a href="#">
            <i (click)="toggling3()" class="fa fa-thumbs-up" style="font-size:20px" [ngClass]="{'color': thumbs3 == true,'color1':thumbs3 == false}" ></i>
            <p id="coun">{{count3}}</p>

            <img id="share"  src="../images/share.png" alt="share" width="20" height="20">
            <mat-expansion-panel >
              <mat-expansion-panel-header>
                 <mat-panel-title>
                  <img id="comment2"  src="../images/comment.png"  width="20" height="20">
                 </mat-panel-title>
              </mat-expansion-panel-header>
              <mat-form-field >
                 <input matInput  [(ngModel)]="comment"   name="comment" type="text" placeholder="Comment" >
              </mat-form-field>
                <button (click)="submit()" >Post</button>
                <br>
                <br>
                <br>
                <br>
              <p>Comments: </p>
              <br>
              <br>
              <ul>
                <li>
                  <p style="white-space: pre-wrap">{{com}}</p>
                </li>
              </ul>
                </mat-expansion-panel>

          </a>
        </span>
      </li>
    </ul>
</div>
<br>
<div class="card3" style="width: 28rem;" id="MiniNews">
  <div id="contents" class="card-header">
    <h3> LinkedIn News </h3>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">
    <ul>
      <li>
        <a href="#">
          War rages on in Ukraine!<br>
        </a>
      </li>
      <li>
        <a href="#">
          Canada's newest mineral deposit found<br>
        </a>
      </li>
      <li>
        <a href="#">
          New variant of covid discovered<br>
        </a>
      </li>
    </ul>
    </li>
  </ul>
</div>

<div class="card4" style = "width: 32rem;" id="Ad">
<img id="ad" src="../images/CIBCAd1.jpg" alt="ad" width="400" height="400">
</div>

<!--
<mat-card>
<textarea MatFormFieldModule rows="6"></textarea>

<hr>
<button
mat-raised-button
color="primary"
(click)="toggling()"
class="fa fa-thumbs-o-up"
></button>
<i (click)="toggling()" id ="he" class="fa fa-thumbs-o-up" style="font-size:48px" [ngClass]="{'color': thumbs == true,'color1':thumbs == false}" ></i>
<p>{{thumbs}}  {{count}}</p>

</mat-card>
-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</html>

