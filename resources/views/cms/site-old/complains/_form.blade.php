<div class="contact">

                    <!-- {{ csrf_token() }} -->
                       {!! Form::open(['route' => 'contactus.store', 'class'=> 'add_p']) !!}
                      <!--  {{ csrf_token() }} -->
                            <p>{{ label('lbl_fullname')}}:
                        {!! Form::text('names',null,['class' => 'add_i' ,'autofocus']) !!} </p>
                        <p>{{ label('lbl_email') }}:
                            {!! Form::email('email',null,['class' => 'add_i' ,'autofocus', 'required']) !!} </p>
                        <p><span class='form_error' style="color:red;">{!! $errors->first('email') !!}</span></p>

                        <p>{{ label('lbl_phone') }}:
                            {!! Form::text('phone',null,['class' => 'add_i' ,'autofocus']) !!} </p>
                        <p><span class='form_error' style="color:red;">{!! $errors->first('phone') !!}</span></p>

                         <p>{{ label('lbl_phone') }}:
                            <p>{!! Form::select('category' , $categories, null, ['id' => 'subject-type']) !!}</p>
                        <p><span class='form_error' style="color:red;">{!! $errors->first('phone') !!}</span></p>

                        <p>{{ label('lbl_subject')}}:
                            {!! Form::text('subject',null,['class' => 'add_i' ,'autofocus']) !!} </p>
                        <p>
                        <p> <span class='form_error' style="color:red;">{!! $errors->first('subject') !!}</span></p>
                        <p> <span class='form_error' style="color:red;">{!! $errors->first('sector') !!}</span></p>
                        <p>{{ label('lbl_message')}}:
                            {!! Form::textarea('message',null,['id'=>'add_a','cols'=>'30','rows'=>'10','autofocus']) !!}
                        </p>
                         <p><span class='form_error' style="color:red;">{!! $errors->first('message') !!}</span></p>
                        <p>
                            <button type="submit" class="btn btn-primary">{{ label('lbl_send') }}</button>
                        </p>
                        {!! Form::close() !!}
                   </div>



                  