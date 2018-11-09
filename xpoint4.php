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
			<h4>Dimensions</h4>
			<img src="img/dim0.png">
			<p style="text-align: justify;">
				<b>Zero Dimensions:</b> A point has zero dimensions. There's no length, height, width, or volume. Its only property is its location. You could have a collection of points, such as the endpoints of a line or the corners of a square, but it would still be a zero-dimensional object.
			</p>
			<img src="img/dim1.png">
			<p style="text-align: justify;">
				<b>One Dimension:</b> Once you connect two points, you get a one-dimensional object — a line segment. A line segment has one dimension: length.
			</p>
			<img src="img/dim2.png">
			<p style="text-align: justify;">
				<b>Two Dimensions:</b> A flat plane or shape is two-dimensional. Its two dimensions are length and width. Polygons, such as squares and rectangles, are examples of two-dimensional objects. Two-dimensional objects can be rotated in a plane.
			</p>
			<img src="img/dim3.png">
			<p style="text-align: justify;">
				<b>Three Dimensions:</b> The objects around you — the ones you can pick up, touch, and move around — are three-dimensional. These shapes have a third dimension: depth. Cubes, prisms, pyramids, spheres, cones, and cylinders are all examples of three-dimensional objects. Three-dimensional objects can be rotated in space.
			</p>
			<a href="https://www.amnh.org/ology/features/stufftodo_einstein/threed_dimension.php" target="_blank">Click here to learn more</a>
		</div>
		<div id="quiz_body" style="display: none;">
			<h4>QUIZ!</h4>
			<p>Based on your understanding, what is the dimension of plain A4 paper called?</p>
			<div id="ans_opt" class="row justify-content-center">
				<div class="col-md-4 col-md-offset-2">
					<button type="button" class="btn btn-outline-light btn-block" style="margin-bottom: 8px;" onclick="answer_check(false, 'xbadge')">
						3 Dimension
					</button>
				</div>
				<div class="col-md-4">
					<button type="button" class="btn btn-outline-light btn-block" style="margin-bottom: 8px;" onclick="answer_check(true, 'xbadge')">
						2 Dimension
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
				<div class="btn-group dropup">
					<button type="button" class="btn btn-outline-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-play-circle"></i> &nbsp;Play
					</button>
					<div class="dropdown-menu">
						<a class="dropdown-item" onclick="view_3d()" href="#">3 Dimension</a>
						<a class="dropdown-item" onclick="view_2d()" href="#">2 Dimension</a>
						<a class="dropdown-item" onclick="view_1d()" href="#">1 Dimension</a>
						<a class="dropdown-item" onclick="view_0d()" href="#">0 Dimension</a>
					</div>
				</div>
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
			
		</a-assets>
		<!-- define marker -->
		<a-marker type='pattern' url='./pattern/math-pattern-marker.patt' detect-marker="id: marker-math" id="marker-math">
			<a-plane color="#fff" height="1.5" width="1.5" rotation="-90 0 0" opacity="0.5"></a-plane>


			<a-entity position="-0.5 0.1 -0.5" scale="0.5 0.5 0.5" id="dimension3">
				<!-- Origin -->
				<a-sphere color="#fff" radius="0.1" position="0 0 0"></a-sphere>
				<a-entity class="mod_3dimension"><!-- X-Axis -->
					<a-animation attribute="scale" from="0 1 1" to="1 1 1" dur="2000" begin="play-animation"></a-animation>
					<a-cylinder color="blue" height="2" radius="0.05" position="1 0 0" rotation="0 0 90"></a-cylinder>
					<a-cone color="blue" radius-bottom="0.15" radius-top="0.01" height="0.3" position="2.2 0 0" rotation="0 0 -90"></a-cone>
				</a-entity>
				<a-entity class="mod_3dimension"><!-- Y-Axis -->
					<a-animation attribute="scale" from="1 1 0" to="1 1 1" dur="2000" begin="play-animation"></a-animation>
					<a-cylinder color="green" height="2" radius="0.05" position="0 0 1" rotation="90 0 0"></a-cylinder>
					<a-cone color="green" radius-bottom="0.15" radius-top="0.01" height="0.3" position="0 0 2.2" rotation="90 0 0"></a-cone>
				</a-entity>
				<a-entity class="mod_3dimension"><!-- Z-Axis -->
					<a-animation attribute="scale" from="1 0 1" to="1 1 1" dur="2000" begin="play-animation"></a-animation>
					<a-cylinder color="red" height="2" radius="0.05" position="0 1 0" rotation="0 0 0"></a-cylinder>
					<a-cone color="red" radius-bottom="0.15" radius-top="0.01" height="0.3" position="0 2.2 0" rotation="0 90 0"></a-cone>
				</a-entity>
				<a-entity class="mod_3dimension"><!-- 3D Box -->
					<a-animation attribute="scale" from="0 0 0" to="1 1 1" dur="4000" begin="play-animation" fill="backwards"></a-animation>
					<a-box color="yellow" depth="2" height="2" width="2" opacity="0.5" position="1 1 1" displacement-scale="0">
						<a-entity text-geometry="value: 3D; size: 1.0; height: 0.25;" material="color: #222;" position="-0.75 1.1 -0.15"></a-entity>
					</a-box>
				</a-entity>
			</a-entity>

			<a-entity position="-0.5 0.1 -0.5" scale="0.5 0.5 0.5" id="dimension2">
				<!-- Origin -->
				<a-sphere color="#fff" radius="0.1" position="0 0 0"></a-sphere>
				<a-entity class="mod_2dimension"><!-- X-Axis -->
					<a-animation attribute="scale" from="0 1 1" to="1 1 1" dur="2000" begin="play-animation"></a-animation>
					<a-cylinder color="blue" height="2" radius="0.05" position="1 0 0" rotation="0 0 90"></a-cylinder>
					<a-cone color="blue" radius-bottom="0.15" radius-top="0.01" height="0.3" position="2.2 0 0" rotation="0 0 -90"></a-cone>
				</a-entity>
				<a-entity class="mod_2dimension"><!-- Y-Axis -->
					<a-animation attribute="scale" from="1 1 0" to="1 1 1" dur="2000" begin="play-animation"></a-animation>
					<a-cylinder color="green" height="2" radius="0.05" position="0 0 1" rotation="90 0 0"></a-cylinder>
					<a-cone color="green" radius-bottom="0.15" radius-top="0.01" height="0.3" position="0 0 2.2" rotation="90 0 0"></a-cone>
				</a-entity>
				<a-entity class="mod_2dimension"><!-- 3D Box -->
					<a-animation attribute="scale" from="0 0 0" to="1 1 1" dur="4000" begin="play-animation"></a-animation>
					<a-box color="yellow" depth="2" height="0.1" width="2" opacity="0.5" position="1 0 1" displacement-scale="0">
						<a-entity text-geometry="value: 2D; size: 1.0; height: 0.1;" material="color: red;" position="-0.85 0.1 0.5" rotation="-90 0 0"></a-entity>
					</a-box>
				</a-entity>
			</a-entity>

			<a-entity position="-0.5 0.1 0" scale="0.5 0.5 0.5" id="dimension1">
				<!-- Origin -->
				<a-sphere color="#fff" radius="0.1" position="0 0 0"></a-sphere>
				<a-entity class="mod_1dimension"><!-- X-Axis -->
					<a-animation attribute="scale" from="0 1 1" to="1 1 1" dur="2000" begin="play-animation"></a-animation>
					<a-cylinder color="blue" height="2" radius="0.05" position="1 0 0" rotation="0 0 90"></a-cylinder>
					<a-cone color="blue" radius-bottom="0.15" radius-top="0.01" height="0.3" position="2.2 0 0" rotation="0 0 -90"></a-cone>
				</a-entity>
				<a-entity class="mod_1dimension"><!-- 3D Box -->
					<a-animation attribute="scale" from="0 0 0" to="1 1 1" dur="4000" begin="play-animation"></a-animation>
					<a-box color="blue" depth="0.1" height="0.1" width="2" opacity="0.5" position="1 0 0" displacement-scale="0">
						<a-entity text-geometry="value: 1D; size: 1.0; height: 0.1;" material="color: yellow;" position="-0.85 0.1 0.5" rotation="-90 0 0"></a-entity>
					</a-box>
				</a-entity>
			</a-entity>

			<a-entity position="0 0.1 0" scale="0.5 0.5 0.5" id="dimension0">
				<!-- Origin -->
				<a-sphere color="#fff" radius="0.1" position="0 0 0" class="mod_0dimension">
					<a-animation attribute="scale" from="1 1 1" to="1.5 1.5 1.5" dur="500" begin="play-animation" direction="alternate" repeat></a-animation>
					<a-animation attribute="material.color" from="white" to="blue" dur="1000" begin="play-animation"></a-animation>
					<a-animation attribute="material.color" from="blue" to="green" dur="1000" begin="play-animation" delay="1000"></a-animation>
					<a-animation attribute="material.color" from="green" to="red" dur="1000" begin="play-animation" delay="2000"></a-animation>
					<a-animation attribute="material.color" from="red" to="white" dur="1000" begin="play-animation" delay="3000"></a-animation>
				</a-sphere>
			</a-entity>
			
		</a-marker>
		<!-- define camera -->
		<a-entity camera></a-entity>
	</a-scene>

	<script type="text/javascript">
		view_none();

		function view_3d() {
			view_none();
			document.querySelector('#dimension3').setAttribute('visible', true);
			start_animation('.mod_3dimension');
		}

		function view_2d() {
			view_none();
			document.querySelector('#dimension2').setAttribute('visible', true);
			start_animation('.mod_2dimension');
		}

		function view_1d() {
			view_none();
			document.querySelector('#dimension1').setAttribute('visible', true);
			start_animation('.mod_1dimension');
		}

		function view_0d() {
			view_none();
			document.querySelector('#dimension0').setAttribute('visible', true);
			start_animation('.mod_0dimension');
		}

		function view_none() {
			document.querySelector('#dimension3').setAttribute('visible', false);
			document.querySelector('#dimension2').setAttribute('visible', false);
			document.querySelector('#dimension1').setAttribute('visible', false);
			document.querySelector('#dimension0').setAttribute('visible', false);
		}
	</script>

</body>

<!-- FOOTER -->
<?php require 'component/footer.php'; ?>