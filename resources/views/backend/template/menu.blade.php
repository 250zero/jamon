
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand"  id="user_label">Admin </a>
            </div>

            <div class="header-right">
<!--    SEE PREMIUN JAMON
                <a href="message-task.html" class="btn btn-info" title="New Message"><b>30 </b><i class="fa fa-envelope-o fa-2x"></i></a>
                <a href="message-task.html" class="btn btn-primary" title="New Task"><b>40 </b><i class="fa fa-bars fa-2x"></i></a> -->
                <a href="{{url('/')}}/logout" class="btn btn-warning" title="Logout"><i class="fa fa-sign-out fa-2x"></i></a>

            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div  >
                            <img src="{{asset('img/log.png')}}" style="
    width: 200px;
    height: 250px;
    padding: 0px;
    margin-top: -40px;
    margin-left: 3px;
    margin-bottom: -70px;
"  />
 
                        </div>

                    </li>


                    <li>
                    <a  <?=(!empty($ScheduleClass))?$ScheduleClass:''?>  href="{{url('/')}}/agenda"><i class="fa fa-calendar "></i>Agenda</a>
                    </li>
                    <li>
                        <a   <?=(!empty($clientclass))?$clientclass:''?>  href="{{url('/')}}/clientes"><i class="fa fa-user "></i>Clientes</a>
                    </li>
                    <li>
                        <a  <?=(!empty($ReportClass))?$ReportClass:''?>  href="{{url('/')}}/reportes"><i class="fa fa-bar-chart-o "></i>Reportes <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            
                            <li>
                                <a   href="{{url('/')}}/reportes/mora"><i class="fa fa-bell "></i>Clientes en Mora</a>
                            </li>
                             <li>
                                <a  href="{{url('/')}}/reportes/historial"><i class="fa fa-calendar "></i>Historial de Cliente</a>
                            </li>
                             <li>
                                <a  href="{{url('/')}}/reportes/historial/prestamos"><i class="fa fa-calendar "></i>Historial de Prestamos</a>
                            </li>
                             <li>
                                <a  href="{{url('/')}}/reportes/historial/prestamos"><i class="fa fa-dashboard "></i>Estado Actual</a>
                            </li>
                             <!-- <li>
                                <a href="wizard.html"><i class="fa fa-bug "></i>Wizard</a>
                            </li>
                             <li>
                                <a href="typography.html"><i class="fa fa-edit "></i>Typography</a>
                            </li>
                             <li>
                                <a href="grid.html"><i class="fa fa-eyedropper "></i>Grid</a>
                            </li>
                             -->
                           
                        </ul>
                    </li> 
                     <!-- <li>
                        <a href="#"><i class="fa fa-yelp "></i>Extra Pages <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="invoice.html"><i class="fa fa-coffee"></i>Invoice</a>
                            </li>
                            <li>
                                <a href="pricing.html"><i class="fa fa-flash "></i>Pricing</a>
                            </li>
                             <li>
                                <a href="component.html"><i class="fa fa-key "></i>Components</a>
                            </li>
                             <li>
                                <a href="social.html"><i class="fa fa-send "></i>Social</a>
                            </li>
                            
                             <li>
                                <a href="message-task.html"><i class="fa fa-recycle "></i>Messages & Tasks</a>
                            </li>
                            
                           
                        </ul>
                    </li>
                    <li>
                        <a href="table.html"><i class="fa fa-flash "></i>Data Tables </a>
                        
                    </li>
                     <li>
                        <a href="#"><i class="fa fa-bicycle "></i>Forms <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                           
                             <li>
                                <a href="form.html"><i class="fa fa-desktop "></i>Basic </a>
                            </li>
                             <li>
                                <a href="form-advance.html"><i class="fa fa-code "></i>Advance</a>
                            </li>
                             
                           
                        </ul>
                    </li>
                      <li>
                        <a href="gallery.html"><i class="fa fa-anchor "></i>Gallery</a>
                    </li>
                     <li>
                        <a href="error.html"><i class="fa fa-bug "></i>Error Page</a>
                    </li>
                    <li>
                        <a href="login.html"><i class="fa fa-sign-in "></i>Login Page</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap "></i>Multilevel Link <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="#"><i class="fa fa-bicycle "></i>Second Level Link</a>
                            </li>
                             <li>
                                <a href="#"><i class="fa fa-flask "></i>Second Level Link</a>
                            </li>
                            <li>
                                <a href="#">Second Level Link<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#"><i class="fa fa-plus "></i>Third Level Link</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-comments-o "></i>Third Level Link</a>
                                    </li>

                                </ul>

                            </li>
                        </ul>
                    </li>
                   -->
                   
                   <li>
                        <a   <?=(!empty($configclass))?$configclass:''?>  href="{{url('/')}}/config"><i class="fa fa-cog "></i>Configuración</a>
                   </li> 

                </ul>

            </div>

        </nav>