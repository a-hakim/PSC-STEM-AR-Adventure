<!-- HEADER -->
<?php require 'component/header.php'; ?>

<!-- BODY -->
<body style='margin : 0px; overflow: auto;'>

	<!-- Overlay Body -->
	<div class="checkpoint-body text-light" id="checkpoint_body">
		<div style="display: grid; grid-template-columns: auto 24px;">
			<span></span>
			<i class="fas fa-times" onclick="close_body()" style="cursor: pointer;"></i>
		</div>
		<div id="explain_body" style="display: none; height: 100%; overflow: auto; padding-bottom: 80px;">
			<h4>Internal combustion engine</h4>
			<img src="img/4StrokeEngine.gif">
			<p style="text-align: justify;">
				Internal combustion engines (ICE) are the most common form of heat engines, as they are used in vehicles, boats, ships, airplanes, and trains. They are named as such because the fuel is ignited in order to do work inside the engine. The same fuel and air mixture is then emitted as exhaust.
				<ol style="text-align: left;">
					<li>Fuel and air is injected into the chamber.</li>
					<li>The fuel catches fire from spark plug as the piston compressing the compound.</li>
					<li>This fire pushes the piston which is the useful motion.</li>
					<li>The waste products, by volume s is mostly water vapor (H<sup>2</sup>O) and carbon dioxide (CO<sup>2</sup>). There can be pollutants as well like carbon monoxide from incomplete combustion.</li>
				</ol>
			</p>
			<a href="https://energyeducation.ca/encyclopedia/Internal_combustion_engine" target="_blank">Click here to learn more</a>
		</div>
		<div id="quiz_body" style="display: none;">
			<h4>QUIZ!</h4>
			<p>What was the waste products of complete combustion in internal combustion engine operation?</p>
			<div id="ans_opt" class="row justify-content-center">
				<div class="col-md-4 col-md-offset-2">
					<button type="button" class="btn btn-outline-light btn-block" style="margin-bottom: 8px;" onclick="answer_check(true, 'xpoint4')">
						Water & Carbon Dioxide
					</button>
				</div>
				<div class="col-md-4">
					<button type="button" class="btn btn-outline-light btn-block" style="margin-bottom: 8px;" onclick="answer_check(false, 'xpoint4')">
						Air & Fuels
					</button>
				</div>
			</div>
			<div id="answer" style="display: none; border-top: 1px solid #fff; padding-top: 8px;">
				<div class="ans_right" style="display: none;">
					<h4 class="text-success">CORRECT!</h4>
					<h6><span class="badge badge-success">+10 Points!</span></h6>
				</div>
				<div class="ans_false" style="display: none;">
					<h4 class="text-warning">TOO BAD</h4>
					<h6><span class="badge badge-warning">+5 Points!</span></h6>
				</div>
				<p style="text-align: justify;">
					<b>ANS:</b> Water & Carbon Dioxide. Water vapor, H<sup>2</sup>O and Carbon Dioxide, CO<sup>2</sup> were produced as the result of (Air + Fuel) combustion. 
				</p>
			</div>
			<div class="ans_right" style="display: none;">
				<a href="#" class="btn btn-success" style="margin-bottom: 8px;" id="next-url">
					NEXT <span class="badge badge-light">10</span>
				</a>
			</div>
			<div class="ans_false" style="display: none;">
				<a href="#" class="btn btn-success" style="margin-bottom: 8px;" id="next-url">
					NEXT <span class="badge badge-light">5</span>
				</a>
			</div>
		</div>
	</div>

	<!-- Overlay Menu -->
	<div class="checkpoint-block" id="checkpoint_block">
		<div class="checkpoint-wait" id="checkpoint_wait" class="text-white">
			<button type="button" class="btn btn-outline-light btn-md" disabled="disabled">
				Searching Marker...
			</button>
		</div>
		<div class="checkpoint-menu" id="checkpoint_menu" style="display: block;">
			<div class="btn-group">
				<button type="button" class="btn btn-outline-light btn-md" onclick="start_animation('#mod_engine')">
					<i class="fas fa-play-circle"></i> &nbsp;Play
				</button>
				<button type="button" class="btn btn-outline-light btn-md" onclick="start_explain()">
					<i class="fas fa-info-circle"></i> &nbsp;Learn
				</button>
				<button type="button" class="btn btn-outline-light btn-md" onclick="start_quiz()">
					<i class="fas fa-flag"></i> &nbsp;Quiz
				</button>
			</div>
		</div>
	</div>

	<!-- A-Frame AR -->
	<a-scene embedded arjs="debugUIEnabled: false;" vr-mode-ui="enabled: false">
		<!-- define asset -->
		<a-assets>
			<a-asset-item id="engine" src="./model/engine/engine.dae"></a-asset-item>
		</a-assets>
		<!-- define marker -->
		<a-marker type='pattern' url='./pattern/eng-pattern-marker.patt' detect-marker="id: marker-eng" id="marker-eng">
			<a-entity id="mod_engine">
				<a-animation attribute="rotation" from="0 0 0" to="0 360 0" dur="5000" begin="play-animation"></a-animation>
				<a-text value="Air + Fuel" position="0.6 2.4 -0.4">
					<a-text value="Enter <<<" position="0.2 -0.2 0" align="left" scale="0.6 0.6 0.6" color="red"></a-text>
				</a-text>
				<a-text value="CO2 + H2O" position="-0.6 2.4 -0.4" align="right">
					<a-text value="<<< Exit" position="-0.2 -0.2 0" align="right" scale="0.6 0.6 0.6" color="red"></a-text>
				</a-text>
				<a-entity collada-model="#engine" scale="0.2 0.2 0.2" position="0 0 0"></a-entity>
			</a-entity>
		</a-marker>
		<!-- define camera -->
		<a-entity camera></a-entity>
	</a-scene>

</body>

<!-- FOOTER -->
<?php require 'component/footer.php'; ?>