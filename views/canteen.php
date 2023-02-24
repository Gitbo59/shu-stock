<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard 
                    <?php 
					if($_SESSION['admin'] == 1){
					?>
                    <button class="pull-right btn btn-info btn-sm" data-toggle="modal" data-target="#help">
                        <i class="fa  fa-question fa-2x"></i>
                    </button>
                    <?php
					}								
					?>	
                </h1>
                
                <!-- Modal -->
                <div class="modal fade" id="help" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Help</h4>
                            </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->                
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            
            <div class="column">
                <div class="card">
                    
                    <img class="canteen-img"src="https://www.shu.ac.uk/-/media/home/about-us/our-services/eating/where-can-i-eat/resized-new-images/cantor-building.jpeg?iar=0&hash=B9094A543B758A9221EFC59C81D2FCAA" alt="Cantor" style="width:100%">
                    
                    <div class="description">
                        <h2>Cantor Building</h2>
                        
                        <p>Smaller canteen with decent amount of seating seating.</p>
                        
                        
                    
                        <a href="/customers">
                            
                            <p><button class="button">What's in stock?</button></p>
                            
                        </a>
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="card">
                    
                    <img class="canteen-img" src="https://www.shu.ac.uk/-/media/home/business/images/promo-box-two.jpg?iar=0&sc_lang=en&hash=65EA782310966DEC2B8423B6FF1705EE" alt="Charles Street" style="width:100%">
                    
                    <div class="description">
                        <h2>Charles Street</h2>
                        <p>Smaller canteen with decent amount of seating seating.</p>
                        
                    
                        <a href="/customers">
                            
                            <p><button class="button">What's in stock?</button></p>
                            
                        </a>
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="card">
                    
                    <img class="canteen-img" src="https://www.shu.ac.uk/-/media/home/about-us/our-services/eating/kitchen-images/hallam-kitchen-2.jpg?iar=0&hash=A8A8B4AF5E830AD90001081EFB6CCB93" alt="Atrium" style="width:100%">
                    
                    <div class="description">
                        <h2>Atrium Level 3</h2>
                        <p>Smaller canteen with decent amount of seating seating.</p>
                        
                    
                        <a href="/customers">
                            
                            <p><button class="button">What's in stock?</button></p>
                            
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
                        
            <div class="column">
                <div class="card">
                    
                    <img class="canteen-img" src="https://www.shu.ac.uk/-/media/home/about-us/our-services/event-services/venues/chef-hallam-central/city163owenchef-hallam.jpg?sc_lang=en" alt="Owen Building" style="width:100%">
                    
                    <div class="description">
                        <h2>Owen Building</h2>
                        <p>Smaller canteen with decent amount of seating seating.</p>
                        
                    
                        <a href="/customers">
                            
                            <p><button class="button">What's in stock?</button></p>
                            
                        </a>
                    </div>
                    
                </div>
            </div>

            <div class="column">
                <div class="card">
                    
                    <img class="canteen-img" src="https://i0.wp.com/blogs.shu.ac.uk/futurespaces/files/2018/11/DSC_0514.jpg?fit=1200%2C798&ssl=1&w=640" alt="Aspect Court" style="width:100%">
                    
                    <div class="description">
                        <h2>Aspect Court</h2>
                        <p>Smaller canteen with decent amount of seating seating.</p>
                        
                    
                        <a href="/customers">
                            
                            <p><button class="button">What's in stock?</button></p>
                            
                        </a>
                    </div>
                    
                </div>
            </div>
            <div class="column">
                <div class="card">
                    
                    <img class="canteen-img" src="https://www.shu.ac.uk/-/media/home/myhallam/it-and-library/online-learning-adsetts.jpg?iar=0&hash=93E8674095DC87ABBFAAC428AFAEBD87" alt="Adsetts Library" style="width:100%">
                    
                    <div class="description">
                        <h2>Adsetts Library</h2>
                        <p>Smaller canteen with decent amount of seating seating.</p>
                        
                    
                        <a href="/customers">
                            
                            <p><button class="button">What's in stock?</button></p>
                            
                        </a>
                    </div>
                    
                </div>
            </div>
           
            
            
        </div>
        <!-- /.row -->
        
    </div>
    <!-- /.container-fluid -->
    
</div>
<!-- /#page-wrapper -->