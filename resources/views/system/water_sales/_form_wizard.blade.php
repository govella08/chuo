<div class="col-md-6">
    <h5 class="lg-title">Wizard with Progress Bar</h5>
    <p class="mb20">Same with basic wizard setup but with progress bar.</p>

    <!-- PROGRESS WIZARD -->
    <form method="post" id="progressWizard" class="panel-wizard">
        <ul class="nav nav-justified nav-wizard">
            <li><a href="wsdindex.html#tab1-2" data-toggle="tab"><strong>Step 1:</strong> Basic Info</a></li>
            <li><a href="wsdindex.html#tab2-2" data-toggle="tab"><strong>Step 2:</strong> Product Info</a></li>
            <li><a href="wsdindex.html#tab3-2" data-toggle="tab"><strong>Step 3:</strong> Payment</a></li>
        </ul>
        
        <div class="progress progress-xs">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        
        <div class="tab-content">
            
            <div class="tab-pane" id="tab1-2">
                <div class="form-group">
                    <label class="col-sm-4">Firstname</label>
                    <div class="col-sm-8">
                        <input type="text" name="firstname" class="form-control" />
                    </div>
                </div><!-- form-group -->
                
                <div class="form-group">
                    <label class="col-sm-4">Lastname</label>
                    <div class="col-sm-8">
                        <input type="text" name="lastname" class="form-control" />
                    </div>
                </div><!-- form-group -->
                
                <div class="form-group">
                    <label class="col-sm-4">Gender</label>
                    <div class="col-sm-8">
                        <div class="rdio rdio-primary">
                            <input type="radio" checked="checked" id="male2" value="m" name="radio">
                            <label for="male2">Male</label>
                        </div>
                        <div class="rdio rdio-primary">
                            <input type="radio" value="f" id="female2" name="radio">
                            <label for="female2">Female</label>
                        </div>
                    </div>
                </div><!-- form-group -->
            </div><!-- tab-pane -->
            
            <div class="tab-pane" id="tab2-2">
                <div class="form-group">
                    <label class="col-sm-4">Product ID</label>
                    <div class="col-sm-5">
                        <input type="text" name="product_id" class="form-control" />
                    </div>
                </div><!-- form-group -->
                
                <div class="form-group">
                    <label class="col-sm-4">Product Name</label>
                    <div class="col-sm-8">
                        <input type="text" name="product_name" class="form-control" />
                    </div>
                </div><!-- form-group -->
                
                <div class="form-group">
                    <label class="col-sm-4">Category</label>
                    <div class="col-sm-4">
                        <select class="width100p" data-placeholder="Choose One">
                            <option value="">Choose One</option>
                            <option value="">3D Animation</option>
                            <option value="">Web Design</option>
                            <option value="">Software Engineering</option>
                        </select>
                    </div>
                </div><!-- form-group -->
            </div><!-- tab-pane -->
            
            <div class="tab-pane" id="tab3-2">
                <div class="form-group">
                    <label class="col-sm-4">Card No</label>
                    <div class="col-sm-8">
                        <input type="text" name="cardno" class="form-control" />
                    </div>
                </div><!-- form-group -->
                
                <div class="form-group">
                    <label class="col-sm-4">Expiration</label>
                    <div class="col-sm-4">
                        <select class="width100p" data-placeholder="Month">
                            <option value="">Choose One</option>
                            <option value="">January</option>
                            <option value="">February</option>
                            <option value="">March</option>
                            <option value="">...</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <select class="width100p" data-placeholder="Year">
                            <option value="">Choose One</option>
                            <option value="">2013</option>
                            <option value="">2014</option>
                            <option value="">2015</option>
                            <option value="">...</option>
                        </select>
                    </div>
                </div><!-- form-group -->
                
                <div class="form-group">
                    <label class="col-sm-4">CSV</label>
                    <div class="col-sm-4">
                        <input type="text" name="csv" class="form-control" />
                    </div>
                </div><!-- form-group -->
            </div><!-- tab-pane -->
        </div><!-- tab-content -->
        
        <ul class="list-unstyled wizard">
            <li class="pull-left previous"><button type="button" class="btn btn-default">Previous</button></li>
            <li class="pull-right next"><button type="button" class="btn btn-primary">Next</button></li>
            <li class="pull-right finish hide"><button type="submit" class="btn btn-primary">Finish</button></li>
        </ul>
        
    </form><!-- panel-wizard -->
    
</div><!-- col-md-6 -->

</div><!-- row -->

<br /><br />