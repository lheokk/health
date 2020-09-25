<div class="row-fluid">
	<div class="span12">
		<div class="tabbable black-box" style="margin-bottom: 18px;">
		<!--шапка со значком настроек-->
		  <div class="tab-header">
			Server status
				<span class="pull-right">
				  <span class="options">
					<div class="btn-group">
					  <a class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i></a>
					  <ul class="dropdown-menu black-box-dropdown dropdown-left">
						<li><a href="#">Action</a></li>
						<li><a href="#">Another action</a></li>
						<li><a href="#">Something else here</a></li>
						<li class="divider"></li>
						<li><a href="#">Separated link</a></li>
					  </ul>
					</div>
				  </span>
				</span>
		  </div>
		<!--конец шапки-->
		
		  <ul class="nav nav-tabs">
			<li class=""><a href="#tab1" data-toggle="tab"><i class="icon-globe"></i> System</a></li>
			<li class="active"><a href="#tab2" data-toggle="tab"><i class="icon-hdd"></i> Server</a></li>
		  </ul>
		  <div class="tab-content">
			<!--первая вкладка System-->
			<div class="tab-pane" id="tab1">
			  <div class="separator">
				<div class="inner-well clearfix">
				  <div class="pull-left">
					Antivirus status
				  </div>

				  <div class="pull-right">
					<input rel="confirm-check" type="checkbox" id="qumxc" class="checky" checked="checked"/>
					<label for="qumxc" class="checky"><span></span></label>
				  </div>
				</div>

				<div class="inner-well clearfix">
				  <div class="pull-left">
					Proxy server status
				  </div>

				  <div class="pull-right">
					<input rel="confirm-check" type="checkbox" id="zWqNf" class="checky" />
					<label for="zWqNf" class="checky"><span></span></label>
				  </div>
				</div>
			  </div>
			  <!--график-->
			  <div class="separator">
				<div class="inner-well">
				  <div id="stats1" style="width: 100%; height: 100px;"></div>
				</div>
			  </div>
			  <!--Delete Stats-->
			  <div class="padded">
				<div id="fix-stats">
				  <p>
					<a rel="action" class='button mini rounded inset light-gray'>Delete stats</a>
				  </p>

				  <div style="display: none;" rel="confirm-action">

					<div class="inner-well clearfix">
					  <b>Are you sure?</b>
					  <div class="pull-right">
						<input rel="confirm-check" type="checkbox" id="Qzxt3" class="checky"/>
						<label for="Qzxt3" class="checky green"><span></span></label>
					  </div>
					</div>

					<div class="clearfix vpadded">
					  <div class="pull-left">
						<a href="#" class="button red" rel="confirm-do">Delete</a>
					  </div>
					  <div class="pull-right">
						<a href="#" class="button gray" rel="confirm-cancel">Cancel</a>
					  </div>
					</div>

				  </div>

				</div>
			  </div>
			</div>
			<!--вторая вкладка Server-->
			<div class="tab-pane active" id="tab2">
			  <div class="separator">
				<div class="inner-well">
				  <div id="stats2" style="width: 100%; height: 100px;"></div>
				</div>
			  </div>
			  <div class="separator">
				<div class="inner-well clearfix">
				  <div class="pull-left">
					Antivirus status
				  </div>

				  <div class="pull-right">
					<input rel="confirm-check" type="checkbox" id="fXZCy" class="checky" checked="checked"/>
					<label for="fXZCy" class="checky"><span></span></label>
				  </div>
				</div>

				<div class="inner-well clearfix">
				  <div class="pull-left">
					Proxy server status
				  </div>

				  <div class="pull-right">
					<input rel="confirm-check" type="checkbox" id="9ABrW" class="checky" />
					<label for="9ABrW" class="checky"><span></span></label>
				  </div>
				</div>
			  </div>
			  <div class="padded">
				<div id="fix-stats2">
				  <p>
					<a rel="action" class='button mini rounded inset light-gray'>Delete stats</a>
				  </p>

				  <div style="display: none;" rel="confirm-action">

					<div class="inner-well clearfix">
					  <b>Are you sure?</b>
					  <div class="pull-right">
						<input rel="confirm-check" type="checkbox" id="vfn2F" class="checky"/>
						<label for="vfn2F" class="checky green"><span></span></label>
					  </div>
					</div>

					<div class="clearfix vpadded">
					  <div class="pull-left">
						<a href="#" class="button red" rel="confirm-do">Delete</a>
					  </div>
					  <div class="pull-right">
						<a href="#" class="button gray" rel="confirm-cancel">Cancel</a>
					  </div>
					</div>

				  </div>

				</div>
			  </div>
			</div>
		  </div>
	</div>
  </div>
</div>