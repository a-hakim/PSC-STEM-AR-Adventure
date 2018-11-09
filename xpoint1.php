<!-- HEADER -->
<?php require 'component/header.php'; ?>

<!-- BODY -->
<body style='margin : 0px;'>

	<!-- Overlay Body -->
	<div class="checkpoint-body text-light" id="checkpoint_body">
		<div style="display: grid; grid-template-columns: auto 24px;">
			<span></span>
			<i class="fas fa-times" onclick="close_body()" style="cursor: pointer;"></i>
		</div>
		<div id="explain_body" style="display: none; height: 100%; overflow: auto; padding-bottom: 80px;">
			<h4>Eclipse</h4>
			<p style="text-align: justify;">
				An eclipse takes place when one heavenly body such as a moon or planet moves into the shadow of another heavenly body. There are two types of eclipses on Earth: an eclipse of the moon and an eclipse of the sun.
			</p>
			<img src="img/lunar.jpg" style="margin-bottom: 20px;">
			<p style="text-align: justify;">
				<b>LUNAR ECLIPSE:</b> When Earth passes directly between the sun and the moon, a lunar eclipse takes place.
			</p>
			<br>
			<img src="img/solar.jpg" style="margin-bottom: 20px;">
			<p style="text-align: justify;">
				<b>SOLAR ECLIPSE:</b> During a solar eclipse, the moon casts two shadows. One is called the umbra; the other is called the penumbra.
			</p>
			<a href="https://www.nasa.gov/audience/forstudents/5-8/features/nasa-knows/what-is-an-eclipse-58" target="_blank">Click here to learn more</a>
		</div>
		<div id="quiz_body" style="display: none;">
			<h4>QUIZ!</h4>
			<p>Identify the type of eclipse when Earth passes between the sun and the moon.</p>
			<div id="ans_opt" class="row justify-content-center">
				<div class="col-md-4 col-md-offset-2">
					<button type="button" class="btn btn-outline-light btn-block" style="margin-bottom: 8px;" onclick="answer_check(true, 'xpoint2')">
						Lunar Eclipse
					</button>
				</div>
				<div class="col-md-4">
					<button type="button" class="btn btn-outline-light btn-block" style="margin-bottom: 8px;" onclick="answer_check(false, 'xpoint2')">
						Solar Eclipse
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
					<b>ANS:</b> When Earth passes directly between the sun and the moon, a lunar eclipse takes place.
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
				<button type="button" class="btn btn-outline-light btn-md" onclick="start_animation('.mod_eclipse')">
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
			<a-asset-item id="tex_earth" src="model/eclipse/2k_earth.jpg"></a-asset-item>
			<a-asset-item id="tex_moon" src="model/eclipse/2k_moon.jpg"></a-asset-item>
			<a-asset-item id="tex_sun" src="model/eclipse/2k_sun.jpg"></a-asset-item>
		</a-assets>
		<!-- define marker -->
		<a-marker type='pattern' url='./pattern/sci-pattern-marker.patt' detect-marker="id: marker-sci" id="marker-sci">
			<!-- Sun -->
			<a-sphere radius="0.5" position="0 1 0" src="./model/eclipse/2k_sun.jpg" class="mod_eclipse">
				<a-animation attribute="rotation" from="0 0 0" to="0 360 0" repeat dur="20000" easing="linear" begin="play-animation"></a-animation>
			</a-sphere>
			<!-- Earth Orbit -->
			<a-cylinder color="#CCC" radius="2" rotation="0 0 0" position="0 1 0" height="0.01" opacity="0.1" class="mod_eclipse">
				<a-animation attribute="rotation" from="0 0 0" to="0 360 0" repeat dur="10000" easing="linear" begin="play-animation"></a-animation>
				<!-- Earth -->
				<a-sphere radius="0.2" position="2 0 0" src="./model/eclipse/2k_earth.jpg" class="mod_eclipse">
					<a-animation attribute="rotation" from="0 0 0" to="0 360 0" repeat dur="2000" easing="linear" begin="play-animation"></a-animation>
					<!-- Moon Orbit -->
					<a-cylinder color="#CCC" radius="0.5" rotation="0 0 0" position="0 0 0" height="0.01" opacity="0.1" class="mod_eclipse">
						<a-animation attribute="rotation" from="0 0 0" to="0 360 0" repeat dur="5000" easing="linear" begin="play-animation"></a-animation>
						<!-- Moon -->
						<a-sphere radius="0.1" position="0.5 0 0" src="./model/eclipse/2k_moon.jpg" class="mod_eclipse">
							<a-animation attribute="rotation" from="0 0 0" to="0 360 0" repeat dur="1000" easing="linear" begin="play-animation"></a-animation>
						</a-sphere>
					</a-cylinder>
				</a-sphere>
			</a-cylinder>
		</a-marker>
		<!-- define camera -->
		<a-entity camera></a-entity>
	</a-scene>

</body>

<!-- FOOTER -->
<?php require 'component/footer.php'; ?>