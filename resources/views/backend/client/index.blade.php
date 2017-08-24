@include('backend.template.header') 
@include('backend.template.menu')
<!-- /. NAV SIDE  -->
<div id="page-wrapper">
      <div id="page-inner">
             
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-10">
                              
                            <div class="input-group"> 
                                <input type="text" class="form-control" name="search" id="search"  > 
                                <div class="input-group-addon"><li class="fa fa-search "></li></div> 
                            </div> 
                        </div>
                        
                        <div class="col-sm-2">
                            <button class="btn btn-primary" id="btn_nuevo"><li class="fa fa-client  "></li> Nuevo</button>
                        </div>
                    </div>
                </div>
                    <hr />        
                <div class="row">
                    <div class="col-sm-12">
                <table class="table table-striped table-bordered table-hover" > 
                    <thead>
                        <tr> 
                                <th>Cliente</th>
                                <th>Email</th>
                                <th>Telefono</th>
                                <th>Celular</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                    </tbody>
                </table>       
            </div>
            <style>
            td:hover { 
                cursor:pointer;
            }
            </style>
            <!-- /. col-sm-12 -->
            </div>
            <!-- /. Row -->       

      </div>
            <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
 
 @include('backend.template.footer')