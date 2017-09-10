@include('backend.template.header') 
 @include('backend..template.menu')

 <link href="../node_modules/fullcalendar/dist/fullcalendar.css" rel="stylesheet">
 <!-- /. NAV SIDE  -->
 <div id="page-wrapper">
            <div id="page-inner">
                    <div id='calendar'></div>

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
 

 @include('backend..template.footer')
 <script src="../node_modules/moment/moment.js"></script>
 <script src="../node_modules/fullcalendar/dist/fullcalendar.min.js"></script>
 
<script src='../node_modules/fullcalendar/dist/locale-all.js'></script>
 <script src="{{asset('js/agenda/index.js')}}"></script>
 