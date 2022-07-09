         <div class="row">
          <div class="col-md-3"></div>
          <div class="form-group">
          <div class="col-md-6">
             <table class="table table-bordered table-dark-header table-dark-header">
               <tr>
                 <td>Email</td>
                 <td>{!! $user->email !!}</td>
               </tr>
             </table>
           </div>
           </div>
            <div class="col-md-3"></div>
         </div>

         <div class="row">
          <div class="col-md-3"></div>
          <div class="form-group">
          <div class="col-md-6">
             <table class="table table-dark-header table-dark-header">
               <tr>
                 <td>Update Role:</td>
                 <td>  {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','required')) !!}</td>
                 <td> {!! Form::submit("Update", ['class' => 'btn btn-success']) !!}</td>
               </tr>
             </table>
           </div>
           </div>
            <div class="col-md-3"></div>
         </div>





