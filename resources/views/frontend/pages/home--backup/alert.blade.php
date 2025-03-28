@extends('frontend.creaters.landing.landing')
@section('pageTitle','Alert')
@section('content')

 <main class="site-content">
         <div class="container innercontainer">
            <div class="row">
               <div class="col leftsidebarsec profileftsidebar">
                  <div class="sidebar_cont profilesidebar">
                     <div class="userinfo">
                        <div class="userimage">
                           <img src="{{asset('frontend/images/userimage1.png')}}" />
                        </div>
                        <h4>Selena Gomez</h4>
                        <a href="#">+1 85658 89562</a>
                        <a href="#">selenagomez@gmail.com</a>
                     </div>
                     <ul class="accordion profilelist" id="accordion">
                        <li class="nav-link dropdown-toggle couponlink">
                           <a href="{{url('profile')}}">
                              <div class="link">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22">
                                    <defs>
                                       <style>.a{fill:none;}</style>
                                    </defs>
                                    <path class="a" d="M0,0H22V22H0Z"/>
                                    <path d="M18,20H16.25V18.19a2.671,2.671,0,0,0-2.625-2.714H8.375A2.671,2.671,0,0,0,5.75,18.19V20H4V18.19a4.451,4.451,0,0,1,4.375-4.524h5.25A4.451,4.451,0,0,1,18,18.19Zm-7-8.143A5.342,5.342,0,0,1,5.75,6.429,5.342,5.342,0,0,1,11,1a5.342,5.342,0,0,1,5.25,5.429A5.342,5.342,0,0,1,11,11.857Zm0-1.81a3.561,3.561,0,0,0,3.5-3.619A3.561,3.561,0,0,0,11,2.81,3.561,3.561,0,0,0,7.5,6.429,3.561,3.561,0,0,0,11,10.048Z"/>
                                 </svg>
                                 Profile
                              </div>
                           </a>
                        </li>
                        <li class="nav-link dropdown-toggle menukartlink">
                           <a href="{{url('my-coupon')}}">
                              <div class="link">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22">
                                    <defs>
                                       <style>.a{fill:none;}.b{fill:#0f0f0f;}</style>
                                    </defs>
                                    <path class="a" d="M0,0H22V22H0Z"/>
                                    <path class="b" d="M2,8.778V3.889A.894.894,0,0,1,2.9,3H19.1a.894.894,0,0,1,.9.889V8.778a2.222,2.222,0,1,0,0,4.444v4.889a.894.894,0,0,1-.9.889H2.9a.894.894,0,0,1-.9-.889V13.222A2.222,2.222,0,1,0,2,8.778ZM3.8,7.416a3.978,3.978,0,0,1,0,7.168v2.638H18.2V14.584a3.978,3.978,0,0,1,0-7.168V4.778H3.8Zm4.5.917h5.4v1.778H8.3Zm0,3.556h5.4v1.778H8.3Z" transform="translate(0)"/>
                                 </svg>
                                 My Coupon
                              </div>
                           </a>
                        </li>
                        <li class="nav-link dropdown-toggle alertlink active">
                           <a href="alert.html">
                              <div class="link">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22">
                                    <defs>
                                       <style>.a{fill:none;}</style>
                                    </defs>
                                    <path class="a" d="M0,0H22V22H0Z"/>
                                    <path d="M18.2,15.571H20v1.81H2v-1.81H3.8V9.238a7.2,7.2,0,1,1,14.4,0Zm-1.8,0V9.238a5.4,5.4,0,1,0-10.8,0v6.333ZM8.3,19.19h5.4V21H8.3Z" transform="translate(0)"/>
                                 </svg>
                                 Alerts
                              </div>
                           </a>
                        </li>
                        <li class="nav-link dropdown-toggle afiliatelink">
                           <a href="{{url('affiliate')}}">
                              <div class="link">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="22.3" height="22.3" viewBox="0 0 22.3 22.3">
                                    <defs>
                                       <style>.afiliatelink .a{stroke:#000;}</style>
                                    </defs>
                                    <g transform="translate(0.15 0.15)">
                                       <path class="a" d="M20.066,9.066a1.937,1.937,0,0,0-1.823,1.289H16.765A5.774,5.774,0,0,0,15.53,7.381l1.017-1.017a1.932,1.932,0,1,0-.912-.911L14.619,6.47a5.774,5.774,0,0,0-2.974-1.235V3.756a1.934,1.934,0,1,0-1.289,0V5.235A5.774,5.774,0,0,0,7.381,6.47L6.365,5.453a1.935,1.935,0,1,0-.912.911L6.47,7.381a5.774,5.774,0,0,0-1.235,2.974H3.756a1.934,1.934,0,1,0,0,1.289H5.235A5.774,5.774,0,0,0,6.47,14.619L5.453,15.636a1.932,1.932,0,1,0,.912.911L7.381,15.53a5.774,5.774,0,0,0,2.974,1.235v1.479a1.934,1.934,0,1,0,1.289,0V16.765a5.773,5.773,0,0,0,2.974-1.235l1.016,1.016a1.935,1.935,0,1,0,.912-.911L15.53,14.619a5.773,5.773,0,0,0,1.235-2.974h1.479a1.933,1.933,0,1,0,1.823-2.578Zm-3.142-4.9a.645.645,0,1,1,0,.911A.645.645,0,0,1,16.925,4.164Zm-11.85.911a.645.645,0,1,1,0-.911A.645.645,0,0,1,5.075,5.075ZM1.934,11.645A.645.645,0,1,1,2.578,11,.645.645,0,0,1,1.934,11.645Zm3.142,6.192a.645.645,0,1,1,0-.911A.645.645,0,0,1,5.075,17.836Zm11.85-.911a.645.645,0,1,1,0,.911A.645.645,0,0,1,16.925,16.925ZM11,1.289a.645.645,0,1,1-.645.645A.645.645,0,0,1,11,1.289Zm0,19.422a.645.645,0,1,1,.645-.645A.645.645,0,0,1,11,20.711Zm0-5.2a4.49,4.49,0,0,1-2.791-.969,3.224,3.224,0,0,1,5.581,0A4.489,4.489,0,0,1,11,15.512ZM9.711,10.355A1.289,1.289,0,1,1,11,11.645,1.291,1.291,0,0,1,9.711,10.355ZM14.7,13.575a4.484,4.484,0,0,0-1.781-1.5,2.578,2.578,0,1,0-3.844,0,4.484,4.484,0,0,0-1.78,1.5,4.512,4.512,0,1,1,7.406,0Zm5.364-1.93A.645.645,0,1,1,20.711,11,.645.645,0,0,1,20.066,11.645Z"/>
                                    </g>
                                 </svg>
                                 Afiliate
                              </div>
                           </a>
                        </li>
                        <li class="nav-link dropdown-toggle infolink">
                           <a href="#">
                              <div class="link">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22">
                                    <defs>
                                       <style>.a{fill:none;}</style>
                                    </defs>
                                    <path class="a" d="M0,0H22V22H0Z"/>
                                    <path d="M5,20a.954.954,0,0,1-1-.9V2.9A.954.954,0,0,1,5,2H19a.954.954,0,0,1,1,.9V5.6H18V3.8H6V18.2H18V16.4h2v2.7a.954.954,0,0,1-1,.9Zm13-5.4V11.9H11V10.1h7V7.4L23,11Z" transform="translate(-2)"/>
                                 </svg>
                                 Logout
                              </div>
                           </a>
                        </li>
                     </ul>
                  </div>
               </div>
               <div class="col rightcontentsec prflrightcontentsec">
                  <section class="storesection innersection profilearea">
                     <h2>Alerts<a href="#" class="addbtn alertbtn">Save Alert</a></h2>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="alertsection">
                              <div class="alertblock">
                                 <div class="select-data sortselect">
                                    <label>Select kitchens for which you want to receive an alert</label>
                                    <select class="selectpicker">
                                       <option>Select Kitchens</option>
                                       <option>Select Kitchens 1</option>
                                       <option>Select Kitchens 2</option>
                                    </select>
                                 </div>
                                 <div class="categoryselect">
                                    <ul class="categoryselect_list">
                                       <li><i class="fa fa-times"></i><img src="{{asset('frontend/images/kitchencategory1.png')}}" />
                                          <span>Sushi</span>
                                       </li>
                                       <li><i class="fa fa-times"></i><img src="{{asset('frontend/images/kitchencategory2.png')}}" />
                                          <span>Chicken</span>
                                       </li>
                                       <li><i class="fa fa-times"></i><img src="{{asset('frontend/images/kitchencategory3.png')}}" />
                                          <span>Mexican</span>
                                       </li>
                                       <li><i class="fa fa-times"></i><img src="{{asset('frontend/images/kitchencategory4.png')}}" />
                                          <span>Burger</span>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="alertsection">
                              <div class="alertblock">
                                 <div class="select-data sortselect">
                                    <label>Select the restaurants for which you want to receive an alert</label>
                                    <select class="selectpicker">
                                       <option>Select Restaurants</option>
                                       <option>Select Restaurants 1</option>
                                       <option>Select Restaurants 2</option>
                                    </select>
                                 </div>
                                 <div class="categoryselect">
                                    <ul class="categoryselect_list">
                                       <li><i class="fa fa-times"></i><img src="{{asset('frontend/images/rescategory1.png')}}" />
                                          <span>Taco Mundo</span>
                                       </li>
                                       <li><i class="fa fa-times"></i><img src="{{asset('frontend/images/rescategory2.png')}}" />
                                          <span>Burger King</span>
                                       </li>
                                       <li><i class="fa fa-times"></i><img src="{{asset('frontend/images/rescategory3.png')}}" />
                                          <span>KFC</span>
                                       </li>
                                    </ul>
                                 </div>
                                 <div class="select-data sortselect pt-4">
                                    <select class="selectpicker">
                                       <option>Select coupon type</option>
                                       <option>Coupon Type 1</option>
                                       <option>Coupon Type 2</option>
                                    </select>
                                 </div>
                                 <div class="categoryselect">
                                    <ul class="categoryselect_list">
                                       <li><i class="fa fa-times"></i><img src="{{asset('frontend/images/cpncategory1.svg')}}" />
                                          <span>Pre-order</span>
                                       </li>
                                       <li><i class="fa fa-times"></i><img src="{{asset('frontend/images/cpncategory2.png')}}" />
                                          <span>Ontbijt/Lunch</span>
                                       </li>
                                       <li><i class="fa fa-times"></i><img src="{{asset('frontend/images/cpncategory3.png')}}" />
                                          <span>Dinner</span>
                                       </li>
                                       <li><i class="fa fa-times"></i><img src="{{asset('frontend/images/cpncategory4.png')}}" />
                                          <span>Late night</span>
                                       </li>
                                       <li><i class="fa fa-times"></i><img src="{{asset('frontend/images/cpncategory5.png')}}" />
                                          <span>Specials</span>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                              <div class="alertblock">
                                 <div class="select-data sortselect">
                                    <label>How do you want to receive your food alerts?</label>
                                 </div>
                                 <div class="foodalert_btns">
                                    <a href="#" class="active">My Account</a>
                                    <a href="#">E-mail</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </section>
               </div>
            </div>
         </div>
      </main>
	  
	  <script type="text/javascript">
           $(document).on('ready', function() {
           $('.center').slick({
           centerMode: true,
           centerPadding: '0px',
           slidesToShow: 7,
           autoplay: true,
           arrows: true,
           autoplaySpeed: 2000,
           responsive: [
         {
             breakpoint: 1441,
             settings: {
               arrows: true,
               centerMode: true,
               centerPadding: '0px',
               slidesToShow: 6
             }
           },
           
           {
             breakpoint: 1281,
             settings: {
               arrows: true,
               centerMode: true,
               centerPadding: '0px',
               slidesToShow: 5
             }
           },
         {
             breakpoint: 991,
             settings: {
               arrows: true,
               centerMode: true,
               centerPadding: '0px',
               slidesToShow: 4
             }
           },
         
           {
             breakpoint: 575,
             settings: {
               arrows: true,
               centerMode: true,
               centerPadding: '0px',
               slidesToShow: 2
             }
           },
              {
             breakpoint: 414,
             settings: {
               arrows: true,
               centerMode: true,
               centerPadding: '0px',
               slidesToShow: 1
             }
           }
         
           ]
           });
           
           });
      </script>
      <script>
         // Selectable
         
         const list1 = document.getElementById("switch1");
         
         const selectable1 = new Selectable({
         filter: list1.children,
         appendTo: list1
         });
         
         const list2 = document.getElementById("switch2");
         
         const selectable2 = new Selectable({
         filter: list2.children,
         appendTo: list2
         });
         
      </script>
      <script>
         $(function() {
         	var Accordion = function(el, multiple) {
         		this.el = el || {};
         		this.multiple = multiple || false;
         
         		// Variables privadas
         		var links = this.el.find('.link');
         		// Evento
         		links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
         	}
         
         	Accordion.prototype.dropdown = function(e) {
         		var $el = e.data.el;
         			$this = $(this),
         			$next = $this.next();
         
         		$next.slideToggle();
         		$this.parent().toggleClass('open');
         
         
         	}	
         
         	var accordion = new Accordion($('#accordion'), false);
         });
      </script>
@endsection