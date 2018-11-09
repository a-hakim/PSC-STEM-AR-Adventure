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
			<h4>Augmented Reality</h4>
			<img src="img/uno.png" style="height: 200px; margin-bottom: 10px;">
			<p style="text-align: justify;">
				Hi! I am Uno and I am a digital being. Thanks to augmented reality technology, I can exist outside of digital world and come to your world. At the moment I can’t do much besides moving around. But, in the future I hope I can play and talk with you.
			</p>
			<a href="https://www.realitytechnologies.com/augmented-reality/" target="_blank">Click here to learn more</a>
		</div>
		<div id="quiz_body" style="display: none;">
			<h4>QUIZ!</h4>
			<p>What technology that allows Uno to appear on your screen like a real object?</p>
			<div id="ans_opt" class="row justify-content-center">
				<div class="col-md-4 col-md-offset-2">
					<button type="button" class="btn btn-outline-light btn-block" style="margin-bottom: 8px;" onclick="answer_check(false, 'xpoint3')">
						Virtual Reality Technology
					</button>
				</div>
				<div class="col-md-4">
					<button type="button" class="btn btn-outline-light btn-block" style="margin-bottom: 8px;" onclick="answer_check(true, 'xpoint3')">
						Augmented Reality Technology
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
					<b>ANS:</b> Uno appear on your screen like a real object due to augmented reality technology.
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
				<button type="button" class="btn btn-outline-light btn-md" onclick="start_animation('#mod_uno')">
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
			<a-asset-item id="uno-kun" src="model/areality/psc.dae"></a-asset-item>
		</a-assets>
		<!-- define marker -->
		<a-marker type='pattern' url='./pattern/tech-pattern-marker.patt' detect-marker="id: marker-tech" id="marker-tech">
			<a-collada-model src="#uno-kun" scale="10 10 10" position="0 0 0" id="mod_uno">
				<a-animation attribute="position" from="0 0 0" to="0 0.3 0" dur="1000" direction="alternate" repeat begin="play-animation"></a-animation>
				<a-animation attribute="rotation" from="0 -30 0" to="0 30 0" dur="2000" direction="alternate" repeat begin="play-animation"></a-animation>
			</a-collada-model>
		</a-marker>
		<!-- define camera -->
		<a-entity camera></a-entity>
	</a-scene>

</body>

<!-- FOOTER -->
<?php require 'component/footer.php'; ?>