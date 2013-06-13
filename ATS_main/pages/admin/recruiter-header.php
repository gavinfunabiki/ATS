		<div class="row-fluid">
            <div class="span12">
                <ul class="topnav">
                	<li><a href="recruiter-manage-categories">Manage categories</a></li>
                    <li><a>Manage emails</a></li>
                    <li><a>Manage reports</a></li>
                    <li><a>Manage users</a></li>
                </ul>
            </div>
        </div>
        
        <div class="row-fluid">
			<div class="span12 topborder">
				<div class="topoptions"> 
                	<div class="querydrop">

                        <select class="selectpicker input-xlarge query-selectbox required" id="txtcountry" name="country">

                            <option value="" selected="selected">All categories</option>
                            <option value="" selected="selected">Laura's categories</option>
                            <option value="" selected="selected">Auto & Heavy equipment</option>
                            <option value="" selected="selected">Katherine's categories</option>

                        </select>
                        
                        <div class="newquery"><a><img src="assets/img/add2.png" alt="Create a new query" width="16" height="16"  />Create a new query</a></div>

                    </div>
                    
                    <div class="searchwrap">
                    	<div class="searchbar">
                        	<input type="text" class="text required searchfield" name="search" id="txtsearch" value="" />
                            <i id="clearsearch" class="icon-remove" onclick="oTable.fnFilter(''); $('#txtsearch').val(''); $('#clearsearch').fadeOut();"></i>
                        </div>
                        
                        <ul class="searchgo">
                        	<li><a href="#tableint" onclick="oTable.fnFilter($('#txtsearch').val()); $('#clearsearch').fadeIn();">Search this page</a></li>
                            <li><a>Search all</a></li>
                        </ul>
                        
                        <div>
                        	<a href="recruiter-advanced-search">Advanced seach</a>
                        </div>
                        
                        <div class="searchadv">
                        	<a></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row-fluid">
            <div class="span12 tabnav">
            	<ul class="tabwrap">
                	<li><a href="recruiter-dashboard" <?php echo ($active==1?'class="active"':''); ?>>Dashboard</a></li>
                    <li><a href="recruiter-ready-for-adp" <?php echo ($active==2?'class="active"':''); ?>>Ready for ADP <div class="notif">12</div></a></li>
                    <li><a href="recruiter-adp-in-progress" <?php echo ($active==3?'class="active"':''); ?>>ADP in progress</a></li>
                    <li><a href="recruiter-finished-adp" <?php echo ($active==4?'class="active"':''); ?>>Finished ADP <div class="notif">16</div></a></li>
                    <li><a href="recruiter-search-results" <?php echo ($active==5?'class="active"':''); ?>>Search Results</a></li>
                    <li><a href="recruiter-reports" <?php echo ($active==6?'class="active"':''); ?>>Reports</a></li>
                </ul>
            </div>
        </div>